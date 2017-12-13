<?php
  include("process/check_login.php");
  include("connect/connect.php");
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
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <div class="col-md-12 profil_pasien">
        <h1>~ Kelola Profil Dokter ~</h1>
    </div>

    <div class="col-md-7 edit dokter">        
        <div class="col-md-12 input">
        <form class="form-horizontal" role="form" method="post" action="process/dokter/add_dokter.php" align=""> 
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <label>No. HP</label>
            <input type="text" name="no_hp" placeholder="No.HP" required><br>
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <label>Tanggal</label>
            <input type="date" name="tanggal" placeholder="Tanggal" required><br>
            <div class="text-center" style="margin-top: 20px">
                <button class="btn btn-sm" type="submit" name="login" style="background: #ff6666; width: 22%;"><div onclick="return konfirmasi_tambah()" >Submit</div></button>
                <!-- <a onclick="konfirmasi_tambah()" class="btn btn-sm" href="read_daftar_dokter.html" style="background: #ff6666">Submit</a> -->
            </div>
             <br><br><br>
            <a href="read_daftar_dokter.php" class="btn btn-default btn-sm" style="color: #ff6666">
            <span class="glyphicon glyphicon-backward"></span> Kembali
            </a>  
        </div> 
              
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>      

    
    <div class="col-md-12">
     <footer class="navbar navbar-default text-center" style="padding: 30px 0px 50px; color: #737373;margin: 0px">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>
  </div>

  <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>           

    </body>
  </html>

