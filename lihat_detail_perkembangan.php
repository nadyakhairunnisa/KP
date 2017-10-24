<?php
  include("proses/check_login.php");
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
                <?php
                    $userid = $_GET['user_id']; 
                    $query = mysqli_query($conn, "SELECT u.id, p.user_id, p.nama FROM user u JOIN pasien p ON u.id = p.user_id WHERE p.user_id='$userid'");
                    while ($baris=mysqli_fetch_assoc($query)){
                        echo("<li><a href='home_pasien.php?id=$userid' class='page-scroll top'>HOME</a></li>");
                        echo("<li><a href='lihat_perkembangan.php?id=$userid' class='page-scroll'>PERKEMBANGAN</a></li>");
                        echo("<li><a href='lihat_jadwal.php?id=$userid' class='page-scroll'>JADWAL CHECK - UP</a></li>");
                        echo("<li><a class='page-scroll'>Login as $baris[nama]</a></li>");
                    }
                ?>                
                <li><a href="proses/logout.php" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 kibu">
      <h1 style="text-align: center; margin-bottom:50px;margin-top:100px;">Data Perkembangan</h1>
        <table style="margin-bottom:50px;">
              <tr>
                <th>TANGGAL</th>
                <th>NAMA PASIEN</th>
                <th>NAMA DOKTER</th>
                <th>USIA KANDUNGAN</th>
                <th>LINGKAR PERUT</th>
                <th>TENSI</th>
                <th>DETAK JANTUNG</th>
                <th>TINGGI BADAN</th>
                <th>BERAT BADAN</th>
              </tr>
              <tr>
                <td>23 Juli 2016</td>
                <td>Dian R.</td>
                <td>dr. Nadya</td>
                <td>8 Minggu</td>
                <td>70 cm</td>
                <td>110/70</td>
                <td>-</td>
                <td>165 cm</td>
                <td>55 kg</td>
              </tr>
              
            </table>
            </div>
        <div class="col-md-5">
        <img src="images/8minggu.jpg" style="width:80%;text-align:center;margin-bottom:50px;">
        </div>
        <div class="col-md-7">
        <h3>Keluhan : Merasa mual, pusing, dan cepat lelah. Perhatikan asupan nutrisi yang Anda konsumsi.<br><br>Hindari terlalu banyak makanan manis serta makanan ringan yang tidak bergizi di malam hari.</h3>
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