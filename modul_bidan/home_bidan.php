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
                <li><a  <?php $user_id=$_GET['id']; echo ("href='home_bidan.php?id=$user_id'"); ?> class="page-scroll top">HOME</a></li> 
                <li><a <?php $user_id=$_GET['id']; echo ("href='profil_bidan.php?id=$user_id'"); ?> class="page-scroll top">PROFIL</a></li>                                    
                <li><a href="login.php" class="page-scroll">Sign-Out</a></li>                 
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-12 kibu">
      <h1 style="text-align: center; margin-bottom:30px;margin-top:100px;">Data Pasien</h1>
        <table>
        
              <tr>
                <th>NAMA</th>
                <th>NO. HANDPHONE</th>
                <th>ALAMAT</th>
                <th>GOL. DARAH</th>
                <th>NAMA WALI</th>
                <th>LIHAT PERKEMBANGAN</th>
              </tr>
              

              
              <tr>
                <?php
              
                $query = "SELECT id, nama, no_hp, alamat, gol_darah, usia, nama_wali FROM pasien";
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result)){

                  //$id = $row['id'];
                  $nama = $row['nama'];
                  $no_hp = $row['no_hp'];
                  $alamat = $row['alamat'];
                  $gol_darah = $row['gol_darah'];
                  $usia = $row['usia'];
                  $nama_wali = $row['nama_wali'];

                  echo "<tr>";
                  echo "<td>$nama</td>";
                  echo "<td>$no_hp</td>";
                  echo "<td>$gol_darah</td>";
                  echo "<td>$usia</td>";
                  echo "<td>$nama_wali</td>";

                  
                  echo "<td><a href='lihat_perkembangan_list.php?id=$row[id]'style='color:white;'<button class='btn btn-info btn-lg' data-toggle='modal'>Lihat Data Perkembangan: <u style='color:blue;'></button> </a> </td>"; 
                  echo "</tr>";


                  # code...
                }
                ?>
                
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