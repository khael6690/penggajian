<?php
session_start();
include 'vendor/fungsi.php';
$fungsi = new Gaji();
session_destroy();
header('location:login.php');
?>