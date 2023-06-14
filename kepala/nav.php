<header>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
        <a class="navbar-brand" href="<?= $fungsi->config()['url'] ?>"><strong><?= $fungsi->config()['judul'] ?></strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>/kepala/jabatan.php">Jabatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>/kepala/pegawai.php">Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>/kepala/absen.php">Absensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>/kepala/gaji.php">Gaji</a>
                </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $fungsi->config()['url'] ?>/out.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

</header>