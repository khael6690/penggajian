<div class="col-md-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="needs-validation" style="color: #757575;" novalidate>
				<input type="hidden" name="id_absen" value="<?= $result[0]['id_absen'] ?>">
				<div class="md-form">
					<select name="nip" class="mdb-select">
						<option value="<?= $result[0]["nip"] ?>">(<?= $result[0]["nip"] ?>) <?= $nama[0]["nama"] ?></option>
					</select>
					<label>Nama Pegawai</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<label>Periode</label>
				<div class="md-form">
					<input type="month" name="periode" class="form-control" value="<?= date('Y-m', strtotime($result[0]['periode'])) ?>" required>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="masuk" class="form-control" value="<?= $result[0]['masuk'] ?>" required>
					<label>Kehadiran</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="izin" class="form-control" value="<?= $result[0]['izin'] ?>" required>
					<label>Izin Berhalangan</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="jam_lembur" class="form-control" value="<?= $result[0]['jam_lembur'] ?>" required>
					<label>Jam Lembur</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>