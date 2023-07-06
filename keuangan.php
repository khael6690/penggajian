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
        $title = 'keuangan';
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
                            <h3>Keuangan</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= $fungsi->config()['url'] ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Keuangan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <section class="row justify-content-center">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Data Keuangan</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">#</th>
                                                <th>Nama</th>
                                                <th>Uang Pemasukan</th>
                                                <th>Uang Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $totalkeluar = 0;
                                            $totalmasuk = 0;
                                            $row = $data->cosviewDB('SELECT K.*,P.nama FROM keuangan K LEFT JOIN pegawai P ON P.nip = K.nip WHERE K.nip =' . $_SESSION['username']);
                                            foreach ($row as $val) {
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $val['nama'] ?> - <?= $val['nip']; ?></td>
                                                    <td><?= $val['jenis'] == 2 ? 'Rp.' . number_format($val['jumlah_uang'], 0, ',', '.') : '....' ?></td>
                                                    <td><?= $val['jenis'] == 1 ? 'Rp.' . number_format($val['jumlah_uang'], 0, ',', '.') : '....' ?></td>
                                                    <td><?= $val['tanggal']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-target="#modal-detail-<?= $val['id_keuangan'] ?>">
                                                            <i class="bi bi-eye"></i> Details
                                                        </button>

                                                        <!--Modal -->
                                                        <div class="modal fade text-left" id="modal-detail-<?= $val['id_keuangan'] ?>" tabindex="-1" role="dialog" data-bs-backdrop="false">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <h4 class="modal-title">
                                                                            Details Keuangan
                                                                        </h4>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-striped">
                                                                            <tr>
                                                                                <td>Nama - NIP</td>
                                                                                <td><?= $val['nama'] . ' - ' . $val['nip'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jumlah Uang</td>
                                                                                <td>Rp. <?= number_format($val['jumlah_uang'], 0, ',', '.') ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tanggal</td>
                                                                                <td><?= $val['tanggal']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Keterangan</td>
                                                                                <td><?= $val['keterangan']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jenis</td>
                                                                                <td><?= $val['jenis'] == 1 ? 'Pengeluaran' : 'Pemasukan' ?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Close</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                                $val['jenis'] == 1 ? $totalkeluar += $val['jumlah_uang'] : $totalkeluar;
                                                $val['jenis'] == 2 ? $totalmasuk += $val['jumlah_uang'] : $totalmasuk;
                                                $totalsaldo = $totalmasuk - $totalkeluar;
                                            }

                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" style="text-align:center">Total</th>
                                                <th>Rp. <?= number_format($totalmasuk, 0, ',', '.') ?></th>
                                                <th>Rp. <?= number_format($totalkeluar, 0, ',', '.') ?></th>
                                                <th colspan="2">Rp. <?= number_format($totalsaldo, 0, ',', '.') ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?= $fungsi->config()['url'] ?>/assets/static/js/components/dark.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/compiled/js/app.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>