<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
  $pasien = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PREGGIE</title>
    <link rel="icon" type="image/png" href="images/logo.png">      

     <!-- Bootstrap -->    
    <link rel="stylesheet" href="css/bootstrap.css">    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
</head>

    <body style="background:#fafafa;">

    <!-- Navbar Section -->
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="admin_home.php"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="admin_home.php">Home</a></li> 
          <li><a href="process/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <div class="col-md-12 profil_pasien">
        <h1>~ Profil Pasien ~</h1>
    </div>

    <div class="col-md-7 edit">        
        <div class="col-md-12 input">
        <form class="form-horizontal" role="form" method="post" action="process/perkembangan/add_perkembangan.php" align="" enctype="multipart/form-data"> 
            <input type="hidden" value="<?php echo $id ?>" name="id"><br>
            <label>Nama Dokter</label>
            <select class="form-control col-md-offset-2" name="bidan" style="width: 85%; height: 40px;margin-top: 25px;" required>
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM bidan");
                    while($data = mysqli_fetch_assoc($query)) {
                      $bid = $data['id'];
                      $nama = $data['nama'];
                      echo "<option value='$bid'>$nama</option>"; }
                ?>
            </select>
            <label>Jadwal Check Up</label>
            <input type="date" name="jadwal_check" required><br>
            <label>Usia Kandungan</label>
            <input type="text" name="usia_knd" placeholder="Minggu" required><br>
            <label>Berat Kandungan</label>
            <input type="text" name="berat_knd" placeholder="gram"><br>
            <label>Tensi</label>
            <input type="text" name="tensi" placeholder="mmHg"><br>
            <label>Detak Jantung</label>
            <input type="text" name="detak_jantung" placeholder="bpm"><br>
            <label>Tinggi Badan</label>
            <input type="text" name="tinggi_badan" placeholder="cm"><br>
            <label>Berat Badan</label>
            <input type="text" name="berat_badan" placeholder="kg"><br>
            <label style="margin-top: 45px">Keterangan</label>
            <textarea class="form-control col-md-offset-2"  type="text" name="keterangan" style="width: 85%; height: 90px;margin-top: 25px;">Keluhan: 
Rekomendasi: 
Obat: 
            </textarea><br>
            <!-- <label>Status</label> -->
            <!-- <select class="form-control col-md-offset-2" name="status" style="width: 85%; height: 40px;margin-top: 25px;">
               <option>Hadir</option>
               <option>Belum Hadir</option>
            </select> -->
            <label>Gambar</label> 
                <input type="file" name="gambar" /> <br>
           
            <div class="text-center">
                <button class="btn btn-sm" type="submit" name="login" style="width: 25%; background: #ff6666;"><div onclick="return konfirmasi_tambah()" >Submit</div></button></a>
                <!-- <a onclick="konfirmasi_tambah()" class="btn btn-sm" href="read_daftar_perkembangan.php" style="background: #ff6666">Submit</a> -->
            </div> 
            <br><br><br>
            <a href="read_daftar_perkembangan.php?id=<?php echo $id; ?>" class="btn btn-default btn-sm" style="color: #ff6666">
            <span class="glyphicon glyphicon-backward"></span> Kembali
            </a>
        </div>         
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>      

     <div class="col-md-12" style="padding:0;">
     <footer class="navbar navbar-default text-center" style="padding: 30px 0px 50px; color: #737373;margin: 0px">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
     </footer>
     </div>

     <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>

    </body>
  </html>
