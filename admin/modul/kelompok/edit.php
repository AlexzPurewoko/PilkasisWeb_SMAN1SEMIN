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
      <li class="active">Edit</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Form Edit Kelompok Pemilih</h3>
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
            <!--Mulai buat form-->
            <form action="?m=kelas&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <input type="hidden" name="id" value="<?php echo $r['id_group']; ?>" />
                  <tr>
                    <td>Id Kelompok*</td>
                    <td><input type="text" name="id_group" placeholder="IdGroups" size="16px" maxlength="16px" value="<?php echo $r['id_group']; ?>" /></td>
                  </tr>
                  <tr>
                    <td width=150>Nama Kelompok*</td>
                    <td><input type="text" name="kelas" placeholder="Kelas" size="24px" maxlength="24px" value="<?php echo $r['nama_group']; ?>" required /></td>
                  </tr>
                  <tr>
                    <td colspan=3>
                      <input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
                      <input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
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