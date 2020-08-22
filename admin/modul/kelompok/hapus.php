<?php
if (isset($_GET['id'])) {
	include "../sambungan.php";
	$id = $_GET['id'];
	// delete groups
	$sql   = "DELETE FROM groups WHERE id_group='$id'";
	$hapus = mysqli_query($koneksi, $sql);

	// delete all users
	$sql   = "DELETE FROM pemilih WHERE group_id=$id";
	$hapus = mysqli_query($koneksi, $sql);

	if ($hapus) {
		header("Location: ?m=kelompok");
	} else {
		include "index.php?m=kelompok&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Data Gagal Dihapus.")';
		echo '</script>';
	}
}
?>