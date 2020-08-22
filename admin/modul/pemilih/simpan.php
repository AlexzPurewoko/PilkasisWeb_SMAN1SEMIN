<?php
if (isset($_POST['simpan'])) {
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$pengguna = $_POST['username'];
	$sandi	= $_POST['password'];
	$nama	= $_POST['nama'];
	$nis	= $_POST['nis'];
	$hp		= $_POST['hp'];
	$group	= $_POST['id_group'];
	$aktif = $_POST['aktif'];
	$sql = "INSERT INTO pemilih SET nis='$nis', username='$pengguna', password='$sandi', nama='$nama', activated='$aktif', group_id='$group'";
	$simpan = mysqli_query($koneksi, $sql);
	if ($simpan) {
		header('Location:index.php?m=pemilih&s=awal');
		//echo "berhasil";
	} else {
		include "index.php?m=pemilih&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
} else {
	echo '<script>window.history.back()</script>';
}
?>