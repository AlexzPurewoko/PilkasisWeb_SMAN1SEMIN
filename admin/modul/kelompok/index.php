<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/kelompok/tampil.php"; break;
	case 'tambah': include "modul/kelompok/tambah.php"; break;
	case 'simpan': include "modul/kelompok/simpan.php"; break;
	case 'edit': include "modul/kelompok/edit.php"; break;
	case 'update': include "modul/kelompok/update.php"; break;
	case 'hapus': include "modul/kelompok/hapus.php"; break;
	case 'detail': include "modul/kelompok/detail.php"; break;
	case 'profil': include "modul/kelompok/profil.php"; break;
}
?>
