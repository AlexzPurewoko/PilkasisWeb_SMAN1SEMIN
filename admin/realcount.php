<?php
include "atas.php";
include "../sambungan.php";
$sql = "SELECT * FROM kandidat ORDER BY nokandidat";
$query = mysqli_query($koneksi, $sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Pilkasis
        <small>Pemilihan Ketua & Wakil Ketua OSIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=real_count"><i class="fa fa-laptop"></i> Real Count</a></li>
        <li class="active">Hasil Pemilihan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <h2 style="text-align=text-center;">
        Real Count Kandidat Ketua OSIS
      </h2>
      <div class="row">
        <?php // Count all value in kandidat_ketua
        $count_all = 0;
        $golput_count = 0;
        while($r=mysqli_fetch_array($query)){
          $sql_jumlah = "SELECT * FROM pemilih";
          $sql_query  = mysqli_query($koneksi, $sql_jumlah);
          $count = 0;
          $count_selected = 0;
          $golput = 0;
          while($result = mysqli_fetch_assoc($sql_query)){
            $count++;
            if($r['nokandidat'] == $result['memilih'])
              $count_selected++;
            elseif ($result['memilih'] == 0) {
              $golput++;
            }
          }
          $percentage = round($count_selected * 100 / $count);
          echo '
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->';
          if($percentage >= 50)
            echo ' <div class="small-box bg-blue">';
          elseif ($percentage >= 40)
            echo ' <div class="small-box bg-green">';
          elseif ($percentage >= 25)
            echo ' <div class="small-box bg-yellow">';
          else
            echo ' <div class="small-box bg-red">';
          echo ' <div class="inner">';
          echo "<h3>".$r['nokandidat']."</h3>";
          //echo "<h2>".($r['jumlahsuara']/$rjs['jsuara']*100)."%</h2>";
          //echo $r['jumlahsuara']." suara<br><b>";
          echo "<b>".$r['nama']."</b>";
          echo "<br /><b>".$r['kelas']."</b>";
          echo "<h3><b>$percentage %</b></h3>";
          echo '            </div>
                      <div class="icon">
                        <img src="../gambar/kandidat/'.$r['foto'].'" height="100px"/>
                      </div>';
          echo '<a href="#" class="small-box-footer">Total Suara : '.$count_selected.' dari '.$count.' pemilih</a>';
          echo '  </div>
                  </div>';
          $count_all = $count;
          $golput_count = $golput;
        }
        // counting Golput
        echo "</div><div class='row'>";
        $percentage = round($golput_count * 100 / $count_all);
        echo '
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->';
        echo ' <div class="small-box bg-red">';

        echo ' <div class="inner">';
          echo "<h1>".$percentage."%</h1><br />";
          echo "<h2><b>Golput</b></h2>";
        echo '</div>';
        echo '<a href="#" class="small-box-footer">Total Golput : '.$golput_count.' dari '.$count_all.' pemilih</a>';
        echo '  </div>
                </div>';
        ?>

     </div>

    </section>

<?php include "bawah.php"; ?>
