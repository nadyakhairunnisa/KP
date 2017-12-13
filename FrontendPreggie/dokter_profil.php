<?php
    include("process/check_login.php");
    include("connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
    $bidan = mysqli_fetch_array($sql);
    $sql2 = mysqli_query($conn, "SELECT * FROM user WHERE id =$bidan[user_id] LIMIT 1");
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
          <a class="navbar-brand" <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>>Home</a></li>          
          <li class="active"><a <?php echo ("href='dokter_profil.php?id=$bidan[id]'"); ?>>Profil</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <div class="col-md-12 profil_pasien">
        <h1>~ Profil Dokter ~</h1>
    </div>

    <div class="col-md-7 edit dokter">        
        <div class="col-md-12 input">
        <form class="form-horizontal" role="form" method="post" action="process/dokter/update_profil_dokter.php" align=""> 
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="hidden" value="<?php echo $bidan['user_id']; ?>" name="user_id">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $bidan['nama']; ?>" readonly><br>
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?php echo $bidan['no_hp']; ?>"><br>
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $bidan['alamat']; ?>"><br>
            <label>Username</label>
            <input type="text" name="uname" value="<?php echo $user['username']; ?>" readonly>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>">
            <div style="text-align:center;" >
                <button class="btn btn-sm" type="submit" name="login" style="width: 25%; background: #ff6666; margin-top: 40px"><div onclick="return change()" >Simpan</div></button></a>
                <!-- <input  onclick="change()" type="button" value="Edit" id="myButton1" /> -->
            </div>    
        </div> 
        <br><br><br>
        <a href="dokter_home.php?id=<?php echo $id; ?>" class="btn btn-default btn-sm" style="width: 22%; color: #ff6666; margin: 30px">
        <span class="glyphicon glyphicon-backward"></span> Kembali
        </a>      
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>      

    <div class="col-md-12" style="padding:0;" >
    <footer class="navbar navbar-default text-center bottom" style="padding-top: 20px; color: #737373">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>
    </div>

     <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>

    </body>
  </html>
