<?php
include("process/check_login.php");
include("connect/connect.php");
$result = mysqli_query($conn, "SELECT id, nama FROM pasien");
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
    <h1>~ Daftar Pasien ~</h1>
</div>

<div class="container-fluid">
    <div class="col-md-12 col-md-offset-2 text-center" id="perkembangan-admin">    

        <!-- Kolom search start -->
        <form class="navbar-form navbar-right" role="search" >
            <div class="input-group-vertical space" style="margin-bottom: 10px; ">
                <form action="read_daftar_pasien.php" method="get">
                    <input type="text" class="form-control"  style="width:200px" placeholder="Pencarian" name="cari">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
                </form>
            </div><br><br><br>
            <div class="input-group-vertical text-right"  >
                <a class="btn btn-default" href="create_pasien.php" style="width:200px; color: #737373"><span class="glyphicon glyphicon-plus"></span>Tambah Pasien</a>
            </div>
        </form>
        <!-- Kolom search end -->

        <?php 
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b><br>";
            $likeVar = "%" . $cari . "%";
            $result = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE nama LIKE '$likeVar'");
            // $row = mysqli_fetch_array($result);
            // while ($row = mysqli_fetch_array($result)){
            //     echo $row['nama']."<br>";
            // }
            // die;
            if (mysqli_num_rows($result) == 0) {
                // printf("Error: %s\n", mysqli_error($conn));
                echo "Kata tidak ditemukan.";
                $result = mysqli_query($conn, "SELECT id, nama FROM pasien");
                // die();
            }
        }
        ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Nama Pasien</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {

                    $id = $row['id'];
                    $nama = $row['nama'];

                    echo "<tr>";
                    echo "<td>$nama</td>";
                    echo "<td>
                    <div class='dpasien'>
                        <a class='dpasien_a btn btn-sm' href='read_profil_pasien.php?id=$id'>Profil</a>
                        <a class='dpasien_b btn btn-sm' href='read_daftar_perkembangan.php?id=$id'>Perkembangan</a>
                    </div> </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-left">
        <a href="admin_home.php" class="btn btn-default btn-sm" style="width: 20%; color: #ff6666; margin: 30px">
        <span class="glyphicon glyphicon-backward"></span> Kembali
        </a>
    </div>
    </div>
</div>
<footer class="navbar navbar-default text-center" style="padding: 30px 0px 50px; color: #737373; margin: 60px 0px 0px">
    Copyright &copy Teknik Informatika UII 2017. All right reserved
</footer>
</div>
</div>           
</div>

    <!--   Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>

</body>
</html>