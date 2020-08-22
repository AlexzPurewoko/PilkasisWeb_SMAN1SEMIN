<?php
if(empty($_SESSION['admin_id']) AND empty($_SESSION['admin_username'])){
	header('location:login.php');
}
?>
