<?php
    include("process/check_login.php");
    include("connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
    $bidan = mysqli_fetch_array($sql);
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
          <a class="navbar-brand" <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>>Home</a></li>          
          <li><a <?php echo ("href='dokter_profil.php?id=$bidan[id]'"); ?>>Profil</a></li>
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
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $bidan['nama']; ?>"><br>
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?php echo $bidan['no_hp']; ?>"><br>
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $bidan['alamat']; ?>"><br>
            <div style="text-align:center;" >
                <button type="submit" name="login" style="border: none; background: #ff6666;"><div onclick="return change()" class="btn btn-sm">Simpan</div></button></a>
                <!-- <input  onclick="change()" type="button" value="Edit" id="myButton1" /> -->
            </div>    
        </div> 
              
    </div>    
    <div class="col-md-5 edit">
        <img src="images/mother.png">
    </div>      

    </body>
  </html>