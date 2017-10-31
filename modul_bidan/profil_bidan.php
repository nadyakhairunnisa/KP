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
            <?php

            ?>
                <li><?php $user_id=$_GET['id']; echo ("<a href='home_bidan.php?id=$user_id' class='page-scroll top'>HOME</a>"); ?></li> 
                <li><?php $user_id=$_GET['id']; echo ("<a href='profil_bidan.php?id=$user_id' class='page-scroll top'>PROFIL</a>"); ?></li>                        
                <li><a href="login.php" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-11 kibu">       
           <h1 style="text-align: center; margin-top:50px;">Profil Saya</h1>
       
      <!-- <table style="margin-bottom:50px;"> -->

        <!-- <div class="col-md-12 login" style="height:615px;"> -->
      <div id="page-profil">
      
            <?php
                $bidan_id = $_GET['id'];
                $query = "SELECT b.id, b.nama, b.no_hp, b.alamat, u.password FROM bidan b JOIN user u ON b.user_id=u.id WHERE b.id='$bidan_id'";
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result)){

                  //$id = $row['id'];
                  $nama = $row['nama'];
                  $no_hp = $row['no_hp'];
                  $alamat = $row['alamat'];  
                  $password =$row['password'];

                   
                        

                  echo"<h4 style='color:#039be5;'>Nama Lengkap : $nama </h4>";
                  echo"<h4 style='color:#039be5;'>No.HP : $no_hp </h4> ";
                  echo"<h4 style='color:#039be5;'>Alamat : $alamat </h4> ";
                  echo"<h4 style='color:#039be5;'>Password : $password </h4> ";


                  echo "<a href='edit_profil_bidan.php?id=$row[id]'style='color:white;'<button class='btn btn-info btn-lg' data-toggle='modal'>Edit</button> </a>"; 
                  
      
                }
                ?>
          </div>      
              </div>

            
            <!-- </table> -->
     
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