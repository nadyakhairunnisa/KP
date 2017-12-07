<?php
    include("process/check_login.php");
    include("connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
    $bidan = mysqli_fetch_array($sql);
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
    <!--   Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <h1>~ Daftar Pasien ~</h1>
    </div>

    <div class="container-fluid">
    <div class="col-md-12 text-center" id="perkembangan-pasien">    
    
    <!-- Kolom search start -->
        <form class="navbar-form navbar-right" role="search" style="padding-right: 50px; padding-top: 10px">
        <div class="input-group">
            <input type="text" class="form-control"  style="width:200px" placeholder="Pencarian" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
     <!-- Kolom search end -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Nama Pasien</td>
                    <td>Jumlah Check Up</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <!-- <tr> -->
                    <?php
                    $result = mysqli_query($conn,"SELECT id, nama FROM pasien");
                    while ($row = mysqli_fetch_array($result)){

                      $p_id = $row['id'];
                      $nama = $row['nama'];
                      $data = mysqli_query($conn,"SELECT * FROM perkembangan WHERE pasien_id=$p_id");
                      $jumlah = mysqli_num_rows($data);

                      echo "<tr>";
                      echo "<td>$nama</td>";
                      echo "<td>$jumlah</td>";
                      echo "<td><div class='lihat'><a class='btn btn-sm' href='dokter_daftar_perkembangan.php?id=$id&p_id=$p_id'>
                    Lihat Perkembangan</a></div></td>"; 
                      echo "</tr>";
                    } ?>
                <!-- </tr> -->
                <!-- <tr>          
                    <td>3 November 2017</td>
                    <td>Camila Havana</td>
                    <td>2</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>3 November 2017</td>
                    <td>Alana Young</td>
                    <td>3</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>5 November 2017</td>
                    <td>Hailee Rana</td>
                    <td>1</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>6 November 2017</td>
                    <td>Jane Smith</td>
                    <td>2</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>6 November 2017</td>
                    <td>Malika Que</td>
                    <td>4</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>7 November 2017</td>
                    <td>Anindha Mine</td>
                    <td>3</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr>
                <tr>
                    <td>7 November 2017</td>
                    <td>Gie Blum</td>
                    <td>1</td>
                    <td><div class="lihat"><a class="btn btn-sm" href="dokter_perkembangan.html">
                    Lihat Perkembangan</a></div></td>
                </tr> -->
            </tbody>
        </table>
      </div>
        </div>
        </div>
        </div>           
     </div>

    <footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373">
        Copyright &copy Teknik Informatika UII 2017. All right reserved
    </footer>

</body>
</html>
