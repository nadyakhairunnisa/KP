<?php
include("process/check_login.php");
include("connect/connect.php");
$id=$_GET['id'];
$p_id=$_GET['p_id'];
$sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
$pasien = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn, "SELECT * FROM perkembangan WHERE id =$p_id ");
$p = mysqli_fetch_array($sql2);
$sql3 = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$p[bidan_id] ");
$bidan = mysqli_fetch_array($sql3);
$today = date('Y-m-d');
?>

<div class="col-md-4 col-xs-12 event_detail">
  <div class="header">
    Pemberitahuan
  </div>
  <div class="collapse" id="data_1">
    <div class="card">
      <p><i class="fa fa-clock-o" aria-hidden="true"></i>Trimester Pertama : <?php echo $p['usia_knd']; ?> Minggu</p>
      <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $p['jadwal_check']; ?></p>      
      <br>
      <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $bidan['nama']; ?></p>     
    </div>
    <div class="card-footer">        
      <a class="btn btn-sm" href="pasien_perkembangan.php?id=<?php echo $id; ?>&p_id=<?php echo $p['id']; ?>" style="width:45%">Lihat Perkembangan</a>
    </div>    
  </div>
</div>