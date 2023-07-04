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
					<h3><?= $fungsi->config()['perusahaan']; ?></h3>
					<h4><?= $fungsi->config()['alamat_perusahaan']; ?></h4>
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery-2.1.0.js"></script>
</body>

</html>