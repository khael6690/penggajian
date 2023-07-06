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
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<input type="hidden" name="id_gaji" value="<?= $id ?>">
				<input type="hidden" name="nip" value="<?= $result[0]['nip'] ?>">
				<div class="row">
					<div class="col-md-6">
						<h3>Pendapatan</h3>

						<div class="form-group">
							<label for="gaji_pokok">Gaji Pokok</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control pendapatan" value="<?= $result[0]['gaji_pokok_edit'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="tunjangan_jabatan">Tunjangan Jabatan</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="tunjangan_jabatan" name="tunjangan_jabatan" class="form-control pendapatan" value="<?= $result[0]['tunjangan_jabatan'] ?>" required readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="uang_lembur">Uang Lembur</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="uang_lembur" name="uang_lembur" class="form-control pendapatan" value="<?= $uang_lembur ?>" required readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="bonus">Bonus</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="bonus" name="bonus" class="form-control pendapatan" value="0" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<br />
						<br />
						<div class="form-group">
							<label for="pendapatan">
								<h5>Total Pendapatan</h5>
							</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" name="pendapatan" class="form-control jumlah" id="gajikotor" value="<?= $gajikotor ?>" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h3>Potongan</h3>

						<div class="form-group">
							<label>Cicilan Pinjaman Kasbon</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="bayar_kasbon" name="bayar_kasbon" class="form-control potongan" value="<?= $result[0]['kasbon'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Potongan Jamsostek</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="jamsostek" class="form-control potongan" value="<?= $result[0]['jamsostek'] ?>" required readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Potongan Absen</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="potongan_absen" name="potongan_absen" class="form-control potongan" value="<?= $potabsen ?>" required readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Potongan Izin</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" id="potongan_ijin" name="potongan_ijin" class="form-control potongan" value="<?= $potizin ?>" required readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<br />
						<br />
						<div class="form-group">
							<label>
								<h5>Total Potongan</h5>
							</label>
							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" name="potongan" class="form-control jumlah" id="totalpotongan" value="<?= $totalpotongan ?>" readonly>
							</div>
						</div>
					</div>
					<div class="col-12 d-flex justify-content-end">
						<button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
							Ubah Slip gaji
						</button>
						<a href="<?= $fungsi->config()['url'] ?>/admin/gaji.php" class="btn btn-danger me-1 mb-1">
							Batal
						</a>
					</div>
				</div>
		</div>

		</form>
	</div>

</div>