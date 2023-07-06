<?php
include 'built_in.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';
?>

<body>
	<script src="<?= $fungsi->config()['url'] ?>/assets/static/js/initTheme.js"></script>

	<div id="app">
		<?php
		$title = 'master';
		include 'sidebar.php'
		?>
		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3>Absensi</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Absensi
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="page-content">
				<section class="row justify-content-center">
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
									<a href="?page=tambah" class="btn btn-primary">Tambah Data</a>
									<div class="table-responsive">
										<table id="example" class="table table-striped">
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
															<a href="?page=update&id=<?= $val['id_absen'] ?>" class="btn icon btn-primary m-1"><i class="bi bi-pencil"></i></a>
															<a href="?page=delete&id=<?= $val['id_absen'] ?>" class="btn icon btn-danger m-1" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="bi bi-trash"></i></a>
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
				</section>
			</div>
		</div>
	</div>
	<?php
	include 'foot.php';

	if (@$_GET['page'] == 'tambah' && isset($_POST['submit'])) {
		$cekjabatan = $data->viewDB("pegawai", "nip", $_POST['nip']);
		$cekharikerja = $data->viewDB("jabatan", "id_jabatan", $cekjabatan[0]['id_jabatan']);
		$totalharikerja = $_POST['masuk'] + $_POST['izin'];
		if ($totalharikerja > $cekharikerja[0]['hari_kerja']) {
			$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Hari Kerja Hanya ' . $cekharikerja[0]['hari_kerja'] . ' Hari"})');
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
				$fungsi->flash('alert',  'Toast.fire({icon: "success",title: "Berhasil ditambahkan!"})');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
			} else {
				$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal ditambahkan!"})');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
			}
		}
	} elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
		$cekjabatan = $data->viewDB("pegawai", "nip", $_POST['nip']);
		$cekharikerja = $data->viewDB("jabatan", "id_jabatan", $cekjabatan[0]['id_jabatan']);
		$totalharikerja = $_POST['masuk'] + $_POST['izin'];
		if ($totalharikerja > $cekharikerja[0]['hari_kerja']) {
			$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Hari Kerja Hanya ' . $cekharikerja[0]['hari_kerja'] . ' Hari"})');
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
				$fungsi->flash('alert', 'Toast.fire({icon: "success",title: "Berhasil diupdate!"})');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
			} else {
				$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal diupdate!"})');
				echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
			}
		}
	} elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
		$result = $data->deleteDB('absensi', 'id_absen', $_GET['id']);
		if ($result) {
			$fungsi->flash('alert', 'Toast.fire({icon: "success",title: "Berhasil dihapus!"})');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/absen.php"; }, 1500);</script>';
		} else {
			$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal dihapus!"})');
			echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
		}
	} elseif (@$_GET['i'] == 'absen-kosong') {
		$fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Isi data absensi lebih dulu!"})');
		echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
	}
	?>
</body>

</html>