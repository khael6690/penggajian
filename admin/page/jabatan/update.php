<div class="col-md-6">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<div class="form-body">
					<div class="row">
						<input type="hidden" name="id_jabatan" value="<?= $result[0]['id_jabatan'] ?>">
						<div class="col-12">
							<div class="form-group">
								<label for="jabatan">Nama Jabatan</label>
								<input type="text" name="jabatan" class="form-control" value="<?= $result[0]['jabatan'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="gaji_pokok">Gaji Pokok</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="gaji_pokok" class="form-control" value="<?= $result[0]['gaji_pokok'] ?>" required>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="tunjangan_jabatan">Tunjangan Jabatan</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="tunjangan_jabatan" class="form-control" value="<?= $result[0]['tunjangan_jabatan'] ?>" required>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="uang_lembur">Uang Lembur</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="uang_lembur" class="form-control" value="<?= $result[0]['uang_lembur'] ?>" required>
									<span class="input-group-text">/jam</span>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="jamsostek">Uang Jamsostek</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="jamsostek" value="<?= $result[0]['jamsostek'] ?>" class="form-control" required>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="hari_kerja">Hari Kerja</label>
								<div class="input-group mb-3">
									<input type="number" min="0" max="30" name="hari_kerja" value="<?= $result[0]['hari_kerja'] ?>" class="form-control" required>
									<span class="input-group-text">/Hari</span>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="potongan_ijin">Potongan Ijin</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="potongan_ijin" value="<?= $result[0]['potongan_ijin'] ?>" class="form-control" required>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="potongan_absen">Potongan Absen</label>
								<div class="input-group mb-3">
									<span class="input-group-text">Rp.</span>
									<input type="number" name="potongan_absen" value="<?= $result[0]['potongan_absen'] ?>" class="form-control" required>
									<div class="invalid-feedback">
										Tolong Diisi.
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-end">
							<button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
								Update
							</button>
							<a href="<?= $fungsi->config()['url'] ?>/admin/jabatan.php" class="btn btn-danger me-1 mb-1">
								Batal
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>