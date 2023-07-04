<?php
session_start();
include '../vendor/fungsi.php';
$fungsi = new Gaji();
$data = new DBConnection();
if (!isset($_SESSION['username'])) {
    header('location:' . $fungsi->config()['url'] . '/login.php');
} elseif ($_SESSION['level'] == 2) {
    header('location:' . $fungsi->config()['url'] . '/kepala/index.php');
} elseif ($_SESSION['level'] == 3) {
    header('location:' . $fungsi->config()['url'] . '/index.php');
}
