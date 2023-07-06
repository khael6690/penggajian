<div class="col-md-8">
	<div class="card">
		<h5 class="card-header info-color white-text py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<div class="form-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" name="nip" class="form-control" value="<?= $result[0]['nip'] ?>" readonly>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="nama">Nama Pegawai</label>
								<input type="text" name="nama" class="form-control" value="<?= $result[0]['nama'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="kelamin">Jenis Kelamin</label>
								<select name="kelamin" class="form-select">
									<option value="Laki-laki" <?= ($result[0]['kelamin'] == "Laki-laki") ? 'selected' : ''; ?>>Laki-laki</option>
									<option value="Perempuan" <?= ($result[0]['kelamin'] == "Perempuan") ? 'selected' : ''; ?>>Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="id_jabatan">Jabatan </label>
								<select name="id_jabatan" class="choices form-select">
									<?php
									$row = $data->viewDB('jabatan');
									foreach ($row as $val) { ?>
										<option value="<?= $val["id_jabatan"] ?>" <?= ($val["id_jabatan"] == $result[0]["id_jabatan"]) ? "selected" : "" ?>><?= $val["jabatan"] ?></option>
									<?php } ?>

								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" name="tempat_lahir" class="form-control" value="<?= $result[0]['tempat_lahir'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="date" name="tgl_lahir" class="form-control" value="<?= $result[0]['tgl_lahir'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea name="alamat" rows="5" class="form-control" style="resize:none ;" required><?= $result[0]['alamat'] ?></textarea>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="pendidikan_terakhir">Pendidikan Terakhir</label>
								<input type="text" name="pendidikan_terakhir" class="form-control" value="<?= $result[0]['pendidikan_terakhir'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="no_hp">Nomor Handphone</label>
								<input type="number" name="no_hp" class="form-control" value="<?= $result[0]['no_hp'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" class="form-select">
									<option value="Belum Nikah" <?= ($result[0]['status'] == "Belum Nikah") ? 'selected' : ''; ?>>Belum Nikah</option>
									<option value="Nikah" <?= ($result[0]['status'] == "Nikah") ? 'selected' : ''; ?>>Nikah</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="kasbon">Pinjaman Kasbon</label>
								<input type="number" name="kasbon" class="form-control" value="<?= $result[0]['kasbon'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-end">
							<button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
								Submit
							</button>
							<a href="<?= $fungsi->config()['url'] ?>/admin/pegawai.php" class="btn btn-danger me-1 mb-1">
								Batal
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>