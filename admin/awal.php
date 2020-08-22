<?php include "atas.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Pilkasis
        <small>Pemilihan Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
<?php
include_once "../sambungan.php";
$sql="SELECT count(no_col) as group_count FROM groups";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['group_count']."</h3>";
?>
              <p>Kelas Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?m=kelas" class="small-box-footer">Info Kelas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
<?php
$sql="SELECT count(nis) as pemilih_count FROM pemilih";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['pemilih_count']."</h3>";
?>
              <p>Pemilih Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=siswa" class="small-box-footer">Info Pemilih <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
<?php
$sql="SELECT count(idkandidat) as kandidat_count FROM kandidat";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['kandidat_count']."</h3>";
?>
              <p>Kandidat terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?m=kandidat" class="small-box-footer">Info Kandidat Ketua OSIS <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php
$sql="SELECT count(id_pemilih) as pemilih_count FROM pemilih WHERE activated='yes'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['pemilih_count']."</h3>";
?>              <p>Pemilih Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?m=admin" class="small-box-footer">Info Pengguna <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->

<?php include "bawah.php"; ?>
