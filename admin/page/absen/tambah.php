<div class="col-lg-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Tambah Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<div class="form-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="nip">Nama Pegawai</label>
								<select name="nip" class="choices form-select">
									<?php
									$row = $data->viewDB('pegawai');
									foreach ($row as $val) { ?>
										<option value="<?= $val["nip"] ?>">(<?= $val["nip"] ?>) <?= $val["nama"] ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="periode">Periode</label>
								<input type="month" name="periode" class="form-control" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="masuk">Kehadiran</label>
								<input type="number" name="masuk" class="form-control" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="izin">Izin Berhalangan</label>
								<input type="number" name="izin" class="form-control" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="jam_lembur">Jam Lembur</label>
								<input type="number" name="jam_lembur" class="form-control" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-end">
							<button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
								Submit
							</button>
							<a href="<?= $fungsi->config()['url'] ?>/admin/absen.php" class="btn btn-danger me-1 mb-1">
								Batal
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>