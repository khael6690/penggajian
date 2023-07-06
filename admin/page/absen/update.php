<div class="col-lg-8">
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong>Update Data</strong>
		</h5>
		<div class="card-body px-lg-5 pt-0">
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<input type="hidden" name="id_absen" value="<?= $result[0]['id_absen'] ?>">
				<div class="form-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="nip">Nama Pegawai</label>
								<select name="nip" class="choices form-select">
									<?php
									$row = $data->viewDB('pegawai');
									foreach ($row as $val) { ?>
										<option value="<?= $val["nip"] ?>" <?= ($val["nip"] == $result[0]["nip"]) ? "selected" : "" ?>>(<?= $val["nip"] ?>) <?= $val["nama"] ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="periode">Periode</label>
								<input type="month" name="periode" class="form-control" value="<?= date('Y-m', strtotime($result[0]['periode'])) ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="masuk">Kehadiran</label>
								<input type="number" name="masuk" class="form-control" value="<?= $result[0]['masuk'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="izin">Izin Berhalangan</label>
								<input type="number" name="izin" class="form-control" value="<?= $result[0]['izin'] ?>" required>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="jam_lembur">Jam Lembur</label>
								<input type="number" name="jam_lembur" class="form-control" value="<?= $result[0]['jam_lembur'] ?>" required>
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