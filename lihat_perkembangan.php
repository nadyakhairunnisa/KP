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
    <script type="text/javascript" src="js/jquery-1.12.2.js"></script>
    <script type="text/javascript" src="js/jquery2.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#konten-ajax").load(<?php $userid = $_GET['id']; echo("href='konten/latest_perkembangan.php?id=$userid'"); ?>);
      });
      $(function(){
        $("#menu a").click(function(){
          url = $(this).attr("href");
          $("#konten-ajax").load(url);
          return false;
        });
        $(document).ajaxStart(function(){
          $("#konten-ajax").css({'display':'none'});
        });
        $(document).ajaxComplete(function(){
          $("#konten-ajax").slideDown('slow');
        });
      });
    </script>        
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
                    $userid = $_GET['id']; 
                    $query = mysqli_query($conn, "SELECT u.id, p.user_id, p.nama FROM user u JOIN pasien p ON u.id = p.user_id WHERE p.user_id='$userid'");
                    while ($baris=mysqli_fetch_assoc($query)){
                        echo("<li><a href='home_pasien.php?id=$userid' class='page-scroll'>HOME</a></li>");
                        echo("<li><a href='#page-top' class='page-scroll top'>PERKEMBANGAN</a></li>");
                        echo("<li><a href='lihat_jadwal.php?id=$userid' class='page-scroll'>JADWAL CHECK - UP</a></li>");
                        echo("<li><a class='page-scroll'>Login as $baris[nama]</a></li>");
                    }
                ?>                
                <li><a href="proses/logout.php" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 kajax">
      <div id="wrapper">
        <div id="menu" style="text-align: center;">
        <?php
          $userid = $_GET['id'];
          echo("<a href='konten/latest_perkembangan.php?id=$userid'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Data Perkembangan</button></a>&nbsp");
          echo("&nbsp<a href='konten/new_perkembangan.php?id=$userid'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Jadwal Selanjutnya</button></a>");
        ?>
        </div>
        <div id="konten-ajax">
        </div>
      </div>
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