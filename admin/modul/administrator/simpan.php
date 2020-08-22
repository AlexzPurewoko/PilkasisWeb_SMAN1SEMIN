<?php
include "sesi.php";
if (isset($_POST['simpan'])) {
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$pengguna = $_POST['username'];
	$sandi	= trim($_POST['password']);
	$nama	= $_POST['nama'];
	$jabatan = $_POST['job_sheet'];
	$from_group		= $_POST['id_group'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$namafile = $_FILES['foto']['name'];
	$tipefile = $_FILES['foto']['type'];

	$checkOccurences = "SELECT count(1) as occur FROM administrator WHERE username='$pengguna'";
	$checkOccurencesSql = mysqli_query($koneksi, $checkOccurences);
	$f = mysqli_fetch_assoc($checkOccurencesSql);
	if ($f['occur'] == 0) {
		if (empty($lokasi)) {
			$sql = "INSERT INTO administrator SET username='$pengguna', password='$sandi', nama='$nama', job_sheet='$jabatan', from_group='$from_group'";
		} else {
			$folder = "../gambar/pengguna/";
			$ukuran = 100;
			UploadFoto($namafile, $folder, $ukuran);
			$sql = "INSERT INTO administrator SET username='$pengguna', password='$sandi', nama='$nama', job_sheet='$jabatan', person_image='$namafile', from_group='$from_group'";
		}
		//echo $sql;
		$simpan = mysqli_query($koneksi, $sql);
		if ($simpan) {
			header('Location:?m=admin&s=awal');
			//echo "berhasil";
		} else {
			include "index.php";
			echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
			echo '</script>';
		}
	} else {

		include "?m=admin&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Ada Kesamaan Data!")';
		echo '</script>';
	}
} else {
	echo '<script>window.history.back()</script>';
}
?>