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
      <li class="active">Daftar</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?m=kelas&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Kelompok</a>
            <h3 class="box-title">Daftar Kelompok Pemilih</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="pilkasis1" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelompok</th>
                  <th>Jumlah Pemilih</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "../sambungan.php";
                $sql = "SELECT * FROM groups ORDER BY id_group";
                $query = mysqli_query($koneksi, $sql);
                if (mysqli_num_rows($query) == 0) {
                  echo "<td colspan='6'>Data Masih Kosong</td>";
                } else {
                  $no = 1;
                  while ($r = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td><a href='?m=pemilih&s=detail&id=" . $r['id_group'] . "'>" . $r['nama_group'] . "</a></td>";
                    $count_query = "SELECT count(1) as count_pemilih FROM pemilih WHERE group_id=" . $r['id_group'];
                    $rQ = mysqli_query($koneksi, $count_query);
                    $arr = mysqli_fetch_array($rQ);
                    echo "<td>" . $arr['count_pemilih'] . "</td>";
                    echo '<td><a href="index.php?m=pemilih&s=edit&id=' . $r['id_group'] . '">Edit</a> | <a href="index.php?m=pemilih&s=hapus&id=' . $r['id_group'] . '" onclick="return confirm(\'Yakin Akan dihapus?\')">Hapus</a></td>';
                    echo "</tr>";
                    $no++;
                  }
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Kelompok</th>
                  <th>Jumlah Pemilih</th>
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