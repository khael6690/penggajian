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
				<?php
				if (@$_GET['page'] == 'view' && isset($_GET['id'])) {
					$id = $_GET['id'];
					$result = $data->cosviewDB("SELECT * FROM jabatan,pegawai,absensi,gaji WHERE pegawai.nip=gaji.nip AND absensi.nip=gaji.nip AND jabatan.id_jabatan=pegawai.id_jabatan AND gaji.id_gaji='$id'");
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
												<th>Periode</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$row = $data->viewDB('gaji', 'nip', $_SESSION['username']);
											foreach ($row as $val) {
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $val['id_gaji'] ?></td>
													<td><?= date('F Y', strtotime($val['periode'])) ?></td>
													<td><a href="?page=view&id=<?= $val['id_gaji'] ?>" target="_blank" class="btn btn-success">Details</a></td>
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
				<?php  } ?>
			</div>
		</div>
	</main>

	<?php
	include 'foot.php'
	?>
</body>

</html>