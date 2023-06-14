<div class="col-md-8">
	<div class="card">
		<h5 class="card-header info-color white-text py-4">
			<strong>Tambah Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="needs-validation" style="color: #757575;" novalidate>
				<div class="md-form">
					<input type="text" name="nip" class="form-control" required>
					<label>NIP</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="nama" class="form-control" required>
					<label>Nama Pegawai</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="btn-group d-flex flex-column justify-content-center" data-toggle="buttons">
					<div>

						<label>Jenis Kelamin</label>
					</div>
					<div>
						<label class="btn btn-default active form-check-label">
							<input class="form-check-input" type="radio" name="kelamin" value="Laki-laki" checked autocomplete="off"> Laki-laki
						</label>
						<label class="btn btn-default form-check-label">
							<input class="form-check-input" type="radio" name="kelamin" value="Perempuan" autocomplete="off"> Perempuan
						</label>

					</div>
				</div>
				<div class="invalid-feedback">
					Tolong Diisi.
				</div>
				<div class="md-form">
					<select name="id_jabatan" class="mdb-select">
						<option></option>
						<?php
						$row = $data->viewDB('jabatan');
						foreach ($row as $val) {
							echo '<option value="' . $val["id_jabatan"] . '">' . $val["jabatan"] . '</option>
										';
						}
						?>

					</select>
					<label>Jabatan </label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="tempat_lahir" class="form-control" required>
					<label>Tempat Lahir</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<label>Tanggal Lahir</label>
				<div class="md-form">
					<input type="date" name="tgl_lahir" class="form-control" required>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<textarea name="alamat" class="md-textarea form-control" required></textarea>
					<label>Alamat</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="pendidikan_terakhir" class="form-control" required>
					<label>Pendidikan Terakhir</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="no_hp" class="form-control" required>
					<label>Nomor Handphone</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="btn-group d-flex flex-column justify-content-center" data-toggle="buttons">
					<div>

						<label>Status</label>
					</div>
					<div>

						<label class="btn btn-default active form-check-label">
							<input class="form-check-input" type="radio" name="status" value="Belum Nikah" checked autocomplete="off"> Belum Nikah
						</label>
						<label class="btn btn-default form-check-label">
							<input class="form-check-input" type="radio" name="status" value="Nikah" autocomplete="off"> Nikah
						</label>
					</div>
				</div>
				<div class="invalid-feedback">
					Tolong Diisi.
				</div>
				<div class="md-form">
					<input type="number" name="kasbon" class="form-control" required>
					<label>Pinjaman Kasbon</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Tambah</button>
			</form>
		</div>
	</div>
</div>