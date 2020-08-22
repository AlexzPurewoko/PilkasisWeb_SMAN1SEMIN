<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = $_POST['password'];
$sql = "SELECT * FROM pemilih WHERE username='$user' AND password='$pass'";
$login = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($login);
$b = mysqli_fetch_array($login);
if ($ketemu > 0) {
	session_start();
	$_SESSION['id_pemilih'] 		= $b['id_pemilih'];
	$_SESSION['nama_pemilih']		= $b['nama'];
	$_SESSION['id_kelas_pemilih']		= $b['group_id'];
	$_SESSION['username_pemilih'] 	= $b['username'];
	$_SESSION['password_pemilih']		= $b['password'];
	$_SESSION['nis_pemilih']		= $b['nis'];
	$_SESSION['memilih'] 	= $b['memilih'];
	$_SESSION['state_pilih'] = 0;

	if ($b['activated'] == 'No') {
		include "login.php";
		echo '<script language="javascript">';
		echo 'alert ("Akun anda dinonaktifkan/belum diaktifkan oleh administrator")';
		echo '</script>';
		return;
	} elseif ($b['memilih'] != 0) {
		include "login.php";
		echo '<script language="javascript">';
		echo 'alert ("Mohon maaf! anda sudah memilih. Anda tidak dapat merubah pilihan anda!")';
		echo '</script>';
		return;
	}

	// sets the photo into default
	$_SESSION['foto_pemilih'] = "0.jpg";
	$idgroups = $b['group_id'];
	$sql2 = "SELECT * FROM groups WHERE id_group='$idgroups'";
	$aksi = mysqli_query($koneksi, $sql2);
	$c = mysqli_fetch_array($aksi);
	$_SESSION['nama_group_pemilih'] 	= $c['nama_group'];
	header('Location: index.php?m=awal');
} else {
	include "login.php";
	echo '<script language="javascript">';
	echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
