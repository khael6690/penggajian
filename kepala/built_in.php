<?php
session_start();
include '../vendor/fungsi.php';
$fungsi = new Gaji();
$data = new DBConnection();
if (!isset($_SESSION['username'])) {
	header('location:' . $fungsi->config()['url'] . '/login.php');
} elseif ($_SESSION['level'] == 1) {
	header('location:' . $fungsi->config()['url'] . '/admin/index.php');
} elseif ($_SESSION['level'] == 3) {
	header('location:' . $fungsi->config()['url'] . '/index.php');
}

function terbilangIDR($angka)
{
    $angka = abs($angka); // Menghindari angka negatif

    $terbilang = array(
        '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
        'sebelas', 'dua belas', 'tiga belas', 'empat belas', 'lima belas', 'enam belas', 'tujuh belas', 'delapan belas', 'sembilan belas'
    );

    $satuan = array('', 'ribu', 'juta', 'miliar', 'triliun'); // Menyesuaikan dengan mata uang IDR

    $hasil = '';
    $index = 0;

    do {
        $ratusan = $angka % 1000; // Mengambil 3 digit terakhir
        $angka = $angka / 1000; // Mengurangi 3 digit terakhir

        // Konversi 3 digit terakhir menjadi terbilang
        $terbilangRatusan = '';

        if ($ratusan > 0) {
            if ($ratusan < 20) {
                $terbilangRatusan = $terbilang[$ratusan];
            } elseif ($ratusan < 100) {
                $terbilangRatusan = $terbilang[floor($ratusan / 10)] . ' puluh ' . $terbilang[$ratusan % 10];
            } else {
                $terbilangRatusan = $terbilang[floor($ratusan / 100)] . ' ratus ' . $terbilang[$ratusan % 100];
            }
        }

        // Menambahkan terbilang ratusan dengan satuan yang sesuai
        if ($terbilangRatusan != '') {
            $hasil = $terbilangRatusan . ' ' . $satuan[$index] . ' ' . $hasil;
        }

        $index++;
    } while ($angka >= 1);

    return $hasil . ' rupiah';
}
