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
							<h3>Pegawai</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Pegawai
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
								<h3 class="text-center">Data Pegawai</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped">
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
														<button type="button" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $val['nip'] ?>">
															<i class="bi bi-eye"></i> Details
														</button>

														<!--Modal -->
														<div class="modal fade text-left" id="modal-detail-<?= $val['nip'] ?>" tabindex="-1" role="dialog" data-bs-backdrop="false">
															<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header bg-primary">
																		<h4 class="modal-title">
																			Details Pegawai
																		</h4>
																		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																			<i data-feather="x"></i>
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