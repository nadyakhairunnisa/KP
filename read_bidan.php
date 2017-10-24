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
                <li><a href="kelola_ibu.html" class="page-scroll">PASIEN</a></li>               
                <li><a href="#page-top" class="page-scroll">BIDAN</a></li>                
                <li><a href="kelola_jadwal.html" class="page-scroll">CHECK - UP</a></li>                
                <li><a href="kelola_perkembangan_list.html" class="page-scroll">PERKEMBANGAN</a></li>                
                <li><a href="#" class="page-scroll">Login As Perawat</a></li>                
                <li><a href="login_admin.html" class="page-scroll">Sign-Out</a></li>                
            </ul>              
          </div>        
        </div>        
      </nav>

      

      <div class="col-md-11 kibu">  
      <h1 style="text-align: center; margin-bottom:30px;">Kelola Data Bidan</h1>
        <table>
          <thead>
          <th>NO</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>No.Handphone</th>
          <th>Alamat</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </thead>

        <tbody>
          <?php
          $query = "SELECT b.id, b.user_id, u.username, u.password, b.nama, b.no_hp, b.alamat, b.tanggal FROM bidan b JOIN user u ON (u.id = b.user_id)";
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
             <a href='edit_bidan.php' type='button' class='btn btn-info btn-lg' data-toggle='modal'> Edit </a>
            <a href='proses/bidan/delete_bidan.php' type='button' class='btn btn-info btn-lg' data-toggle='modal' onclick='return konfirmasi_hapus()'> Delete </a>
          </td>";
  
          $no++;
        }

        ?>
      </tbody>

    
           <!--    <tr>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>NO. HANDPHONE</th>
                <th>ALAMAT</th>
                <th></th>
              </tr>
              <tr>
                <td>dr. Altus Torahunci</td>
                <td>doct160609</td>
                <td>pw160609</td>
                <td>0812345678</td>
                <td>Jl. Kaliurang</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td>
              </tr>
              <tr>
                <td>dr. Nadya Khairunnisa</td>
                <td>doct131204</td>
                <td>pw160204</td>
                <td>0898765432</td>
                <td>Jl. Pamungkas</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td> -->

        <!-- </div>
              </tr>
              <tr>
                <td>dr. Hari Kurnia</td>
                <td>doct163112</td>
                <td>pw163112</td>
                <td>0823545678</td>
                <td>Jl. Besi</td>
                <td>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal">Edit</button>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete">Delete</button>
                </td>
              </tr> -->
            </table>

      </div>
      <div class="col-md-1 kibu"><a href="create_bidan.php"><button>Tambah Data</button></a></div>

      
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