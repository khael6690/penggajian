<div class="col-lg-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Tambah Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="needs-validation" style="color: #757575;" novalidate>
				<div class="md-form">
					<select name="nip" class="mdb-select">
						<option></option>
						<?php
						$row = $data->viewDB('pegawai');
						foreach ($row as $val) {
							echo '<option value="' . $val["nip"] . '">(' . $val["nip"] . ') ' . $val["nama"] . '</option>
										';
						}
						?>

					</select>
					<label>Nama Pegawai</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<label>Periode</label>
				<div class="md-form">
					<input type="month" name="periode" class="form-control" required>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="masuk" class="form-control" required>
					<label>Kehadiran</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="izin" class="form-control" required>
					<label>Izin Berhalangan</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="jam_lembur" class="form-control" required>
					<label>Jam Lembur</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Tambah</button>
			</form>
		</div>
	</div>
</div>