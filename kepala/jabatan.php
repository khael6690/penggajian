<?php
include 'built_in.php';
?>
<!DOCTYPE html>
<html>

<?php
include 'head.php';
?>

<body class="bg-light">
	<?php
	include 'nav.php';
	?>
	<main>
		<div class="container">
			<div class="row justify-content-md-center mt-5 p-5">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<h3 class="text-center">Data Jabatan</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Jabatan</th>
											<th>Gaji Pokok</th>
											<th>Tunjangan Jabatan</th>
											<th>Uang Lembur</th>
											<th>Jamsostek</th>
											<th>Pot. Ijin</th>
											<th>Pot. Absen</th>
											<th>Hari Kerja</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$row = $data->viewDB('jabatan');
										foreach ($row as $val) { ?>
											<tr>
												<td><?= $no ?></td>
												<td><?= $val['jabatan'] ?></td>
												<td><?= $val['gaji_pokok'] ?></td>
												<td><?= $val['tunjangan_jabatan'] ?></td>
												<td><?= $val['uang_lembur'] ?></td>
												<td><?= $val['jamsostek'] ?></td>
												<td><?= $val['potongan_ijin'] ?></td>
												<td><?= $val['potongan_absen'] ?></td>
												<td><?= $val['hari_kerja'] ?></td>
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