<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id ='$id' LIMIT 1");
  $pasien = mysqli_fetch_assoc($sql);
  $sql2 = mysqli_query($conn, "SELECT * FROM user WHERE id =$pasien[user_id] LIMIT 1");
  $user = mysqli_fetch_array($sql2);
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
          <a class="navbar-brand" <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>>Home</a></li>          
          <li class="active"><a <?php echo ("href='pasien_profil.php?id=$pasien[id]'"); ?>>Profil</a></li>
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
        <form class="form-horizontal" role="form" method="post" action="process/pasien/update_profil_pasien.php" align=""> 
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="hidden" value="<?php echo $pasien['user_id']; ?>" name="user_id">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $pasien['nama']; ?>" readonly><br>
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?php echo $pasien['no_hp']; ?>"><br>
            <label style="margin-top: 10px;">Golongan Darah</label>
               <select class="form-control col-md-offset-2" name="gol_darah" style="width: 85%; height: 50px;margin-top: 15px;">
                   <option>A</option>
                   <option>B</option>
                   <option>AB</option>
                   <option>O</option>
               </select> 
            <label>Usia</label>
            <input type="text" name="usia" value="<?php echo $pasien['usia']; ?>"><br>
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $pasien['alamat']; ?>"><br>
            <label>Nama Wali</label>
            <input type="text" name="nama_wali" value="<?php echo $pasien['nama_wali']; ?>"><br>
            <label>Username</label>
            <input type="text" name="uname" value="<?php echo $user['username']; ?>" readonly>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>">
            <div style="text-align:center">
                <button class="btn btn-sm" type="submit" name="update" style="width: 25%; background: #ff6666; margin-top: 20px"><div onclick="return konfirmasi_ubah()">Submit</div></button></a>
                <!-- <a onclick="return konfirmasi_tambah()" class="btn btn-sm" href="process/pasien/update_profil_pasien.php" style="background: #ff6666">Submit</a> -->
            </div>  
        </div>
        <br><br><br>
        <a href="pasien_home.php?id=<?php echo $id; ?>" class="btn btn-default btn-sm" style="width: 22%; color: #ff6666; margin: 30px">
        <span class="glyphicon glyphicon-backward"></span> Kembali
        </a>
              
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>

     <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>

    <div class="col-md-12" style="padding:0;">
  <footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373; margin: 0px">
    Copyright &copy Teknik Informatika UII 2017. All right reserved
  </footer>
</div>

    </body>
  </html>
