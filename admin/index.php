<?php
include 'built_in.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';
?>

<body>
	<script src="<?= $fungsi->config()['url'] ?>/assets/static/js/initTheme.js"></script>

	<div id="app">
		<?php
		$title = 'dashboard';
		include 'sidebar.php'
		?>
		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h3>Dashboard</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">
										Home
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="page-content">
				<section class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<h4 class="card-title text-center">Selamat Datang di <?= $fungsi->config()['judul'] ?></h4>
									<p class="card-text text-center">
										<?= $fungsi->config()['perusahaan']; ?>
									</p>
									<p class="card-text text-center">
										<?= $fungsi->config()['alamat_perusahaan']; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<?php
	include 'foot.php';
	?>
</body>

</html>