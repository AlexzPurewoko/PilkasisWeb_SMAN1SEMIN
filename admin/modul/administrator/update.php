<?php
if (isset($_POST['simpan'])) {
	include "../sambungan.php";
	$id = $_POST['id'];
	$pengguna = $_POST['username'];
	$sandi	= $_POST['password'];
	$nama	= $_POST['nama'];
	$group = $_POST["id_group"];
	$jabatan = $_POST['job_sheet'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$namafile = $_FILES['foto']['name'];
	$tipefile = $_FILES['foto']['type'];
	if (empty($_POST['password'])) {
		if (empty($lokasi)) {
			$sql = "UPDATE administrator SET username='$pengguna', nama='$nama', job_sheet='$jabatan', from_group='$group' WHERE no_col='$id'";
		} else {
			include "../fungsi/upload.php";
			$folder = "../gambar/pengguna/";
			$ukuran = 100;
			UploadFoto($namafile, $folder, $ukuran);
			$sql = "UPDATE administrator SET username='$pengguna', nama='$nama', job_sheet='$jabatan', foto='$namafile', from_group='$group'  WHERE no_col='$id'";
		}
	} else {
		if (empty($lokasi)) {
			$sql = "UPDATE administrator SET username='$pengguna', password='$sandi', nama='$nama', job_sheet='$jabatan', from_group='$group'  WHERE no_col='$id'";
		} else {
			include "../fungsi/upload.php";
			$folder = "../gambar/pengguna/";
			$ukuran = 100;
			UploadFoto($namafile, $folder, $ukuran);
			$sql = "UPDATE administrator SET username='$pengguna', password='$sandi', nama='$nama', job_sheet='$jabatan', foto='$namafile', from_group='$group' WHERE no_col='$id'";
		}
	}
	$simpan = mysqli_query($koneksi, $sql);
	if ($simpan) {
		//$_SESSION['idkasis'] 		= $b['idpengguna'];
		$_SESSION['admin_username'] 		= $pengguna;
		$_SESSION['admin_name'] 		= $nama;
		$_SESSION['admin_jobs'] 	= $jabatan;
		$_SESSION['admin_groups'] 	= $group;
		if (!empty($lokasi)) {
			$_SESSION['admin_images'] 	= $namafile;
		}
		header('Location:index.php?m=admin&s=awal');
		//echo "berhasil";
	} else {
		echo "gagal alias tidak berhasil";
		include "index.php?m=admin&s=awal";
		echo '<script language="JavaScript">';
		echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
	}
	echo $simpan;
} else {
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>