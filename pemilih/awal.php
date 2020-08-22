<?php include_once "atas.php"; ?>
<?php
include_once "../sambungan.php";
session_start();
$sql = "SELECT * FROM kandidat ORDER BY nokandidat";
$query = mysqli_query($koneksi, $sql);
$memilih = $_SESSION['memilih'];


$state_pilih = $_SESSION['state_pilih'];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Login Siswa Pilkasis
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
      <?php
      //var_dump($sql);
      while ($r = mysqli_fetch_array($query)) {
        $warna = "";
        if ($memilih == 0 || $memilih != $r['nokandidat']) {
          $warna = "bg-aqua";
        } else {
          $warna = "bg-red";
        }
        //////
        echo "        <div class='col-lg-4 col-xs-6'>
          <!-- small box -->
          <div class='small-box $warna'>
            <div class='inner'>";
        echo "<h3>" . $r['nokandidat'] . "</h3>";
        echo "<b>" . $r['nama'] . "</b>";
        echo "<br /><b>" . $r['kelas'] . "</b>";
        $trig = "trigk" . intval($r['nokandidat']);
        echo "<br /><button id='$trig' class='btn btn-flat bg-blue'> Visi Misi    <i class='fa fa-arrow-circle-down'></i></button><br />";
        echo '            </div>
            <div class="icon">
              <img src="../gambar/kandidat/' . $r['foto'] . '" height="100px"/>
            </div>';
        if ($memilih == 0 || $memilih != $r['nokandidat']) {
          echo '<a href="?m=pemilih&s=simpan&idketua=' . $r['nokandidat'] . '" class="small-box-footer">Pilihan Anda? <i class="fa fa-arrow-circle-up"></i></a>';
        } else {
          echo '<a href="#" class="small-box-footer">Anda memilih calon ini<i class="fa fa-check"></i></a>';
        }
        echo '  </div>
        </div>';
      }
      ?>
    </div>
    <!-- /.row -->

    <!-- /.row -->
    <!-- bagian isi Pop - up Kandidat Ketua OSIS-->
    <?php
    $sql = "SELECT * FROM kandidat ORDER BY nokandidat";
    $jumlh = 0;
    $query = mysqli_query($koneksi, $sql);
    while ($r = mysqli_fetch_array($query)) {
      $iddiv = "visimisik" . $r['nokandidat'];
      $idcls = "closek" . $r['nokandidat'];
      $idcnt = "contk" . $r['nokandidat'];
      echo "<div class='visimisi' id='$iddiv'>";
      echo "<div class='visimisi-content' id='$idcnt'>";
      //echo "<span class='close-button' id='$idcls'>&times;</span>";
      echo "<h3> Visi - Misi Kandidat No." . $r['nokandidat'] . " Ketua OSIS</h3><br />";
      echo "<b>Nama Kandidat : </b>" . $r['nama'] . "<br />";
      echo "<b>Kelas         : </b>" . $r['kelas'] . "<br /><br />";
      echo "<h4><b> Visi : </b></h4>";
      echo "<p>" . $r['visi'] . "</p><br />";
      echo "<h4><b> Misi : </b></h4>";
      echo "<p>" . $r['misi'] . "</p>";
      echo "<br /> <div class='pull-right'>
                        <span class='btn btn-large btn-default btn-flat bg-aqua' id='$idcls'><i class='fa fa-check'></i> Tutup</a>
                      </div>";
      echo "</div> </div>";
      $jumlh++;
    }
    echo "<script type='text/javascript'>";
    for ($x = 1; $x <= $jumlh; $x++) {
      $iddiv = "visimisik$x";
      $idcls = "closek$x";
      $idcnt = "contk$x";
      $trig  = "trigk$x";

      echo "var $iddiv = document.getElementById('$iddiv');";
      echo "var $trig = document.getElementById('$trig');";
      echo "var $idcls = document.getElementById('$idcls');";
      echo "console.log('trigk$x', $trig, $idcls);";

      echo "function toggle" . $iddiv . "(){
                        $iddiv.classList.toggle('show-visimisi');
                      }";
      echo "function windowOnClick" . $iddiv . "(event){
                        if(event.target === $iddiv){
                          toggle" . $iddiv . "();
                        }
                      }";
      //toggle".$iddiv."
      echo "$trig.addEventListener('click', toggle" . $iddiv . ");
                      $idcls.addEventListener('click', toggle" . $iddiv . ");
                      window.addEventListener('click', windowOnClick" . $iddiv . ");";
    }
    echo "</script>";

    ?>
    <div class="pull-left pull-bottom">
      <b>Notes :</b><i>The red background card shows that you've been selected the item</i>
    </div>
    <br />
    <!--<div class="pull-right">
                <span id='save' class="btn btn-large btn-default btn-flat bg-aqua"><i class="fa fa-check"></i> Simpan Pilihan!</a>
             </div>-->

    <?php
    echo "<div class='visimisi' id='savediv'>";
    echo "<div class='visimisi-content' id='cntsave'>";
    echo "<h3> Perhatian!</h3><br />";
    $state = 0;
    if ($state_pilih == 1) {
      echo "Terimakasih Sudah Memilih!, Silahkan klik tombol Log out untuk keluar! <br />";
      $state = 0;
    } elseif ($state_pilih == 2) {
      echo "I'm sorry, Ada Error Rupanya, Silahkan pilih ulang lagi :) <br />";
      $state = 1;
    } else {
      $state = 1;
      echo "Selamat Datang! Curahkan pilihanmu demi masa depan sekolah yang gemilang :)";
    }
    if ($state == 1) {
      echo "<br /> <div class='pull-right'>
                                  <span class='btn btn-large btn-default btn-flat bg-aqua' id='closediv'><i class='fa fa-check'></i> Okay!</a>
                                </div>";
      echo "</div> </div>";
    } else {
      echo "<br /> <div class='pull-right'>
                                  <span class='btn btn-large btn-default btn-flat bg-aqua' id='closediv'><i class='fa fa-check'></i> Log-Out!</a>
                                </div>";
      echo "</div> </div>";
    }


    echo "<script type='text/javascript'>";
    echo "var save = document.getElementById('savediv');";
    //echo "var trigSave = document.getElementById('save');";

    echo "var closeSave = document.getElementById('closediv');";
    if ($state == 1) {
      echo "function toggleSaveOut(){
                          save.classList.toggle('show-visimisi');
                        }";
    } else {
      echo "function toggleSaveOut(){
                          save.classList.toggle('show-visimisi');
                          window.location.href='?m=logout';
                        }";
    }
    echo "function toggleSave(){
                        save.classList.toggle('show-visimisi');
                      }";
    echo "function windowOnClickSave(event){
                  if(event.target === save){
                    toggleSave();
                  }
                }

                //trigSave.addEventListener('click', toggleSave);
                closeSave.addEventListener('click', toggleSaveOut);
                window.addEventListener('click', windowOnClickSave);";
    echo "toggleSave();</script>";
    ?>

    <?php include "bawah.php";
    ?>