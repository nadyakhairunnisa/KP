<!-- coba aja -->

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

      <div class="col-md-12 kibu">
      <h1 style="margin-bottom:20px;margin-top:100px;">Pasien : DIAN RACHMANIA</h1>
      <h2 style="margin-bottom:50px;">dr. Nadya</h2>
        <table>
          <thead>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Jumlah Check Up</th>
        </thead>

        <tbody>
          <?php
         $query = "SELECT id, pasien_id,  bidan_id, jadwal_check usia_knd, berat_knd, tensi, detak_jantung, tinggi_badan, berat_badan, keterangan, gambar, status FROM perkembangan";
          $result = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"), $query);
          $no = 1;
          while ($row = mysqli_fetch_array($result)) {
            $nama = $row['nama'];
            $username = $row['username'];
            $password = $row['password'];
            $no_hp = $row['no_hp'];
            $alamat = $row['alamat'];
            $tanggal = $row['tanggal'];

            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$nama</td>";
            echo "<td>$username</td>";
            echo "<td>$password</td>";
            echo "<td>$no_hp</td>";
            echo "<td>$alamat</td>";
            echo "<td>$tanggal</td>";
            echo "<td>
             <a href='kelola_perkembangan.php'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Kelola Data Perkembangan</button></a>
          </td>";
  
          $no++;
        }

        ?> 
      </tbody>
             <!--  <tr>
                <th>TANGGAL</th>
                <th>USIA KANDUNGAN</th>
                <th>LINGKAR PERUT</th>
                <th>TENSI</th>
                <th>DETAK JANTUNG</th>
                <th>TINGGI BADAN</th>
                <th>BERAT BADAN</th>
                <th>GAMBAR</th>
                <th>KETERANGAN</th>
                <th></th>
              </tr>
              <tr>
                <td>23 Juli 2016</td>
                <td>8 Minggu</td>
                <td>70 cm</td>
                <td>110/70</td>
                <td>-</td>
                <td>165 cm</td>
                <td>55 kg</td>
                <td><img src="images/8minggu.jpg" style="width:80%;"></td>
                <td>Keluhan : Merasa mual, pusing, dan cepat lelah.<br>Perhatikan asupan nutrisi yang Anda konsumsi. Hindari terlalu banyak makanan manis serta makanan ringan yang tidak bergizi di malam hari.</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td>
              </tr>
              <tr>
                <td>13 Agustus 2016</td>
                <td>11 Minggu</td>
                <td>83 cm</td>
                <td>110/70</td>
                <td>+</td>
                <td>165 cm</td>
                <td>59 kg</td>
                <td><img src="images/11minggu.jpg" style="width:80%;"></td>
                <td>Keluhan : Tidak ada.<br>Tubuh janin berkembang pesat sehingga kepalanya kini hanya sepertiga dari seluruh tubuhnya.</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td>
              </tr>
              <tr>
                <td>24 September 2016</td>
                <td>17 Minggu</td>
                <td>95 cm</td>
                <td>110/70</td>
                <td>+</td>
                <td>163 cm</td>
                <td>63 kg</td>
                <td><img src="images/17minggu.jpg" style="width:80%;"></td>
                <td>Keluhan : Demam dan rasa nyeri pada perut.<br>Praktikkan senam kegel agar merasa terbantu saat menjalani proses persalinan maupun setelahnya karena aktivitas ini menguatkan otot vagina.</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td>
              </tr> -->
              
            </table>
      </div>
  <!-- This Background Slider -->

  <div id="delete" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Perigatan !</h4>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>

      </div>
    </div>
  
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