<?php
if (isset($_POST['simpan'])) {
	include "../sambungan.php";
	$kelas	= $_POST['nama_group'];
	$id	= $_POST['id_group'];


	$sql = "SELECT count(1) AS is_matched FROM groups WHERE id_group=$id";
	$checkIfMatchesQ = mysqli_query($koneksi, $sql);
	$checkIfMatches = mysqli_fetch_array($checkIfMatchesQ);
	if ($checkIfMatches['is_matched'] == 0) {
		$sql = "INSERT INTO groups SET nama_group='$kelas', id_group='$id'";
		$simpan = mysqli_query($koneksi, $sql);
		if ($simpan) {
			header('Location:index.php?m=kelas&s=awal');
			//echo "berhasil";
		} else {
			include "index.php?m=kelas&s=awal";
			echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
			echo '</script>';
		}
	} else {
		include "index.php?m=kelas&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Mohon maaf! data tidak bisa ditambahkan karena ada konfilk id dengan yang lain.")';
		echo '</script>';
	}
} else {
	echo '<script>window.history.back()</script>';
}
