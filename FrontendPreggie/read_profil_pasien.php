<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
  $pasien = mysqli_fetch_array($sql);
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
        <h1>~ Kelola Profil Pasien ~</h1>
    </div>

    <div class="col-md-7 edit">        
        <div class="col-md-12 input">
        <form class="form-horizontal" role="form" method="post" action="process/pasien/update_pasien.php" align=""> 
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="hidden" value="<?php echo $pasien['user_id']; ?>" name="user_id">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $pasien['nama']; ?>"><br>
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?php echo $pasien['no_hp']; ?>"><br>
            <label style="margin-top: 18px">Gol Darah</label>
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
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal" value="<?php echo $pasien['tanggal']; ?>"><br><br>
            <label>Username</label>
            <input type="text" name="uname" value="<?php echo $user['username']; ?>" readonly><br><br>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>"><br><br>
             <div class="form-group last">
                <div class="text-center">
                    <button class="btn btn-sm" type="submit" name="login" style="background: #ff6666; width: 22%;"><div onclick="return konfirmasi_ubah()" >Simpan</div></button>
                    <a class="btn btn-default btn-sm" onclick="return konfirmasi_hapus()" href="process/pasien/delete_pasien.php?id=<?php echo $id;?>" style="color: #ff6666; width: 22%;">Delete</a>
                </div>
            </div>
            <br><br><br>
            <a href="read_daftar_pasien.php" class="btn btn-default btn-sm" style="color: #ff6666">
            <span class="glyphicon glyphicon-backward"></span> Kembali
            </a>
          </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>

    </body>
  </html>
