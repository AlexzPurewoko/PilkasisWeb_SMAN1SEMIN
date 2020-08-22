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
			<li class="active">Tambah</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Form Tambah Pemilih</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<!--Mulai buat form-->
						<form action="?m=pemilih&s=simpan" method="post" enctype="multipart/form-data">
							<table id="pilkasis1" class="table table-bordered table-hover table-striped">
								<tbody>
									<tr>
										<td>Username*</td>
										<td><input type="text" name="username" placeholder="Username" size="25px" maxlength="25px" required /></td>
									</tr>
									<tr>
										<td>Password*</td>
										<td><input type="password" name="password" placeholder="Password" size="25px" required /></td>
									</tr>
									<tr>
										<td width=174>NIS*</td>
										<td><input type="number" name="nis" placeholder="Nomor Induk" size="10px" maxlength="9px" required /><small> maksimal 9 karakter</small></td>
									</tr>
									<tr>
										<td>Nama Lengkap*</td>
										<td><input type="text" name="nama" placeholder="Nama" size="50px" maxlength="50px" required /></td>
									</tr>
									<tr>
										<td>Kelompok</td>
										<td>
											<select name="id_group" required>
												<?php
												include "../sambungan.php";
												$sql = "SELECT * FROM groups ORDER BY nama_group";
												$query = mysqli_query($koneksi, $sql);
												while ($r = mysqli_fetch_assoc($query)) {
													echo "<option value='" . $r['id_group'] . "'>" . $r['nama_group'] . "</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Aktifkan Pemilih?</td>
										<td><input type="radio" name="aktif" id="aktifY" value="Yes" />Ya &nbsp;&nbsp;
											<input type="radio" name="aktif" id="aktifT" value="No" checked />Tidak</td>
									</tr>
									<tr>
										<td colspan=3>
											<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
											<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
											<a href="?m=pemilih" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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