<?php
include 'built_in.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
?>

<body>
	<script src="<?= $fungsi->config()['url'] ?>/assets/static/js/initTheme.js"></script>

	<div id="app">
		<?php
		$title = 'keuangan';
		include 'sidebar.php'
		?>
		<div id="main" class="layout-navbar">
			<?php include '../navbar.php' ?>
			<div id="main-content">
				<div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 order-md-1 order-last">
								<h3>Gaji</h3>
							</div>
							<div class="col-12 col-md-6 order-md-2 order-first">
								<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Gaji
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
						if (@$_GET['page'] == 'view' && isset($_GET['id'])) {
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
											<table id="example" class="table table-striped">
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
																<a href="?page=view&id=<?= $val['id_gaji'] ?>" class="btn btn-success"><i class="bi bi-eye"></i> Details</a>
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
	</div>
	<?php
	include '../foot.php';
	?>
</body>

</html>