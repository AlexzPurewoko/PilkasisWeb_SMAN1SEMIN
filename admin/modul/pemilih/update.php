<?php
if (isset($_POST['simpan'])) {
	include_once "../sambungan.php";
	$id = $_POST['nis'];
	$pengguna = $_POST['username'];
	$sandi	= $_POST['password'];
	$nama	= $_POST['nama'];
	$idkelas = $_POST['id_group'];
	$aktif = $_POST['aktif'];

	if (empty($_POST['password'])) {
		$sql = "UPDATE pemilih SET username='$pengguna', nama='$nama', group_id='$idkelas', activated='$aktif' WHERE nis='$id'";
	} else {
		$sql = "UPDATE pemilih SET username='$pengguna', nama='$nama', group_id='$idkelas', password='$sandi', activated='$aktif' WHERE nis='$id'";
	}
	$simpan = mysqli_query($koneksi, $sql);
	//var_dump($sql);
	if ($simpan) {
		header('Location:index.php?m=pemilih');
		//echo "berhasil";
	} else {
		//echo "gagal alias tidak berhasil";
		include "index.php?m=pemilih&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
		//var_dump($sql);
	}
} else {
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>