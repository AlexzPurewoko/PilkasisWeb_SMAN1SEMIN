<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);
unset($_SESSION['admin_name']);
unset($_SESSION['admin_jobs']);
unset($_SESSION['admin_groups']);
unset($_SESSION['admin_images']);
echo "<script>window.location='../'</script>";
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
