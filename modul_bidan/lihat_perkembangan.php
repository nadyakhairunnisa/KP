<?php
  include("koneksi/connect.php");
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KARI</title>    

    <!-- FontAwesome  Google -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.css">    
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">        
    <!-- Stylesheet Endede-->    

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>            
          </button>            

            <a class="navbar-brand page-scroll navbar-left" href="#page-top">SI BUMIL</a>                               
            </div>

          <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li><a  <?php $user_id=$_GET['id']; echo ("href='home_dokter.php?id=$user_id'"); ?> class="page-scroll top">HOME</a></li> 
                <li><a <?php $user_id=$_GET['id']; echo ("href='profil_dokter.php?id=$user_id'"); ?> class="page-scroll top">PROFIL</a></li>   
                <li><a href="login.php" class="page-scroll">Sign-Out</a></li>                 
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 kibu">
      <h1 style="text-align: center; margin-bottom:50px;margin-top:100px;">Data Perkembangan</h1>

            <?php
              
                $query = "SELECT id, nama FROM pasien";
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result)){

                  
                  $nama = $row['nama'];

                  echo"<h3 style='color:#039be5; float:right;'>Nama Pasien : $nama </h3> ";
                
                  }
                ?>
        <table style="margin-bottom:50px;">
              <tr>
                <th>TANGGAL</th>
                <th>NAMA PASIEN</th>
                <th>NAMA DOKTER</th>
                <th>USIA KANDUNGAN</th>
                <th>BERAT JANIN</th>
                <th>TENSI</th>
                <th>DETAK JANTUNG</th>
                <th>TINGGI BADAN</th>
                <th>BERAT BADAN</th>
              </tr>
              <tr>
                <?php

                $perkembangan_id = $_GET['id'];
                $query = "SELECT p.id, p.jadwal_check, ps.nama, b.nama, p.usia_knd, p.berat_knd, p.tensi, p.detak_jantung, p.tinggi_badan, p.berat_badan FROM perkembangan p JOIN bidan b ON p.bidan_id=b.id JOIN pasien ps ON p.pasien_id=ps.id WHERE p.id='$perkembangan_id'";
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result)){

                  //$id = $row['id'];
                  $jadwal_check = $row['jadwal_check'];
                  $nama = $row['nama'];
                  $nama = $row['nama'];
                  $usia_knd = $row['usia_knd'];
                  $berat_knd = $row['berat_knd'];
                  $tensi = $row['tensi'];
                  $detak_jantung = $row['detak_jantung'];
                  $tinggi_badan = $row['tinggi_badan'];
                  $berat_badan = $row['berat_badan'];

                  echo "<tr>";
                  echo "<td>$jadwal_check</td>";
                  echo "<td>$nama</td>";
                  echo "<td>$nama</td>";
                  echo "<td>$usia_knd</td>";
                  echo "<td>$berat_knd</td>";
                  echo "<td>$tensi</td>";
                  echo "<td>$detak_jantung</td>";
                  echo "<td>$tinggi_badan</td>";
                  echo "<td>$berat_badan</td>";

                   }
                ?>

              </tr>
              
            </table>
            </div>
        <div class="col-md-5">
        <img src="images/8minggu.jpg" style="width:80%;text-align:center;margin-bottom:50px;">
        </div>
        <div class="col-md-7">

        <?php
              
                $query = "SELECT id, keterangan FROM perkembangan";
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result)){

                  
                  $keterangan = $row['keterangan'];

                  echo"<h3 style='color:#039be5; float:center;'>Keterangan : $keterangan </h3> ";
                
                  }
                ?>
       </div>
  <!-- This Background Slider -->
  
    <!-- All Of Script -->
    <script src="js/jquery.js"></script>    
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
    <script>
        new WOW().init();
    </script>
    <!-- All Of Script -->    


  </body>
</html>