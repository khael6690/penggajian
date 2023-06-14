<div class="col-md-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="text-center needs-validation" style="color: #757575;" novalidate>
				<input type="hidden" name="id_jabatan" value="<?= $result[0]['id_jabatan'] ?>">
				<div class="md-form">
					<input type="text" name="jabatan" class="form-control" value="<?= $result[0]['jabatan'] ?>" required>
					<label>Jabatan</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="gaji_pokok" class="form-control" value="<?= $result[0]['gaji_pokok'] ?>" required>
					<label>Gaji Pokok</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="tunjangan_jabatan" class="form-control" value="<?= $result[0]['tunjangan_jabatan'] ?>" required>
					<label>Tunjangan Jabatan</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="uang_lembur" class="form-control" value="<?= $result[0]['uang_lembur'] ?>" required>
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">/jam</span>
					</div>
					<label>Uang Lembur</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="jamsostek" class="form-control" value="<?= $result[0]['jamsostek'] ?>" required>
					<label>Uang Jamsostek</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<input type="number" min="0" max="30" name="hari_kerja" class="form-control" value="<?= $result[0]['hari_kerja'] ?>" required>
					<label>Hari Kerja</label>
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">/Hari</span>
					</div>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="potongan_ijin" class="form-control" value="<?= $result[0]['potongan_ijin'] ?>" required>
					<label>Potongan Ijin</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text md-addon">Rp.</span>
					</div>
					<input type="number" name="potongan_absen" class="form-control" value="<?= $result[0]['potongan_absen'] ?>" required>
					<label>Potongan Absen</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Update</button>
			</form>
		</div>
	</div>

</div>