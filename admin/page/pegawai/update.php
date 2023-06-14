<div class="col-md-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="needs-validation" style="color: #757575;" novalidate>
				<div class="md-form">
					<input type="text" name="nip" class="form-control" value="<?= $result[0]['nip'] ?>" readonly>
					<label>NIP</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="nama" class="form-control" value="<?= $result[0]['nama'] ?>" required>
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
						<label class="btn btn-default active form-check-label my-1">
							<input class="form-check-input" type="radio" name="kelamin" value="Laki-laki" <?= ($result[0]['kelamin'] == "Laki-laki") ? 'checked' : ''; ?> autocomplete="off"> Laki-laki
						</label>
						<label class="btn btn-default form-check-label my-1">
							<input class="form-check-input" type="radio" name="kelamin" value="Perempuan" <?= ($result[0]['kelamin'] == "Perempuan") ? 'checked' : ''; ?> autocomplete="off"> Perempuan
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
						foreach ($row as $val) { ?>
							<option value="<?= $val["id_jabatan"] ?>" <?= ($val["id_jabatan"] == $result[0]["id_jabatan"]) ? "selected" : "" ?>><?= $val["jabatan"] ?></option>
						<?php } ?>

					</select>
					<label>Jabatan </label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $result[0]['tempat_lahir'] ?>" required>
					<label>Tempat Lahir</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<label>Tanggal Lahir</label>
				<div class="md-form">
					<input type="date" name="tgl_lahir" class="form-control" value="<?= $result[0]['tgl_lahir'] ?>" required>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<textarea name="alamat" class="md-textarea form-control" required><?= $result[0]['alamat'] ?></textarea>
					<label>Alamat</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="text" name="pendidikan_terakhir" class="form-control" value="<?= $result[0]['pendidikan_terakhir'] ?>" required>
					<label>Pendidikan Terakhir</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<div class="md-form">
					<input type="number" name="no_hp" class="form-control" value="<?= $result[0]['no_hp'] ?>" required>
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
							<input class="form-check-input" type="radio" name="status" value="Belum Nikah" <?= ($result[0]['status'] == "Belum Nikah") ? 'checked' : ''; ?> autocomplete="off"> Belum Nikah
						</label>
						<label class="btn btn-default form-check-label">
							<input class="form-check-input" type="radio" name="status" value="Nikah" <?= ($result[0]['status'] == "Nikah") ? 'checked' : ''; ?> autocomplete="off"> Nikah
						</label>

					</div>
				</div>
				<div class="invalid-feedback">
					Tolong Diisi.
				</div>
				<div class="md-form">
					<input type="number" name="kasbon" class="form-control" value="<?= $result[0]['kasbon'] ?>" required>
					<label>Pinjaman Kasbon</label>
					<div class="invalid-feedback">
						Tolong Diisi.
					</div>
				</div>
				<!-- <hr>
							     <h4>Data Login</h4>
							     <small style="color:red;">*Untuk Username Gunakan NIP</small>
							     <input type="hidden" name="username" class="form-control" value="<?= $result[0]['nip'] ?>">
							     <div class="md-form">
							        <input type="password" name="password" class="form-control">
							        <label>Password</label>
							        <div class="invalid-feedback">
							          Tolong Diisi.
							        </div>
							     </div> -->
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Update</button>
			</form>
		</div>
	</div>
</div>