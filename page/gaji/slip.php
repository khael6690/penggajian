<div class="col-lg-10">
	<a href="#" id="cetak" class="btn btn-primary mb-3"><i class="fa fa-print"></i> Print</a>
	<a href="<?= $fungsi->config()['url'] ?>/admin/gaji.php" class="btn btn-danger mb-3"><i class="fa fa-print"></i>Kembali</a>
	<print id="areaprint">
		<style type="text/css">
			@page {
				size: auto;
				margin: 4mm;
			}
		</style>
		<div class="card">
			<div class="card-header info-color white-text text-center py-3">
				<h3><strong><?= $fungsi->config()['perusahaan'] ?></strong></h3>
				<small><?= $fungsi->config()['alamat_perusahaan'] ?></small>
			</div>
			<br>
			<div class="card-body px-lg-5">
				<div class="text-center">
					<h5><strong>Slip Gaji #<?= $id ?></strong></h5>
					<p>Periode : <?= date('F Y', strtotime($result[0]['periode'])) ?></p>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2">
									<h3>Data Pegawai</h3>
								</th>
								<th colspan="2">
									<h3>Absensi</h3>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>NIP </td>
								<td><?= $result[0]['nip'] ?></td>
								<td>Kehadiran </td>
								<td><?= $result[0]['masuk'] ?> hari</td>
							</tr>
							<tr>
								<td>Nama Pegawai </td>
								<td><?= $result[0]['nama'] ?></td>
								<td>Absen </td>
								<td><?= $absen ?></td>
							</tr>
							<tr>
								<td>Jabatan </td>
								<td><?= $result[0]['jabatan'] ?></td>
								<td>Izin </td>
								<td><?= $result[0]['izin'] ?></td>
							</tr>
							<tr>
								<td>Kasbon</td>
								<td><b>Rp. <?= number_format($result[0]['kasbon'], 0, ',', '.') ?></b></td>
								<td>Lembur </td>
								<td><?= $result[0]['jam_lembur'] ?> jam</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2">
									<h3>Pendapatan</h3>
								</th>
								<th colspan="2">
									<h3>Potongan</h3>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Gaji Pokok </td>
								<td>Rp. <?= number_format($result[0]['gaji_pokok_edit'], 0, ',', '.') ?></td>
								<td>Cicilan Pinjaman Kasbon </td>
								<td>Rp. <?= number_format($result[0]['bayar_kasbon'], 0, ',', '.') ?></td>
							</tr>
							<tr>
								<td>Tunjangan Jabatan </td>
								<td>Rp. <?= number_format($result[0]['tunjangan_jabatan'], 0, ',', '.') ?></td>
								<td>Potongan Jamsostek </td>
								<td>Rp. <?= number_format($result[0]['jamsostek'], 0, ',', '.') ?></td>
							</tr>
							<tr>
								<td>Uang Lembur </td>
								<td>Rp. <?= number_format($uang_lembur, 0, ',', '.') ?></td>
								<td>Potongan Absen </td>
								<td>Rp. <?= number_format($potabsen, 0, ',', '.') ?></td>
							</tr>
							<tr>
								<td>Bonus </td>
								<td>Rp. <?= number_format($result[0]['bonus'], 0, ',', '.') ?></td>
								<td>Potongan Ijin </td>
								<td>Rp. <?= number_format($potizin, 0, ',', '.') ?></td>
							</tr>
							<br>
							<tr>
								<td>
									<h4>Total Pendapatan </h4>
								</td>
								<td>
									<h6>Rp. <?= number_format($gajikotor, 0, ',', '.') ?></h6>
								</td>
								<td>
									<h4>Total Potongan</h4>
								</td>
								<td>
									<h6>Rp. <?= number_format($totalpotongan, 0, ',', '.') ?></h6>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: right;">
									<h4 class="pt-4">Total Gaji</h4>
								</td>
								<td colspan="2">
									<h6 class="pt-4">Rp. <?= number_format($totalgaji, 0, ',', '.') ?></h6>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</print>

</div>