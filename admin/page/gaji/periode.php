<div class="col-md-8">
	<div class="card">

		<h5 class="card-header info-color text-white py-4">
			<strong>Tambah Slip Gaji</strong>
		</h5>
		<div class="card-body px-lg-5">
			<form method="post" class="form form-vertical needs-validation" novalidate>
				<div class="form-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" name="nip" class="form-control" value="<?= $result[0]['nip'] ?>" readonly>
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