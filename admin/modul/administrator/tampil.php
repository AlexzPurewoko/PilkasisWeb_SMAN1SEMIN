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
      <li><a href="?m=admin"><i class="fa fa-laptop"></i> Administrator</a></li>
      <li class="active">Daftar</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?m=admin&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Administrator</a>
            <h3 class="box-title">Daftar Administrator</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="pilkasis1" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Tugas/Jobs</th>
                  <th>Dari Kelompok</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "../sambungan.php";
                $sql = "SELECT administrator.*,groups.nama_group FROM administrator,groups WHERE groups.id_group=administrator.from_group ORDER BY groups.nama_group";
                $query = mysqli_query($koneksi, $sql);
                if (mysqli_num_rows($query) == 0) {
                  echo "<td colspan='6'>Data Masih Kosong</td>";
                } else {
                  $no = 1;
                  while ($r = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td><a href='?m=admin&s=detail&idp=" . $r['no_col'] . "'>" . $r['username'] . "</a></td>";
                    echo "<td>" . $r['nama'] . "</td>";
                    echo "<td>" . $r['job_sheet'] . "</td>";
                    echo "<td>" . $r['nama_group'] . "</td>";
                    echo '<td><a href="index.php?m=admin&s=edit&idp=' . $r['no_col'] . '">Edit</a> | <a href="index.php?m=admin&s=hapus&idp=' . $r['no_col'] . '" onclick="return confirm(\'Yakin Akan dihapus?\')">Hapus</a></td>';
                    echo "</tr>";
                    $no++;
                  }
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Tugas/Jobs</th>
                  <th>Dari Kelompok</th>
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