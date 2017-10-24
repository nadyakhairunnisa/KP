<?php
    include "connect/connect.php";

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
                <li><a href="home_admin.html" class="page-scroll top">HOME</a></li>
                <li><a href="read_pasien.html" class="page-scroll">PASIEN</a></li>               
                <li><a href="read_dokter.html" class="page-scroll">DOKTER</a></li>                
                <li><a href="kelola_jadwal.html" class="page-scroll">CHECK - UP</a></li>                
                <li><a href="read_perkembangan.html" class="page-scroll">PERKEMBANGAN</a></li>                
                <li><a href="#" class="page-scroll">Login As Perawat</a></li>                
                <li><a href="login_admin.html" class="page-scroll">Sign-Out</a></li>                   
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-11 kibu">
      <h1 style="text-align: center; margin-bottom:50px;">Data Perkembangan</h1>
        <table>
           <thead>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Jumlah Check Up</th>
        </thead>

        <tbody>
          <?php
         $query = "SELECT k.id, p.id, b.id, p.nama, b.nama FROM perkembangan k JOIN pasien p ON (p.id=k.pasien_id) JOIN bidan b ON (b.id = k.bidan_id) ";
          $result = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"), $query);
          $no = 1;
          while ($row = mysqli_fetch_array($result)) {
            $nama_pasien = $row['nama'];
            $nama_dokter = $row['nama'];

            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$nama_pasien</td>";
            echo "<td>$nama_dokter</td>";
            echo "<td>
             <a href='kelola_perkembangan.php'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Kelola Data Perkembangan</button></a>
          </td>";
  
          $no++;
        }

        ?> 
      </tbody>
         
             <!-- <tr>
                <th>NAMA PASIEN</th>
                <th>NAMA DOKTER</th>
                <th>JUMLAH CHECK - UP</th>
                <th></th>
              </tr>
              <tr>
                <td>Dian R.</td>
                <td>dr. Nadya</td>
                <td>3 Kali</td>
                <td>
                    <a href="kelola_perkembangan.php"><u style='color:blue;'><button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button></a>
                </td>
              </tr>
              <tr>
                <td>Silvi A.</td>
                <td>dr. Altus</td>
                <td>5 Kali</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button>
                </td>
              </tr>
              <tr>
                <td>Ghitta NH.</td>
                <td>dr. Hari</td>
                <td>1 Kali</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button>
                </td>
              </tr>
              <tr>
                <td>Dinda P.</td>
                <td>dr. Altus</td>
                <td>7 Kali</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button>
                </td>
              </tr>
              <tr>
                <td>Ningsih D.</td>
                <td>dr. Altus</td>
                <td>5 Kali</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Lihat Data Perkembangan</button>
                </td>
              </tr> -->
            </table>
      </div>
      <div class="col-md-1 kibu"><a href="create_perkembangan.php"><button>Tambah Data</button></a></div>
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