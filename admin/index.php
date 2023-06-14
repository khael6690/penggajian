<?php
include 'built_in.php';
include 'head.php';
?>

<body class="bg-light">
	<?php
	include 'nav.php'
	?>

	<main>
		<div class="container">
			<div class="row mt-5 pt-5">
				<div class="col text-center">
					<h2>Selamat Datang Di Sistem Penggajian</h2>
					<img src="<?= $fungsi->config()['url'] ?>/assets/img/logo.png">
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery-2.1.0.js"></script>
</body>

</html>