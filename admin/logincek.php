<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = $_POST['password'];
$sql = "SELECT * FROM administrator WHERE username='$user' AND password='$pass'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['admin_id'] 		= $b['no_col'];
	$_SESSION['admin_username'] 		= $b['username'];
	$_SESSION['admin_name'] 		= $b['nama'];
	$_SESSION['admin_jobs'] 	= $b['job_sheet'];
	$_SESSION['admin_groups'] 	= $b['from_group'];
	$_SESSION['admin_images'] 	= $b['person_image'];
	header('location: index.php?m=awal');
}else{
	echo "Not Matched!";
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("salah")';
	echo '</script>';
}
//echo "string";
?>
