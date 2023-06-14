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
							<h3 class="text-center">Data Absensi</h3>
						</div>
						<div class="card-body">
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
											</tr>
										<?php $no++;
										} ?>
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