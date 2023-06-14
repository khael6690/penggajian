<div class="col-md-8">
	<div class="card">

		<h5 class="card-header info-color white-text py-4">
			<strong>Tambah Slip Gaji</strong>
		</h5>
		<div class="card-body px-lg-5">
			<form method="post" class="needs-validation" style="color: #757575;" novalidate>
				<div class="form-group">
					<div class="md-form">
						<label>NIP</label>
						<input type="text" name="nip" class="form-control" value="<?= $result[0]['nip'] ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label>Periode</label>
					<div class="md-form">
						<input type="hidden" name="nip" class="form-control" value="<?= $result[0]['nip'] ?>">
						<input type="month" name="periode" class="form-control" required>
						<div class="invalid-feedback">
							Tolong Diisi.
						</div>
					</div>
				</div>
				<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Tambah</button>
			</form>
		</div>
	</div>

</div>