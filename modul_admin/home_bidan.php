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
                <li><a href="#page-top" class="page-scroll top">HOME</a></li>               
                <li><a class="page-scroll">Login As dr. Nadya</a></li>                
                <li><a href="proses/logout.php" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 kibu">
      <h1 style="text-align: center; margin-bottom:30px;margin-top:100px;">Data Pasien</h1>
        <table>
              <tr>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>NO. HANDPHONE</th>
                <th>ALAMAT</th>
                <th>GOL. DARAH</th>
                <th>NAMA WALI</th>
                <th></th>
              </tr>
              <tr>
                <td>Dian R.</td>
                <td>pas160609</td>
                <td>pw160609</td>
                <td>0812345678</td>
                <td>Jl. Kaliurang</td>
                <td>O</td>
                <td>Ramadhan</td>
                <td>
                    <a href="lihat_perkembangan_dokter.html"><u style='color:blue;'><button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button></a>
                </td>
              </tr>
              <tr>
                <td>Dinda P.</td>
                <td>pas163112</td>
                <td>pw163112</td>
                <td>0823545678</td>
                <td>Jl. Besi</td>
                <td>B</td>
                <td>Farhan</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button>
                </td>
              </tr>
            </table>
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