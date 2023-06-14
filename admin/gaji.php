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

				if (@$_GET['page'] == 'tambah' && isset($_GET['nip']) && isset($_GET['periode'])) {
					if (empty($_GET['periode'])) {
						header('location:gaji.php?page=periode&nip=' . $_GET['nip']);
					}
					$nip = $_GET['nip'];
					$periode = $_GET['periode'] . '-01';
					$result = $data->cosviewDB("SELECT * FROM jabatan,pegawai,absensi WHERE pegawai.nip='$nip' AND pegawai.nip=absensi.nip AND jabatan.id_jabatan=pegawai.id_jabatan AND absensi.periode='$periode'");
					if ($_GET['nip'] != $result[0]['nip']) {
						header('location:absen.php?i=absen-kosong');
					}
					$absen = $result[0]['hari_kerja'] - $result[0]['masuk'];
					if ($absen <= 0) {
						$absen = 0;
					}
					$uang_lembur = $result[0]['uang_lembur'] * $result[0]['jam_lembur'];
					$gajikotor = $result[0]['gaji_pokok'] + $result[0]['tunjangan_jabatan'] + $uang_lembur;
					$potizin = $result[0]['potongan_ijin'] * $result[0]['izin'];
					$potabsen = $result[0]['potongan_absen'] * $absen;
					$totalpotongan = $result[0]['jamsostek'] + $potizin + $potabsen + $result[0]['kasbon'];

					include 'page/gaji/tambah.php';
				} elseif (@$_GET['page'] == 'update' && isset($_GET['id'])) {
					$id = $_GET['id'];
					$result = $data->cosviewDB("SELECT * FROM jabatan,pegawai,absensi,gaji WHERE pegawai.nip=gaji.nip AND absensi.nip=gaji.nip AND jabatan.id_jabatan=pegawai.id_jabatan AND gaji.id_gaji='$id' AND absensi.periode=gaji.periode");
					if ($_GET['id'] != $result[0]['id_gaji']) {
						header('location:gaji.php');
					}

					$absen = $result[0]['hari_kerja'] - $result[0]['masuk'];
					if ($absen <= 0) {
						$absen = 0;
					}
					$uang_lembur = $result[0]['uang_lembur'] * $result[0]['jam_lembur'];
					$gajikotor = $result[0]['gaji_pokok_edit'] + $result[0]['tunjangan_jabatan'] + $uang_lembur;
					$potizin = $result[0]['potongan_ijin'] * $result[0]['izin'];
					$potabsen = $result[0]['potongan_absen'] * $absen;
					$totalpotongan = $result[0]['jamsostek'] + $potizin + $potabsen;

					include 'page/gaji/update.php';
				} elseif (@$_GET['page'] == 'periode' && isset($_GET['nip'])) {
					$nip = $_GET['nip'];
					$result = $data->viewDB('absensi', 'nip', $nip);
					if ($_GET['nip'] != $result[0]['nip']) {
						header('location:gaji.php');
					}

					include 'page/gaji/periode.php';
				} elseif (@$_GET['page'] == 'view' && isset($_GET['id'])) {
					$id = $_GET['id'];
					$result = $data->cosviewDB("SELECT * FROM jabatan,pegawai,absensi,gaji WHERE pegawai.nip=gaji.nip AND absensi.nip=gaji.nip AND jabatan.id_jabatan=pegawai.id_jabatan AND gaji.id_gaji='$id' AND gaji.periode=absensi.periode");
					if ($_GET['id'] != $result[0]['id_gaji']) {
						header('location:gaji.php');
					}

					$absen = $result[0]['hari_kerja'] - $result[0]['masuk'];
					if ($absen <= 0) {
						$absen = 0;
					}

					$uang_lembur = $result[0]['uang_lembur'] * $result[0]['jam_lembur'];
					$gajikotor = $result[0]['gaji_pokok_edit'] + $result[0]['tunjangan_jabatan'] + $uang_lembur;
					$potizin = $result[0]['potongan_ijin'] * $result[0]['izin'];
					$potabsen = $result[0]['potongan_absen'] * $absen;
					$totalpotongan = $result[0]['jamsostek'] + $potizin + $potabsen + $result[0]['bayar_kasbon'];
					$totalgaji = $gajikotor - $totalpotongan;
					$gajiterbilang = terbilangIDR($totalgaji);
					if ($totalgaji <= 0) {
						$totalgaji = 0;
					}

					include 'page/gaji/slip.php';
				} else { ?>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Gaji</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>#</th>
												<th>ID Slip Gaji</th>
												<th>Nama Pegawai (NIP)</th>
												<th>Periode</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('gaji');
											foreach ($row as $val) {
												$pegawai = $data->viewDB('pegawai', 'nip', $val['nip']);
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $val['id_gaji'] ?></td>
													<td><?= $pegawai[0]['nama'] ?> (<?= $val['nip'] ?>)</td>
													<td><?= date('F Y', strtotime($val['periode'])) ?></td>
													<td>
														<a href="?page=delete&id=<?= $val['id_gaji'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
														<a href="?page=update&id=<?= $val['id_gaji'] ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a> <a href="?page=view&id=<?= $val['id_gaji'] ?>" target="_blank" class="btn btn-success"><i class="far fa-eye"></i></a>
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

	if (@$_GET['page'] == 'tambah' && isset($_POST['nip']) && isset($_GET['periode']) && isset($_POST['submit'])) {
		$jumlah_gaji = $_POST['pendapatan'] - $_POST['potongan'];
		$id_gaji = $fungsi->autocode('gaji', 'id_gaji', 3, 'GAJI');
		$nip = $_POST['nip'];
		$cekperiode = $data->cosviewDB("SELECT * FROM gaji WHERE nip='$nip' AND periode='" . $_GET['periode'] . "-01'");
		if (!empty($cekperiode[0]['periode'])) {
			$fungsi->flash('alert', 'toastr["error"]("Gaji Pegawai Periode ' . $cekperiode[0]['periode'] . ' Sudah Ada");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/gaji.php"; }, 2000);</script>';
		} else {
			$post = array(
				'id_gaji' => $id_gaji,
				'nip' => $_POST['nip'],
				'periode' => $_GET['periode'] . '-01',
				'gaji_pokok_edit' => $_POST['gaji_pokok'],
				'bonus' => $_POST['bonus'],
				'bayar_kasbon' => $_POST['bayar_kasbon'],
				'jumlah_gaji' => $jumlah_gaji
			);
			$sisa_kasbon = $result[0]['kasbon'] - $_POST['bayar_kasbon'];
			$editkas = array('kasbon' => $sisa_kasbon);
			$kasbonsisa = $data->updateDB('pegawai', $editkas, 'nip', $_POST['nip']);
			$result = $data->insertDB('gaji', $post);
			if ($result) {
				$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Tambahkan");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/gaji.php?page=view&id=' . $post["id_gaji"] . '"; }, 2000);</script>';
			} else {
				$fungsi->flash('alert', 'toastr["error"]("Gagal Di Tambahkan");');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
			}
		}
	} elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
		$jumlah_gaji = $_POST['pendapatan'] - $_POST['potongan'];
		// print_r($_POST['gaji_pokok']);die;
		$post = array(
			'gaji_pokok_edit' => $_POST['gaji_pokok'],
			'bonus' => $_POST['bonus'],
			'bayar_kasbon' => $_POST['bayar_kasbon'],
			'jumlah_gaji' => $jumlah_gaji
		);
		// print_r($post);die;
		$sisa_kasbon = $result[0]['kasbon'] - $_POST['bayar_kasbon'];
		$editkas = array('kasbon' => $sisa_kasbon);
		$kasbonsisa = $data->updateDB('pegawai', $editkas, 'nip', $_POST['nip']);
		$result = $data->updateDB('gaji', $post, 'id_gaji', $_POST['id_gaji']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/gaji.php?page=view&id=' . $_POST['id_gaji'] . '"; }, 2000);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Update");');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
		$result = $data->deleteDB('gaji', 'id_gaji', $_GET['id']);
		if ($result) {
			$fungsi->flash('alert', 'toastr["success"]("Berhasil Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				$("#example").load(location.href + " #example");
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/gaji.php"; }, 2000);</script>';
		} else {
			$fungsi->flash('alert', 'toastr["error"]("Gagal Di Hapus")');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['page'] == 'periode' && isset($_GET['nip']) && isset($_POST['periode']) && isset($_POST['submit'])) {
		// echo 'page=tambah&nip='.$_GET['nip'].'&periode='.$_POST['periode'].'';die;
		echo '<script type="text/javascript">
	                				window.location="' . $fungsi->config()["url"] . '/admin/gaji.php?page=tambah&nip=' . $_GET['nip'] . '&periode=' . $_POST['periode'] . '";</script>';
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