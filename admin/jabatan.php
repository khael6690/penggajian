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

					include 'page/jabatan/tambah.php';
				} elseif (@$_GET['page'] == 'update' && isset($_GET['id'])) {
					$result = $data->viewDB('jabatan', 'id_jabatan', $_GET['id']);
					if ($_GET['id'] != $result[0]['id_jabatan']) {
						header('location:jabatan.php');
					}

					include 'page/jabatan/update.php';
				} else { ?>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Jabatan</h3>
							</div>
							<div class="card-body">
								<a href="?page=tambah" class="btn btn-default">Tambah Data</a>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Jabatan</th>
												<th>Gaji Pokok</th>
												<th>Hari Kerja</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('jabatan');
											foreach ($row as $val) {
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $val['jabatan'] ?></td>
													<td>Rp. <?= number_format($val['gaji_pokok'], 0, ',', '.') ?></td>
													<td><?= $val['hari_kerja'] ?></td>
													<td>
														<button type="button" data-toggle="modal" data-target="#des<?= $val['id_jabatan'] ?>" class="btn btn-success"><i class="far fa-eye"></i></button>
														<a href="?page=delete&id=<?= $val['id_jabatan'] ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
														<a href="?page=update&id=<?= $val['id_jabatan'] ?>" class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
														<div class="modal fade" id="des<?= $val['id_jabatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
															<div class="modal-dialog modal-md" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="modalLabel">Details Jabatan</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<table class="table">
																			<tr>
																				<td>Jabatan</td>
																				<td><?= $val['jabatan'] ?></td>
																			</tr>
																			<tr>
																				<td>Gaji Pokok</td>
																				<td>Rp. <?= number_format($val['gaji_pokok'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Tunjangan</td>
																				<td>Rp. <?= number_format($val['tunjangan_jabatan'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Uang Lembur</td>
																				<td>Rp. <?= number_format($val['uang_lembur'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Jamsostek</td>
																				<td>Rp. <?= number_format($val['jamsostek'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Potongan Izin</td>
																				<td>Rp. <?= number_format($val['potongan_ijin'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Potongan Absen</td>
																				<td>Rp. <?= number_format($val['potongan_absen'], 0, ',', '.') ?></td>
																			</tr>
																			<tr>
																				<td>Hari Kerja</td>
																				<td><?= $val['hari_kerja'] ?></td>
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
			'id_jabatan' => '',
			'jabatan' => $_POST['jabatan'],
			'gaji_pokok' => $_POST['gaji_pokok'],
			'tunjangan_jabatan' => $_POST['tunjangan_jabatan'],
			'uang_lembur' => $_POST['uang_lembur'],
			'jamsostek' => $_POST['jamsostek'],
			'hari_kerja' => $_POST['hari_kerja'],
			'potongan_ijin' => $_POST['potongan_ijin'],
			'potongan_absen' => $_POST['potongan_absen']
		);
		// print_r($post);die;
		$result = $data->insertDB('jabatan', $post);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Tambahkan");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/jabatan.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Tambahkan");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
		$post = array(
			'jabatan' => $_POST['jabatan'],
			'gaji_pokok' => $_POST['gaji_pokok'],
			'tunjangan_jabatan' => $_POST['tunjangan_jabatan'],
			'uang_lembur' => $_POST['uang_lembur'],
			'jamsostek' => $_POST['jamsostek'],
			'hari_kerja' => $_POST['hari_kerja'],
			'potongan_ijin' => $_POST['potongan_ijin'],
			'potongan_absen' => $_POST['potongan_absen']
		);
		// print_r($post);die;
		$result = $data->updateDB('jabatan', $post, 'id_jabatan', $_POST['id_jabatan']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/jabatan.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
		$result = $data->deleteDB('jabatan', 'id_jabatan', $_GET['id']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				$("#example").load(location.href + " #example");
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/jabatan.php"; }, 1500);</script>';
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