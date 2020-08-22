<?php
include "sesi.php";
include "../sambungan.php";
if (isset($_GET['idketua']) && $_SESSION['memilih'] == 0) {
  $type = $_GET['idketua'];
  $query = "UPDATE `pemilih` SET `memilih`='" . $type . "' WHERE `nis`='" . $_SESSION['nis_pemilih'] . "' AND `username`='" . $_SESSION['username_pemilih'] . "'";
  //print_r($query);die;
  $method = mysqli_query($koneksi, $query);
  if ($method) {
    $_SESSION['state_pilih'] = 1;
    $_SESSION['memilih'] = $type;
  } else {
    $_SESSION['state_pilih'] = 2;
  }
  header('Location: index.php?m=awal');
}
?>