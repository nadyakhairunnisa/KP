<?php
    include("../proses/check_login.php");
    include("../connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
    $pasien= mysqli_fetch_array($sql);
?>


<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PREGGIE</title>    
    <link rel="icon" href="images/preggie.png">

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
                <li><a href="home_admin.php" class="page-scroll top">HOME</a></li>
                <li><a href="read_pasien.php" class="page-scroll">DATA PASIEN</a></li>               
                <li><a href="read_bidan.php" class="page-scroll">DATA DOKTER</a></li>              
                <li><a class="page-scroll">Login As Perawat</a></li>                
                <li><a href="../proses/logout.php" class="page-scroll">Sign-Out</a></li>                    
            </ul>              
          </div>        
        </div>        
      </nav>

      <div class="col-md-11 kibu">
      <h1 style="text-align: center; margin-bottom:30px;">Daftar Pasien</h1>
        <table>
          <thead>
          <th>NO</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>No.Handphone</th>
          <th>Alamat</th>
          <th>Golongan Darah</th>
          <th>Usia</th>
          <th>Nama Wali</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </thead>

        <tbody>
           <?php
          $query = "SELECT p.id, p.user_id, u.username, u.password, p.nama, p.no_hp, p.alamat, p.gol_darah, p.usia, p.nama_wali, p.tanggal FROM pasien p JOIN user u ON (u.id = p.user_id) WHERE p.id = '$pasien[id]'";
          $result = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"), $query);
          $no = 1;
          while ($row = mysqli_fetch_array($result)) {
            $id= $row['id'];
            $nama = $row['nama'];
            $username = $row['username'];
            $password = $row['password'];
            $no_hp = $row['no_hp'];
            $alamat = $row['alamat'];
            $gol_darah = $row['gol_darah'];
            $usia = $row['usia'];
            $nama_wali = $row['nama_wali'];
            $tanggal = $row['tanggal'];

            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$nama</td>";
            echo "<td>$username</td>";
            echo "<td>$password</td>";
            echo "<td>$no_hp</td>";
            echo "<td>$alamat</td>";
            echo "<td>$gol_darah</td>";
            echo "<td>$usia</td>";
            echo "<td>$nama_wali</td>";
            echo "<td>$tanggal</td>";
            echo "<td>
            <a href='edit_pasien.php?id=$id' type='button' class='btn btn-info btn-lg' data-toggle='modal'>Edit</a>
          </td>";
  
          $no++;
        }

        ?>
      </tbody> 
      </tr>
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
    <script type="text/javascript" src="js/file.js"></script>
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