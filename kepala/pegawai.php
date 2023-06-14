<?php
include 'built_in.php'
?>
<!DOCTYPE html>
<html>

<?php
include 'head.php'
?>

<body class="bg-light">
	<?php
	include 'nav.php'
	?>
	<main>
		<div class="container">
			<div class="row justify-content-md-center mt-5 p-5">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="text-center">Data Pegawai</h3>
						</div>
						<div class="card-body">
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
												<td><button type="button" data-toggle="modal" data-target="#des<?= $val['nip'] ?>" class="btn btn-success">Details</button>
													<div class="modal fade" id="des<?= $val['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
			</div>
		</div>
	</main>

	<?php
	include 'foot.php'
	?>
</body>

</html>