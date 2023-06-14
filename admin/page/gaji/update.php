<div class="col-lg-10">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Edit Data Slip Gaji</strong>
		</h5>
		<br>
		<div class="card-body px-lg-5 pt-0">
			<div class="row">
				<div class="col-md-6">
					<h3>Data Pegawai</h3>
					<table class="table">
						<tr>
							<td>NIP </td>
							<td><?= $result[0]['nip'] ?></td>
						</tr>
						<tr>
							<td>Nama Pegawai </td>
							<td><?= $result[0]['nama'] ?></td>
						</tr>
						<tr>
							<td>Jabatan </td>
							<td><?= $result[0]['jabatan'] ?></td>
						</tr>
						<tr>
							<td>Kasbon</td>
							<td><b><?= $result[0]['kasbon'] ?></b></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<h3>Absensi</h3>
					<table class="table">
						<tr>
							<td>Kehadiran </td>
							<td><?= $result[0]['masuk'] ?> hari</td>
						</tr>
						<tr>
							<td>Absen </td>
							<td><?= $absen ?></td>
						</tr>
						<tr>
							<td>Izin </td>
							<td><?= $result[0]['izin'] ?></td>
						</tr>
						<tr>
							<td>Lembur </td>
							<td><?= $result[0]['jam_lembur'] ?> jam</td>
						</tr>
					</table>
				</div>
			</div>
			<form method="post" class="needs-validation" novalidate>
				<input type="hidden" name="id_gaji" value="<?= $id ?>">
				<input type="hidden" name="nip" value="<?= $result[0]['nip'] ?>">
				<div class="row">
					<div class="col-md-6">
						<h3>Pendapatan</h3>

						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control pendapatan" value="<?= $result[0]['gaji_pokok_edit'] ?>" required>
							<label>Gaji Pokok</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="tunjangan_jabatan" name="tunjangan_jabatan" class="form-control pendapatan" value="<?= $result[0]['tunjangan_jabatan'] ?>" required readonly>
							<label>Tunjangan Jabatan</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="uang_lembur" name="uang_lembur" class="form-control pendapatan" value="<?= $uang_lembur ?>" required readonly>
							<label>Uang Lembur</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="bonus" name="bonus" class="form-control pendapatan" value="0" required>
							<label>Bonus</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<br />
						<br />
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" name="pendapatan" class="form-control jumlah" id="gajikotor" value="<?= $gajikotor ?>" readonly>
							<label>
								<h5>Total Pendapatan</h5>
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Potongan</h3>

						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="bayar_kasbon" name="bayar_kasbon" class="form-control potongan" value="<?= $result[0]['kasbon'] ?>" required>
							<label>Cicilan Pinjaman Kasbon</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="jamsostek" class="form-control potongan" value="<?= $result[0]['jamsostek'] ?>" required readonly>
							<label>Potongan Jamsostek</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>

						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="potongan_absen" name="potongan_absen" class="form-control potongan" value="<?= $potabsen ?>" required readonly>
							<label>Potongan Absen</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" id="potongan_ijin" name="potongan_ijin" class="form-control potongan" value="<?= $potizin ?>" required readonly>
							<label>Potongan Izin</label>
							<div class="invalid-feedback">
								Tolong Diisi.
							</div>
						</div>
						<br />
						<br />
						<div class="md-form input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text md-addon">Rp.</span>
							</div>
							<input type="number" name="potongan" class="form-control jumlah" id="totalpotongan" value="<?= $totalpotongan ?>" readonly>
							<label>
								<h5>Total Potongan</h5>
							</label>
						</div>
					</div>
				</div>
		</div>
		<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Ubah Slip Gaji</button>
		</form>
	</div>

</div>