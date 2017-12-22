<?php
  include("process/check_login.php");
  include("connect/connect.php");
  $id=$_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
  $pasien = mysqli_fetch_array($sql);
  $result = mysqli_query($conn, "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id WHERE p.pasien_id = '$id' ORDER BY p.jadwal_check ASC");
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

    <body style="background:#fafafa;">

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

    <div class="col-md-12 profil_pasien">
        <h1>~ Daftar Perkembangan ~</h1>
    </div>

    <div class="container-fluid">
    <div class="col-md-12 text-center" id="perkembangan-pasien">
      <h5><span  style="font-weight: 600; font-size: 20px"><?php echo $pasien['nama']; ?></span>
        <br><br><?php $sql2 = mysqli_query($conn, "SELECT * FROM perkembangan WHERE pasien_id=$id");
            $data = mysqli_num_rows($sql2);
            echo "Jumlah Check-Up: ".$data." Kali"; ?></h5>

        <!-- Kolom search start -->
        <form class="navbar-form navbar-right" role="search" >
            <!-- <div class="input-group-vertical space" style="margin-bottom: 10px; ">
                <form action="read_daftar_perkembangan.php?id=<?php echo $id; ?>" method="get">
                    <input type="text" class="form-control"  style="width:200px" placeholder="Pencarian" name="cari">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
                </form>
            </div> -->
            <div class="input-group-vertical text-right"  >
                <a class="btn btn-default" href="create_perkembangan.php?id=<?php echo $id; ?>" style="width:200px; color: #4d4d4d"><span class="glyphicon glyphicon-plus"></span>Tambah Perkembangan</a></div>
        </form>
        <!-- Kolom search end -->

        <!-- <?php 
        if(isset($_GET['cari']) && isset($_GET['id'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b><br>";
            // $likeVar = "%" . $cari . "%";
            $result = mysqli_query($conn, "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id WHERE p.pasien_id = $id AND p.usia_knd LIKE '%$cari%' ORDER BY p.jadwal_check ASC");
            if ($result === NULL) {
                // printf("Error: %s\n", mysqli_error($conn));
                echo "Kata tidak ditemukan.";
                $result = mysqli_query($conn, "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id WHERE p.pasien_id = $id ORDER BY p.jadwal_check ASC");
                // die();
            }
        }
        ?> -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Dokter</td>
                    <td>Usia Kandungan</td>
                    <td>Aksi</td>
                    <td>History</td>
                </tr>
            </thead>
            <tbody>
                <!-- <tr> -->
                    <?php
                        $result = mysqli_query($conn, "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd, p.riwayat FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id WHERE p.pasien_id = $id ORDER BY p.jadwal_check DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $tanggal = $row['jadwal_check'];
                            $bidan = $row['nama'];
                            $usia_knd = $row['usia_knd'];
                            $riwayat = $row['riwayat'];
                            
                            echo "<tr>";
                            echo "<td>$tanggal</td>";
                            echo "<td>$bidan</td>";
                            echo "<td>$usia_knd"." Minggu</td>";
                            echo "<td>
                            <div class='lihat'><a class='btn btn-sm' href='read_perkembangan.php?id=$id'>Lihat Perkembangan</a></div>
                            </td>";
                            echo "<td>$riwayat</td>";
                            echo "</tr>";
                        }
                    ?>
                
            </tbody>
        </table> 
            <div class=" text-left" style="margin-bottom: 10px; width: 60em">        
            <a href="read_daftar_pasien.php" class="btn btn-default btn-sm" style="color: #ff6666">
            <span class="glyphicon glyphicon-backward"></span> Kembali
            </a>
            </div>
      </div>
    </div>

    <footer class="navbar navbar-default text-center" style="padding: 30px 0px 50px; color: #737373; margin: 20px 0px 0px">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>
        
     <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
    
    </body>
  </html>
