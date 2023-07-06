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
		$title = 'absen';
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
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Absensi</h3>
							</div>
							<div class="card-body">
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
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('absensi', 'nip', $_SESSION['username']);
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
				</section>
			</div>
		</div>
	</div>
	<?php
	include 'foot.php';
	?>
</body>

</html>