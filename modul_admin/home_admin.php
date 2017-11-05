<?php
  include("../proses/check_login.php");
  include("../connect/connect.php");
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
                <li><a href="#page-top" class="page-scroll top">HOME</a></li>
                <li><a href="read_pasien.php" class="page-scroll">DATA PASIEN</a></li>               
                <li><a href="read_bidan.php" class="page-scroll">DATA DOKTER</a></li>              
                <li><a class="page-scroll">Login As Perawat</a></li>                
                <li><a href="../proses/logout.php" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 hadmin" style="height:610px;">
      <h1 class="atas">Home Perawat</h1>
        <a href="read_pasien.php">
        <div class="col-md-6 pilih animated fadeInLeft flow1">
            <div class="kotok">        
                <i class="fa fa-female fa-5x" aria-hidden="true"></i>
                <h1>Kelola Data Ibu</h1>
            </div>
        </div>
        </a>
        <a href="read_bidan.php">
        <div class="col-md-6 pilih  animated fadeInRight flow2">
            <div class="kotok">         
            <i class="fa fa-user-md fa-5x" aria-hidden="true"></i>
            <h1>Kelola Data Dokter</h1>
            </div>
        </div>
        </a>
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