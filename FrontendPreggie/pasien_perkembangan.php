<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
  $pasien = mysqli_fetch_array($sql);
  $sql2 = mysqli_query($conn, "SELECT * FROM perkembangan WHERE pasien_id =$id LIMIT 1");
  $p = mysqli_fetch_array($sql2);
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
</head>

    <body style="background:#fafafa;">

    <!-- Navbar Section -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>>Home</a></li>          
          <li><a <?php echo ("href='pasien_profil.php?id=$pasien[id]'"); ?>>Profil</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <div class="col-md-12 profil_pasien">
        <h1>~ Perkembangan Pasien ~</h1>
    </div>

    <div class="container-fluid">
    <div class="col-md-12 text-center" id="perkembangan-pasien">
      <h5><span  style="font-weight: 600; font-size: 20px"><?php echo $p['jadwal_check']; ?></span>
        <br><br><?php echo $p['nama']; ?>
        <br><br><?php echo $p['usia_knd']; ?></h5>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Usia Kandungan (minggu)</td>
                    <td>Berat Kandungan (gram)</td>
                    <td>Tensi (mmHg)</td>
                    <td>Detak Jantung (bpm)</td>
                    <td>Tinggi Badan (cm)</td>
                    <td>Berat Badan (kg)</td>
                </tr>
            </thead>
            <tbody>
                <?php

                echo "<tr>";
                echo "<td>$p[usia_knd]</td>";
                echo "<td>$p[berat_knd]</td>";
                echo "<td>$p[tensi]</td>";
                echo "<td>$p[detak_jantung]</td>";
                echo "<td>$p[tinggi_badan]</td>";
                echo "<td>$p[berat_badan]</td>";
                echo "</tr>";

                ?>
            </tbody>
        </table>
      </div>

      <div class="col-md-6 up">
        <img id="usg" src="<?php echo $p['gambar']; ?>">        
      </div>

      <div class="col-md-6 text-justify" style="background: #ffffff; margin-top: 10px; padding-top: 10px">
        <?php echo $p['keterangan']; ?>
        <!-- <p><b>Keluhan:</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco </p> <br>
        <p><b>Rekomendasi:</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi </p> <br>
        <p><b>Obat:</b></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut a.</p> -->
    </div>
    </div>


        
    </body>
  </html>
