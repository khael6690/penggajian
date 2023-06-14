<?php
include 'built_in.php'
?>
<!DOCTYPE html>
<html>
<?php
include 'head.php'
?>

<body class="bg-light">
    <?php
    include 'nav.php'
    ?>

    <main>
        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col text-center">
                    <h2>Selamat Datang Di <?= $fungsi->config()['judul'] ?></h2>
                    <img src="<?= $fungsi->config()['url'] ?>/assets/img/logo.png">
                </div>
            </div>
        </div>
    </main>
    <?php
    include 'foot.php'
    ?>
</body>

</html>