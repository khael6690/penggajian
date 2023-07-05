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
            <div class="row justify-content-md-center mt-5 p-5">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Data Keuangan</h3>
                            </div>
                            <div class="card-body">
                                <a href="?page=tambah" class="btn btn-default">Tambah Data</a>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                                        <button type="button" data-toggle="modal" data-target="#des<?= $val['id_keuangan'] ?>" class="btn btn-success"><i class="far fa-eye"></i> Details</button>

                                                        <!-- modal detail -->
                                                        <div class="modal fade" id="des<?= $val['id_keuangan'] ?>" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-md" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabel">Details Keuangan</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table">
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
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            </div>
        </div>
    </main>
    <script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/compiled.min.js"></script>
    <script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery.PrintArea.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
                        const footer = ` <div class="row justify-content-end mt-5">
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

            $('.mdb-select').material_select();

            $("#cetak").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("print#areaprint").printArea(options);
            });
        });
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
</body>

</html>