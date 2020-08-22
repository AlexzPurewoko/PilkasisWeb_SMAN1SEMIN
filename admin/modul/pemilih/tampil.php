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
      <li><a href="?m=pemilih"><i class="fa fa-laptop"></i> Pemilih</a></li>
      <li class="active">Daftar</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?m=pemilih&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Pemilih</a>
            <h3 class="box-title">Daftar Pemilih</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <?php
            include "../sambungan.php";
            $sql = "SELECT pemilih.*, groups.nama_group FROM pemilih,groups WHERE groups.id_group=pemilih.group_id ORDER BY groups.nama_group";
            $query = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($query) == 0) {
              echo '              <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Username</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Teraktivasi</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>';
              echo "<td colspan='9'>Data Masih Kosong</td>";
            } else {
              echo '              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Username</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Teraktivasi</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>';
              $no = 1;
              while ($r = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>$no</td>";
                echo "<td><a href='?m=pemilih&s=detail&nis=" . $r['nis'] . "'>" . $r['username'] . "</a></td>";
                echo "<td>" . $r['nis'] . "</td>";
                echo "<td>" . $r['nama'] . "</td>";
                echo "<td>" . $r['nama_group'] . "</td>";
                echo "<td>" . $r['activated'] . "</td>";
                echo '<td><a href="index.php?m=pemilih&s=edit&nis=' . $r['nis'] . '"><i class="fa fa-edit"></i></a> | <a href="index.php?m=pemilih&s=hapus&nis=' . $r['nis'] . '" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-remove"></i></a></td>';
                echo "</tr>";
                $no++;
              }
            }
            ?>
            </tbody>
            <tfoot>
              <tr bgcolor="#ccc">
                <th>No</th>
                <th>Username</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Teraktivasi</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
            </table>
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