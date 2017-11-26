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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--   Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</head>

    <body style="background:#fafafa;">

    <!-- Navbar Section -->
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="admin_home.php"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <div class="col-md-12 profil_pasien">
        <h1>~ Profil Pasien ~</h1>
    </div>

    <div class="col-md-7 edit">        
        <div class="col-md-12 input">
        <form class="form-horizontal" role="form" method="post" action="process/perkembangan/add_perkembangan.php" align=""> 
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <label>Nama Dokter</label>
            <select class="form-control col-md-offset-2" name="bidan" style="width: 85%; height: 40px;margin-top: 25px;">
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM bidan");
                    while($data = mysqli_fetch_assoc($query)) {
                      $id = $data['id'];
                      $nama = $data['nama'];
                      echo "<option value='$id'>$nama</option>"; }
                ?>
            </select>
            <label>Jadwal Check Up</label>
            <input type="date" name="jadwal_check"><br>
            <label>Usia Kandungan</label>
            <input type="text" name="usia_knd"><br>
            <label>Berat Kandungan</label>
            <input type="text" name="berat_knd"><br>
            <label>Tensi</label>
            <input type="text" name="tensi" ><br>
            <label>Detak Jantung</label>
            <input type="text" name="detak_jantung" ><br>
            <label>Tinggi Badan</label>
            <input type="text" name="tinggi_badan" ><br>
            <label>Berat Badan</label>
            <input type="text" name="berat_badan" ><br>
            <label style="margin-top: 45px">Keterangan</label>
            <textarea class="form-control col-md-offset-2"  type="text" name="keterangan" style="width: 85%; height: 90px;margin-top: 25px;"></textarea><br>
            <label>Jadwal Selanjutnya</label>
            <input type="date" name="jadwal_next" ><br>
            <label>Status</label>
            <select class="form-control col-md-offset-2" name="status" style="width: 85%; height: 40px;margin-top: 25px;">
               <option>Hadir</option>
               <option>Belum Hadir</option>
            </select>
            <label>Gambar</label> 
                <input type="file" name="gambar"> <br>
           
            <div class="text-center" id="kelola">
                <a onclick="konfirmasi_tambah()" class="btn btn-sm" href="read_daftar_perkembangan.php" style="background: #ff6666">Submit</a>
            </div> 
        </div> 
              
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>      

           

    </body>
  </html>
