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
      <li class="active">Tambah</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Form Tambah Kelompok Pemilih</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!--Mulai buat form-->
            <form action="?m=kelas&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>

                  <tr>
                    <td>Id Kelompok*</td>
                    <td><input type="text" name="id_group" size="18px" maxlength="16px" /></td>
                  </tr>
                  <tr>
                    <td width=174>Nama Kelompok*</td>
                    <td><input type="text" name="nama_group" size="24px" maxlength="24px" required /></td>
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