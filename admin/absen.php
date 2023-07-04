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

					include 'page/absen/tambah.php';
				} elseif (@$_GET['page'] == 'update' && isset($_GET['id'])) {
					$result = $data->viewDB('absensi', 'id_absen', $_GET['id']);
					$nama = $data->viewDB('pegawai', 'nip', $result[0]['nip']);
					if ($_GET['id'] != $result[0]['id_absen']) {
						header('location:absen.php');
					}

					include 'page/absen/update.php';
				} else { ?>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Absensi</h3>
							</div>
							<div class="card-body">
								<a href="?page=tambah" class="btn btn-default">Tambah Data</a>
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Periode</th>
												<th>Nama Pegawai</th>
												<th>Kehadiran</th>
												<th>Izin</th>
												<th>Jam Lembur</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('absensi');
											foreach ($row as $val) {
												$pegawai = $data->viewDB('pegawai', 'nip', $val['nip']);
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= date('F Y', strtotime($val['periode'])) ?></td>
													<td><?= $pegawai[0]['nama'] ?> (<?= $val['nip'] ?>)</td>
													<td><?= $val['masuk'] ?></td>
													<td><?= $val['izin'] ?></td>
													<td><?= $val['jam_lembur'] ?></td>
													<td>
														<a href="?page=delete&id=<?= $val['id_absen'] ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
														<a href="?page=update&id=<?= $val['id_absen'] ?>" class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
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
		$cekjabatan = $data->viewDB("pegawai", "nip", $_POST['nip']);
		$cekharikerja = $data->viewDB("jabatan", "id_jabatan", $cekjabatan[0]['id_jabatan']);
		$totalharikerja = $_POST['masuk'] + $_POST['izin'];
		if ($totalharikerja > $cekharikerja[0]['hari_kerja']) {
			$fungsi->flash('alert', 'toastr["error"]("Hari Kerja Hanya ' . $cekharikerja[0]['hari_kerja'] . ' Hari");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		} else {
			$post = array(
				'nip' => $_POST['nip'],
				'masuk' => $_POST['masuk'],
				'izin' => $_POST['izin'],
				'jam_lembur' => $_POST['jam_lembur'],
				'periode' => $_POST['periode'] . '-01'
			);
			// print_r($post);die;
			$result = $data->insertDB('absensi', $post);
			if ($result) {
				$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Tambahkan");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
			} else {
				$fungsi->flash('alert', 'toastr["error"]("Gagal Di Tambahkan");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
			}
		}
	} elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
		$cekjabatan = $data->viewDB("pegawai", "nip", $_POST['nip']);
		$cekharikerja = $data->viewDB("jabatan", "id_jabatan", $cekjabatan[0]['id_jabatan']);
		$totalharikerja = $_POST['masuk'] + $_POST['izin'];
		if ($totalharikerja > $cekharikerja[0]['hari_kerja']) {
			$fungsi->flash('alert', 'toastr["error"]("Hari Kerja Hanya ' . $cekharikerja[0]['hari_kerja'] . ' Hari");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		} else {
			$post = array(
				'nip' => $_POST['nip'],
				'masuk' => $_POST['masuk'],
				'izin' => $_POST['izin'],
				'jam_lembur' => $_POST['jam_lembur'],
				'periode' => $_POST['periode'] . '-01'
			);
			// print_r($post);die;
			$result = $data->updateDB('absensi', $post, 'id_absen', $_POST['id_absen']);
			if ($result) {
				$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Update");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
			} else {
				$fungsi->flash('alert', 'toastr["error"]("Gagal Di Update");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
			}
		}
	} elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
		$result = $data->deleteDB('absensi', 'id_absen', $_GET['id']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				$("#example").load(location.href + " #example");
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['i'] == 'absen-kosong') {
		$fungsi->flash('alert', 'toastr["error"]("Isi Data Absensi Terlebih Dahulu")');
		echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
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