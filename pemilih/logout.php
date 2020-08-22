<?php
session_start();
unset($_SESSION['id_pemilih']);
unset($_SESSION['nama_pemilih']);
unset($_SESSION['id_kelas_pemilih']);
unset($_SESSION['username_pemilih']);
unset($_SESSION['password_pemilih']);
unset($_SESSION['nis_pemilih']);
unset($_SESSION['memilih']);
unset($_SESSION['foto_pemilih']);
unset($_SESSION['nama_group_pemilih']);
unset($_SESSION['state_pilih']);

echo "<script>window.location='../'</script>";
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
