<?php
include 'built_in.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
?>

<body>
    <script src="<?= $fungsi->config()['url'] ?>/assets/static/js/initTheme.js"></script>

    <div id="app">
        <?php
        $title = 'keuangan';
        include 'sidebar.php'
        ?>
        <div id="main" class="layout-navbar">
            <?php include '../navbar.php' ?>
            <div id="main-content">
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

                        <?php
                        if (@$_GET['page'] == 'tambah') {

                            include 'page/keuangan/tambah.php';
                        } elseif (@$_GET['page'] == 'update' && isset($_GET['id'])) {
                            $result = $data->viewDB('keuangan', 'id_keuangan', $_GET['id']);
                            if ($_GET['id'] != $result[0]['id_keuangan']) {
                                header('location:keuangan.php');
                            }

                            include 'page/keuangan/update.php';
                        } else { ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center">Data Keuangan</h3>
                                    </div>
                                    <div class="card-body">
                                        <a href="?page=tambah" class="btn btn-primary my-3">Tambah Data</a>
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
                                                    $totalsaldo = 0;
                                                    $row = $data->cosviewDB('SELECT K.*,P.nama FROM keuangan K LEFT JOIN pegawai P ON P.nip = K.nip');
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
                                                                <a href="?page=update&id=<?= $val['id_keuangan'] ?>" class="btn icon btn-primary m-1"><i class="bi bi-pencil"></i></a>
                                                                <a href="?page=delete&id=<?= $val['id_keuangan'] ?>" class="btn icon btn-danger m-1" onclick="return confirm('Apakah Ingin Menghapus Data Ini?');"><i class="bi bi-trash"></i></a>

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
                                                        <th colspan="2">Total Saldo: Rp. <?= number_format($totalsaldo, 0, ',', '.') ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $fungsi->config()['url'] ?>/assets/static/js/components/dark.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/compiled/js/app.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= $fungsi->config()['url'] ?>/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.5/b-2.4.0/b-colvis-2.4.0/b-html5-2.4.0/b-print-2.4.0/datatables.min.js"></script>
    <script>
        const namaBulan = {
            0: 'Januari',
            1: 'Februari',
            2: 'Maret',
            3: 'April',
            4: 'Mei',
            5: 'Juni',
            6: 'Juli',
            7: 'Agustus',
            8: 'September',
            9: 'Oktober',
            10: 'November',
            11: 'Desember'
        };

        // Mendapatkan tanggal saat ini
        const tanggalSekarang = new Date();

        // Mendapatkan tanggal, bulan, dan tahun dari objek tanggal saat ini
        const tanggal = tanggalSekarang.getDate();
        const bulan = tanggalSekarang.getMonth();
        const tahun = tanggalSekarang.getFullYear();

        // Mengonversi bulan menjadi nama bulan dalam bahasa Indonesia
        const namaBulanIndonesia = namaBulan[bulan];

        // Format tanggal dalam format "30 Juni 2023"
        const tanggalFormatIndonesia = tanggal + ' ' + namaBulanIndonesia + ' ' + tahun;
        $(document).ready(function() {
            $('#example').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                dom: "<'row'<'col-sm-12 col-md-6' B l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                    extend: 'print',
                    text: 'Print',
                    title: ' ',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(win) {
                        $(win.document.body).find('table').append('<tfoot>' + $('#example tfoot').html() + '</tfoot>');
                        const header = ` <div class="row mb-3">
                                            <div class="col">
                                                <h3 class="text-center font-weight-bold"><?= $fungsi->config()['perusahaan']; ?></h3>
                                                <h3 class="text-center p-0 m-0">Laporan Keuangan</h3>
                                                <p class="text-center p-0 m-0 font-weight-light"><?= $fungsi->config()['alamat_perusahaan']; ?></p>
                                                <hr>
                                            </div>
                                        </div>`;
                        const footer = ` <div class="row float-end mt-5">
                                            <div class="col-sm-2">
                                                <p class="font-weight-light">Cirebon, ${tanggalFormatIndonesia}</p>
                                                <br>
                                                <br>
                                                <br>
                                                <p>(..............................)</p>
                                            </div>
                                        </div>`;
                        $(win.document.body).prepend(header);
                        $(win.document.body).append(footer);
                        $(win.document.body).css('font-family', 'Propins, sans-serif');
                    }
                }, {
                    extend: 'colvis',
                    text: 'Tampilan kolom'
                }, ]
            });

            let choices = document.querySelectorAll(".choices")
            let initChoice
            for (let i = 0; i < choices.length; i++) {
                if (choices[i].classList.contains("multiple-remove")) {
                    initChoice = new Choices(choices[i], {
                        delimiter: ",",
                        editItems: true,
                        maxItemCount: -1,
                        removeItemButton: true,
                    })
                } else {
                    initChoice = new Choices(choices[i])
                }
            }
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
        })
    </script>
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
    <?php
    if (@$_GET['page'] == 'tambah' && isset($_POST['submit'])) {
        $post = array(
            'nip' => $_POST['nip'],
            'jumlah_uang' => $_POST['jumlah_uang'],
            'tanggal' => $_POST['tanggal'],
            'keterangan' => $_POST['keterangan'],
            'jenis' => $_POST['jenis']
        );
        $result = $data->insertDB('keuangan', $post);
        if ($result) {
            $fungsi->flash('alert',  'Toast.fire({icon: "success",title: "Berhasil ditambahkan!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/keuangan.php"; }, 1500);</script>';
        } else {
            $fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal ditambahkan!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
        }
    } elseif (@$_GET['page'] == 'update' && isset($_GET['id']) && isset($_POST['submit'])) {
        $post = array(
            'nip' => $_POST['nip'],
            'jumlah_uang' => $_POST['jumlah_uang'],
            'tanggal' => $_POST['tanggal'],
            'keterangan' => $_POST['keterangan'],
            'jenis' => $_POST['jenis']
        );
        $result = $data->updateDB('keuangan', $post, 'id_keuangan', $_POST['id_keuangan']);
        if ($result) {
            $fungsi->flash('alert', 'Toast.fire({icon: "success",title: "Berhasil diupdate!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . ' 
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/keuangan.php"; }, 1500);</script>';
        } else {
            $fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal diupdate!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
        }
    } elseif (@$_GET['page'] == 'delete' && isset($_GET['id'])) {
        $result = $data->deleteDB('keuangan', 'id_keuangan', $_GET['id']);
        if ($result) {
            $fungsi->flash('alert', 'Toast.fire({icon: "success",title: "Berhasil dihapus!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . '
	                				setTimeout(function(){ window.location="' . $fungsi->config()["url"] . '/admin/keuangan.php"; }, 1500);</script>';
        } else {
            $fungsi->flash('alert', 'Toast.fire({icon: "error",title: "Gagal dihapus!"})');
            echo '<script type="text/javascript">' . $fungsi->flash('alert') . '</script>';
        }
    }
    ?>
</body>

</html>