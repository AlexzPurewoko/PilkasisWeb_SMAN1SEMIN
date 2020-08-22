<?php
if (isset($_POST['simpan'])) {
	include "../sambungan.php";
	$id = $_POST['id'];
	$kelas = $_POST['kelas'];
	$newId	= $_POST['id_group'];
	$sql = "UPDATE groups SET nama_group='$kelas', id_group='$newId' WHERE id_group='$id'";
	$simpan = mysqli_query($koneksi, $sql);

	$sql = "UPDATE pemilih SET group_id=$newId WHERE group_id=$id";
	$simpan2 = mysqli_query($koneksi, $sql);
	//var_dump($sql);
	if ($simpan && $simpan2) {
		header('Location:index.php?m=kelas&s=awal');
		//echo "berhasil";
	} else {
		include "index.php?m=kelas&s=awal";
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