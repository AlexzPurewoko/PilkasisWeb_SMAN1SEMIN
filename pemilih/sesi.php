<?php
if(empty($_SESSION['id_pemilih']) AND empty($_SESSION['username_pemilih'])){
	header('location:login.php');
}
?>
