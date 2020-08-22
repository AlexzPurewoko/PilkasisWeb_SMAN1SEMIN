<?php
include "sesi.php";
if (isset($_GET['idp'])) {
	include "../sambungan.php";
	$id = $_GET['idp'];
	$sql   = "SELECT * FROM administrator WHERE no_col='$id'";
	$hapus = mysqli_query($koneksi, $sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['person_image'] != '') {
		$foto = $r['person_image'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/pengguna/$foto");
		$sql1   = "DELETE FROM administrator WHERE no_col='$id'";
	} else {
		$sql1   = "DELETE FROM administrator WHERE no_col='$id'";
	}

	$hapus1 = mysqli_query($koneksi, $sql1);
	if ($hapus1) {
		header("Location: ?m=admin");
	} else {
		echo 'Administrator GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>