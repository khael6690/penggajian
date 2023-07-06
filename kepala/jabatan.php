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
							<h3>Jabatan</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Jabatan
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="page-content">
				<section class="row justify-content-center">
					<div class="col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Data Jabatan</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped">
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
														<button type="button" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $val['id_jabatan'] ?>">
															<i class="bi bi-eye"></i> Details
														</button>
														<!--Modal -->
														<div class="modal fade text-left" id="modal-detail-<?= $val['id_jabatan'] ?>" tabindex="-1" role="dialog" data-bs-backdrop="false">
															<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header bg-primary">
																		<h4 class="modal-title">
																			Details Jabatan
																		</h4>
																		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																			<i data-feather="x"></i>
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
																		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
																			<i class="bx bx-x d-block d-sm-none"></i>
																			<span class="d-none d-sm-block">Close</span>
																		</button>
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
				</section>
			</div>
		</div>
	</div>
	<?php
	include 'foot.php';
	?>
</body>

</html>