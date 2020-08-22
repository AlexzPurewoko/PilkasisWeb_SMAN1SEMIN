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
      <li class="active">Detail</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Detail Administrator</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
            $id = $_GET['idp'];
            include "../sambungan.php";
            $sql = "SELECT administrator.*,groups.nama_group FROM administrator,groups WHERE administrator.no_col='$id' AND groups.id_group=administrator.from_group";
            $query = mysqli_query($koneksi, $sql);
            $r = mysqli_fetch_assoc($query);
            ?>
            <table id="pilkasis1" class="table table-bordered table-hover table-striped">
              <tbody>
                <tr>
                  <td width=150>Nama Pengguna</td>
                  <td><?php echo $r['username']; ?></td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td><?php echo $r['nama']; ?></td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td><?php echo $r['job_sheet']; ?></td>
                </tr>
                <tr>
                  <td>Asal Kelompok</td>
                  <td><?php echo $r['nama_group']; ?></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td>
                    <?php
                    if ($r['foto'] != '') {
                      echo "<img src=\"../gambar/pengguna/$r[foto]\" height=150 />";
                    } else {
                      echo "<img src=\"../gambar/pengguna/0.jpg\">";
                    }
                    ?>
                </tr>
                <tr>
                  <td colspan=2>
                    <a href="?m=admin&s=edit&idp=<?php echo $id; ?>" class="btn btn-large btn-primary"><i class="fa fa-times"></i> Edit</a>
                    <a href="?m=admin" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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