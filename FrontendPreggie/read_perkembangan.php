<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM perkembangan WHERE id =$id LIMIT 1");
  $p = mysqli_fetch_array($sql);
  $sql2 = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$p[pasien_id] LIMIT 1");
  $pasien = mysqli_fetch_array($sql2);
  $sql3 = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$p[bidan_id] LIMIT 1");
  $bidan = mysqli_fetch_array($sql3);
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
        <h1>~ Perkembangan Pasien ~</h1>
    </div>

    <div class="container-fluid">
    <form class="form-horizontal" role="form" method="post" action="process/perkembangan/update_perkembangan.php" align="">
    <div class="col-md-12 text-center" id="perkembangan-pasien">
      <h5><?php echo $pasien['nama']; ?>
        <br><br><span style="font-weight: 600; font-size: 15px"><input type="date" name="jadwal_check" style="color: black;" value="<?php echo $p['jadwal_check']; ?>"></span>
        <!-- <br><br><input type='text' name='usia_knd' style="color: black; text-align: center;" value='<?php echo $p['usia_knd']; ?> Minggu'> -->
        <br><br><select name="bidan" style="color: black; text-align: center;">
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM bidan");
                    while($data = mysqli_fetch_assoc($query)) {
                      $bid = $data['id'];
                      $nama = $data['nama'];
                      if($bid == $p['bidan_id']){
                        echo "<option value='$bid' selected>$nama</option>";
                      } else {
                        echo "<option value='$bid'>$nama</option>";
                      }}
                ?>
            </select></h5>
        
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <!-- <input type="hidden" value="<?php echo $p['bidan_id'] ?>" name="bidan_id"> -->

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
                echo "<td><input type='text' name='usia_knd' value='$p[usia_knd]'></td>";
                echo "<td><input type='text' name='berat_knd' value='$p[berat_knd]'></td>";
                echo "<td><input type='text' name='tensi' value='$p[tensi]'></td>";
                echo "<td><input type='text' name='detak_jantung' value='$p[detak_jantung]'></td>";
                echo "<td><input type='text' name='tinggi_badan' value='$p[tinggi_badan]'></td>";
                echo "<td><input type='text' name='berat_badan' value='$p[berat_badan]'></td>";
                echo "</tr>";

                ?>
            </tbody>
        </table>
      </div>

      <div class="col-md-6 up">
        <img id="usg" src="<?php echo $p['gambar']; ?>">        
      </div>

      <div class="col-md-6 text-justify" style="background: #ffffff; margin-top: 10px; padding-top: 10px">
        <textarea type="text" name="keterangan" style="width: 85%; height: 90px;"><?php echo $p['keterangan']; ?></textarea><br>
        
    </div>

            <div class="form-group last">
                <div class="col-md-6 text-center">
                    <button class="btn btn-sm" type="submit" name="login" style="background: #ff6666; width: 22%;"><div onclick="return konfirmasi_ubah()" >Simpan</div></button>
                    <!-- <a class="btn btn-sm" href="read_daftar_perkembangan.php?id=<?php echo $p['pasien_id'];?>" style="background: #ff6666" onclick="return konfirmasi_ubah()">Simpan</a> -->
                    <a onclick="return konfirmasi_hapus()" class="btn btn-default btn-sm" href="process/perkembangan/delete_perkembangan.php?id=<?php echo $p['id'];?>" style="color: #ff6666">Delete</a>
                </div>
                <div class=" text-left" style="margin-bottom: 10px; width: 60em">        
                  <a href="read_daftar_perkembangan.php?id=<?php echo $p['pasien_id']; ?>" class="btn btn-default btn-sm" style="color: #ff6666">
                    <span class="glyphicon glyphicon-backward"></span> Kembali
                  </a>
                </div>
            </div>

    </div>

     <footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373; margin: 0px">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>

     <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
        
    </body>
  </html>
