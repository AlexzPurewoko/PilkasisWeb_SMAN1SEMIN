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
      <li><a href="?m=kelas"><i class="fa fa-laptop"></i> Kelompok Pemilih</a></li>
      <li class="active">Detail</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail Kelompok Pemilih</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
            $id = $_GET['id'];
            include "../sambungan.php";
            $sql = "SELECT * FROM groups WHERE id_group='$id'";
            $query = mysqli_query($koneksi, $sql);
            $r = mysqli_fetch_assoc($query);
            ?>
            <table id="pilkasis1" class="table table-bordered table-hover table-striped">
              <tbody>
                <tr>
                  <td width=150>Nama Kelompok</td>
                  <td><?php echo $r['nama_group']; ?></td>
                </tr>
                <tr>
                  <td>Jumlah Pemilih</td>
                  <td><?php
                      $count_query = "SELECT count(1) as count_pemilih FROM pemilih WHERE group_id=" . $id;
                      $rQ = mysqli_query($koneksi, $count_query);
                      $arr = mysqli_fetch_array($rQ);
                      echo $arr['count_pemilih']; ?></td>
                </tr>
                <tr>
                  <td colspan=2>
                    <a href="?m=kelas&s=edit&id=<?php echo $id; ?>" class="btn btn-large btn-primary"><i class="fa fa-times"></i> Edit</a>
                    <a href="?m=kelas" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
                </tr>
              </tbody>
            </table>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  <?php include "bawah.php"; ?>