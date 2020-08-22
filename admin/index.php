<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Admin Pilkasis | SMA Negeri 1 SEMIN";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'admin': $aktif="Admin"; $judul="Modul $jawal"; include "modul/administrator/index.php"; break;
	case 'kelompok': $aktif="Kelompok"; $judul="Modul Kelas $jawal"; include "modul/kelompok/index.php"; break;
	case 'pemilih': $aktif="Pemilih"; $judul="Modul Pemilih $jawal"; include "modul/pemilih/index.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
	case 'real_count': $aktif="Real Count"; $judul="Modul RealCount $jawal"; include "realcount.php"; break;
}
inc
?>
