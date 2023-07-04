<?php
include 'built_in.php';
include 'head.php';
?>

<body class="bg-light">
	<?php
	include 'nav.php'
	?>
	<main>
		<div class="container">
			<div class="row justify-content-md-center mt-5 p-5">


				<?php
				if (@$_GET['page'] == 'tambah') {

					include 'page/pegawai/tambah.php';
				} elseif (@$_GET['page'] == 'update' && isset($_GET['id'])) {
					$result = $data->viewDB('pegawai', 'nip', $_GET['id']);
					if ($_GET['id'] != $result[0]['nip']) {
						header('location:pegawai.php');
					}

					include 'page/pegawai/update.php';
				} else { ?>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Pegawai</h3>
							</div>
							<div class="card-body">
								<a href="?page=tambah" class="btn btn-default">Tambah Data</a>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>NIP</th>
												<th>Nama</th>
												<th>Jenis Kelamin</th>
												<th>Jabatan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('pegawai');
											foreach ($row as $val) {
												$jabatan = $data->viewDB('jabatan', 'id_jabatan', $val['id_jabatan']);
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $val['nip'] ?></td>
													<td><?= $val['nama'] ?></td>
													<td><?= $val['kelamin'] ?></td>
													<td><?= $jabatan[0]['jabatan'] ?></td>
													<td>
														<button type="button" data-toggle="modal" data-target="#des<?= $val['nip'] ?>" class="btn btn-success m-1"><i class="far fa-eye"></i></button>
														<a href="?page=delete&id=<?= $val['nip'] ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
														<a href="?page=update&id=<?= $val['nip'] ?>" class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="gaji.php?page=periode&nip=<?= $val['nip'] ?>" class="btn btn-primary m-1">Beri Gaji</a>
														<div class="modal fade" id="des<?= $val['nip'] ?>" tabindex="-1" role="dialog">
															<div class="modal-dialog modal-md" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="modalLabel">Details Pegawai</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<table class="table">
																			<tr>
																				<td>NIP</td>
																				<td><?= $val['nip'] ?></td>
																			</tr>
																			<tr>
																				<td>Nama</td>
																				<td><?= $val['nama'] ?></td>
																			</tr>
																			<tr>
																				<td>Jenis Kelamin</td>
																				<td><?= $val['kelamin'] ?></td>
																			</tr>
																			<tr>
																				<td>Jabatan</td>
																				<td><?= $jabatan[0]['jabatan'] ?></td>
																			</tr>
																			<tr>
																				<td>Tempat/Tanggal Lahir</td>
																				<td><?= $val['tempat_lahir'] ?>/<?= $val['tgl_lahir'] ?></td>
																			</tr>
																			<tr>
																				<td>Alamat</td>
																				<td><?= $val['alamat'] ?></td>
																			</tr>
																			<tr>
																				<td>Pendidikan Terakhir</td>
																				<td><?= $val['pendidikan_terakhir'] ?></td>
																			</tr>
																			<tr>
																				<td>Nomor Handphone</td>
																				<td><?= $val['no_hp'] ?></td>
																			</tr>
																			<tr>
																				<td>Status</td>
																				<td><?= $val['status'] ?></td>
																			</tr>
																			<tr>
																				<td>Kasbon</td>
																				<td><?= $val['kasbon'] ?></td>
																			</tr>
																		</table>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</div>
													</td>
												</tr>
											<?php $no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</main>
	<?php
	include 'foot.php';

	if (@$_GET['page'] == 'tambah' && isset($_POST['submit'])) {
		$post = array(
			'nip' => $_POST['nip'],
			'nama' => $_POST['nama'],
			'kelamin' => $_POST['kelamin'],
			'id_jabatan' => $_POST['id_jabatan'],
			'tempat_lahir' => $_POST['tempat_lahir'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'alamat' => $_POST['alamat'],
			'pendidikan_terakhir' => $_POST['pendidikan_terakhir'],
			'no_hp' => $_POST['no_hp'],
			'status' => $_POST['status'],
			'kasbon' => $_POST['kasbon']
		);
		$user = array(
			'id_user' => '',
			'username' => $_POST['nip'],
			'password' => md5($_POST['nip']),
			'level' => 3
		);
		// print_r($user);
		// die;
		$login = $data->insertDB('user', $user);
		$result = $data->insertDB('pegawai', $post);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Tambahkan");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/pegawai.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Tambahkan");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
		$post = array(
			'nama' => $_POST['nama'],
			'kelamin' => $_POST['kelamin'],
			'id_jabatan' => $_POST['id_jabatan'],
			'tempat_lahir' => $_POST['tempat_lahir'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'alamat' => $_POST['alamat'],
			'pendidikan_terakhir' => $_POST['pendidikan_terakhir'],
			'no_hp' => $_POST['no_hp'],
			'status' => $_POST['status'],
			'kasbon' => $_POST['kasbon']
		);
		$cekpw = $data->viewDB('user', 'username', $_POST['nip']);
		if (empty($_POST['password'])) {
			$password = $cekpw[0]['password'];
		} else {
			$password = $_POST['password'];
		}
		$user = array(
			'username' => $_POST['nip'],
			'password' => md5($password)
		);
		// print_r($post);die;
		$login = $data->updateDB('user', $user, 'username', $_POST['nip']);
		$result = $data->updateDB('pegawai', $post, 'nip', $_POST['nip']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/pegawai.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
		$delete1 = $data->deleteDB('gaji', 'nip', $_GET['id']);
		$delete2 = $data->deleteDB('absensi', 'nip', $_GET['id']);
		$result = $data->deleteDB('pegawai', 'nip', $_GET['id']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				$("#example").load(location.href + " #example");
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/pegawai.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	}
	?>
	<script type="text/javascript">
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
</body>

</html>