<?php
include 'vendor/fungsi.php';
$fungsi = new Gaji();
session_start();
if (isset($_SESSION['username'])) {
	header('location:' . $fungsi->config()['url'] . '/index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?= $fungsi->config()['url'] ?>/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= $fungsi->config()['url'] ?>/assets/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
</head>

<body class="bg-light">
	<div class="container">
		<div class="row justify-content-center align-items-center py-5">
			<div class="col-md-4 mb-4">
				<div class="card">

					<h5 class="card-header info-color white-text text-center py-4">
						<strong>Login</strong>
					</h5>
					<?php
					if (isset($_GET['login']) == 'gagal') {
						echo '<p class="border border-danger p-3">Login Gagal, Tolong periksa Username dan Password dengan benar!</p>';
					}
					if (isset($_POST['submit'])) {
						$fungsi->login($_POST['username'], $_POST['password']);
					}
					?>
					<div class="card-body px-lg-5 pt-0">

						<form method="post" class="text-center needs-validation" style="color: #757575;" novalidate>

							<div class="md-form">
								<input type="text" name="username" class="form-control" required>
								<label>Username</label>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>

							<div class="md-form">
								<input type="password" name="password" class="form-control" required>
								<label>Password</label>
								<div class="invalid-feedback">
									Tolong Diisi.
								</div>
							</div>

							<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Login</button>

						</form>

					</div>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/compiled.min.js"></script>
	<script type="text/javascript">
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
</body>

</html>