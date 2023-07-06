<?php
require_once("koneksi.php");
class Gaji
{

	public function config()
	{
		$config['url'] = 'http://localhost/penggajian';
		$config['judul'] = 'Sistem Keuangan dan Penggajian';
		$config['perusahaan'] = 'PT. Mega Baja Cirebon';
		$config['alamat_perusahaan'] = 'Jl. Jendral Sudirman No.24 Penggung Utara';
		$config['nama_atasan'] = 'Tomi';
		return $config;
	}

	public function login($user, $pass)
	{
		$db = new DBConnection();
		$konek = $db->con();
		$username = mysqli_real_escape_string($konek, $user);
		$password = mysqli_real_escape_string($konek, md5($pass));
		$cekuser = $konek->query("SELECT * FROM user WHERE username = '$username' AND password ='$password'");
		$jumlah = $cekuser->num_rows;
		$hasil = $cekuser->fetch_array(MYSQLI_BOTH);
		if ($jumlah == 0) {
			header('location:login.php?login=gagal');
		} elseif ($hasil['password'] != $password) {
			header('location:login.php?login=gagal');
		} elseif ($hasil['level'] == 1) {
			$_SESSION['username'] = $hasil['username'];
			$_SESSION['level'] = $hasil['level'];
			header('location:./admin/index.php');
		} elseif ($hasil['level'] == 2) {
			$_SESSION['username'] = $hasil['username'];
			$_SESSION['level'] = $hasil['level'];
			header('location:./kepala/index.php');
		} else {
			$_SESSION['username'] = $hasil['username'];
			$_SESSION['level'] = $hasil['level'];
			header('location:index.php');
		}
	}

	public function logout()
	{
		session_start();
		session_destroy();
		header('location:login.php');
	}

	public function flash($name = '', $message = '')
	{
		if (!empty($name)) {
			if (!empty($message) && empty($_SESSION[$name])) {
				if (!empty($_SESSION[$name])) {
					unset($_SESSION[$name]);
				}

				$_SESSION[$name] = $message;
			} elseif (!empty($_SESSION[$name]) && empty($message)) {
				$dd = $_SESSION[$name];
				unset($_SESSION[$name]);
				return $dd;
			}
		}
	}

	public function autocode($tabel, $field, $lebar = 0, $awalan = '')
	{
		$db = new DBConnection();
		$konek = $db->con();
		$sqlstr = "SELECT $field FROM $tabel ORDER BY $field DESC LIMIT 1";
		$hasil = $konek->query($sqlstr);
		if (!$hasil) {
			die('Gagal melakukan query auto number: ' . mysqli_error($konek));
		}
		$jumlahrecord = $hasil->num_rows;
		if ($jumlahrecord == 0) {
			$nomor = 1;
		} else {
			$row = $hasil->fetch_array(MYSQLI_BOTH);
			$nomor = intval(substr($row[0], strlen($awalan))) + 1;
		}
		if ($lebar > 0) {
			$angka = $awalan . str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
		} else {
			$angka = $awalan . $nomor;
		}
		return $angka;
	}
}

// $gaji = new Gaji();
// echo $gaji->autocode('gaji','id_gaji',3,'GAJI');
