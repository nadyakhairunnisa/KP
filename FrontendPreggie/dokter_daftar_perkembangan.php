<?php
    include("process/check_login.php");
    include("connect/connect.php");
    $id=$_GET['id'];
    $p_id=$_GET['p_id'];
    $sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
    $bidan = mysqli_fetch_array($sql);
    $sql2 = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$p_id LIMIT 1");
    $pasien = mysqli_fetch_array($sql2);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- StyleSheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
</head>

    <body style="background:#fafafa;">

    <!-- Navbar Section -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>>Home</a></li>          
          <li><a <?php echo ("href='dokter_profil.php?id=$bidan[id]'"); ?>>Profil</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
        <br><br><?php $sql = mysqli_query($conn, "SELECT * FROM perkembangan WHERE pasien_id=$pasien[id]");
            $data = mysqli_num_rows($sql);
            echo "Jumlah Check-Up: ".$data." Kali"; ?></h5>

        <!-- Kolom search start -->
        <form class="navbar-form navbar-right" role="search" style="padding-right: 50px; padding-top: 10px">
       <div class="input-group-vertical space" style="margin-bottom: 10px; ">
            <input type="text" class="form-control"  style="width:200px" placeholder="Pencarian">
            <button class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search" ></i></button>
        </div>
    </form> 
     <!-- Kolom search end -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Dokter</td>
                    <td>Usia Kandungan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = mysqli_query($conn, "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id WHERE p.pasien_id = $pasien[id] ORDER BY p.jadwal_check DESC");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pkmb_id = $row['id'];
                        $tanggal = $row['jadwal_check'];
                        $bidan = $row['nama'];
                        $usia_knd = $row['usia_knd'];
                            
                        echo "<tr>";
                        echo "<td>$tanggal</td>";
                        echo "<td>$bidan</td>";
                        echo "<td>$usia_knd"." Minggu</td>";
                        echo "<td>
                        <div class='lihat'><a class='btn btn-sm' href='dokter_perkembangan.php?id=$id&p_id=$pasien[id]&pkmb_id=$pkmb_id'>Lihat Perkembangan</a></div>
                        </td>";
                        echo "</tr>";
                    }
                ?>
                <!-- <tr>
                    <td>9 November 2017</td>
                    <td>dr.Nurul Fatikah M Sp.OG</td>
                    <td>3 Minggu</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">Detail Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>30 November 2017</td>
                    <td>dr.Nurul Fatikah M Sp.OG</td>
                    <td>6 Minggu</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">Detail Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>21 Desember 2017</td>
                    <td>dr.Nurul Fatikah M Sp.OG</td>
                    <td>9 Minggu</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">Detail Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>14 Januari 2018</td>
                    <td>dr.Nurul Fatikah M Sp.OG</td>
                    <td>12 Minggu</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr> -->
            </tbody>
        </table>
      </div>
    </div>

     <footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373; margin: 60px 0px 0px">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>
    
    <!--   Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
    </body>
  </html>
