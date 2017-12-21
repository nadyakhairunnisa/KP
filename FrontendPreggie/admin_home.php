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

<body>
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

    <div id="first-slider">
    <div id="carousel-top" class="carousel slide carousel-fade ">        
        <div class="carousel-inner" role="listbox">             
        <div class="active slide1 parallax">

            <div class="container-fluid">
             <div class="col-md-12 admin">
                <h1>~ Klik untuk Mengelola ~</h1>
             </div>

              <div class="col-md-6 text-center" id="admin">
                <a class="btn btn-sm" href="read_daftar_pasien.php"><b>PASIEN</a>   
              </div>
              <div class="col-md-6 text-center" id="admin">
                 <a class="btn btn-sm" href="read_daftar_dokter.php"><b>DOKTER</a> 
              </div>
              </div>

              <footer class="navbar navbar-default text-center" style="padding: 30px 0px 50px; color: #737373; margin: 75px 0px 0px">
    Copyright &copy Teknik Informatika UII 2017. All right reserved
  </footer>
            </div>

   
  </div>
  </div>
  </div>
  
   <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
