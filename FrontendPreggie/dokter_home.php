<?php
include("process/check_login.php");
include("connect/connect.php");
$id=$_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
$bidan = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn, "SELECT DISTINCT pasien_id FROM perkembangan WHERE bidan_id =$id");
$sql3 = mysqli_query($conn, "SELECT DISTINCT pasien_id FROM perkembangan WHERE bidan_id =$id");
    // $p = mysqli_fetch_array($sql2);
    // while($row = mysqli_fetch_array($p)){
    //     $pasien_id = $row['pasien_id'];
    // }
    // $result = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasien_id");
// function ReadAtribut($strSql)
// {
//     include("connect/connect.php");

//     // $display = mysqli_query($conn, $strSql);
   
//     $arrResultID = Array();
//     // $arrResultNama = Array();
   
//     $cnt=0;
   
//     while ($data = mysqli_fetch_row($strSql))
//     {
//         $arrResultID[$cnt++] = $data[0];
//         // $arrResultNama[$cnt++] = $data[1];
//     }

//     return $arrResultID;
// }

// $pasien_id = ReadAtribut($sql2);
// $tot = mysqli_num_rows($pasien_id);
// $nm = 0;
// while($nm<$tot){
//     $resultbefore = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasien_id[$nm]");
//     $result = ReadAtribut($resultbefore);
//     $nm++;
// }

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
          <a class="navbar-brand" <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
          <li class="active"><a <?php echo ("href='dokter_home.php?id=$bidan[id]'"); ?>>Home</a></li>          
          <li><a <?php echo ("href='dokter_profil.php?id=$bidan[id]'"); ?>>Profil</a></li>
          <li><a href="process/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
        <form class="navbar-form navbar-right" role="search" >
            <div class="input-group-vertical space" style="margin-bottom: 10px; ">
                <form action="dokter_home.php" method="get">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <input type="text" class="form-control"  style="width:200px" placeholder="Pencarian" name="cari">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
                </form>
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
                <?php
                // while($p = mysqli_fetch_array($sql2)){
                    // $psn_id = $p['pasien_id'];
                    if(isset($_GET['cari']) && isset($_GET['id'])){
                        $cari = $_GET['cari'];
                        echo "<b>Hasil pencarian : ".$cari."</b><br>";
                        $resultcari = mysqli_query($conn, "SELECT nama FROM pasien WHERE nama LIKE '%$cari%'");
                        $num = 0;
                        $resultid = Array();
                        while($r = mysqli_fetch_array($resultcari)){
                            $searchresult = $r['nama'];
                            while($p = mysqli_fetch_array($sql2)){
                                $psn_id = $p['pasien_id'];
                                $resultnama = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $psn_id");
                                while($q = mysqli_fetch_array($resultnama)){
                                    if($searchresult == $q['nama']){
                                        $resultid[$num++] = $q['id'];
                                    }
                                }   
                            }
                        
                        // if ($row === NULL) {
                        //     // printf("Error: %s\n", mysqli_error($conn));
                        //     echo "Kata tidak ditemukan.";
                        //     $resultbefore = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasien_id");
                        //     $result = ReadAtribut($resultbefore);
                        //     // break;
                        //     // die();
                        // }
                    }

                    $nums = 0;
                    
                    if(!empty($resultid[$nums])){
                        while($nums<$num){
                            $finresult = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $resultid[$nums]");
                            $row = mysqli_fetch_array($finresult);
                            $p_id = $row['id'];
                            $nama = $row['nama'];
                            $data = mysqli_query($conn,"SELECT * FROM perkembangan WHERE pasien_id=$p_id");
                            $jumlah = mysqli_num_rows($data);

                            echo "<tr>";
                            echo "<td>$nama</td>";
                            echo "<td>$jumlah</td>";
                            echo "<td><div class='lihat'><a class='btn btn-sm' href='dokter_daftar_perkembangan.php?id=$id&p_id=$p_id'>
                            Perkembangan</a></div></td>"; 
                            echo "</tr>";
                            $nums++;
                        }
                        //break;     
                    } else {
                        echo "Kata tidak ditemukan.";
                        while($w = mysqli_fetch_array($sql3)){
                            $pasiensid = $w['pasien_id'];
                            $finsresult = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasiensid");
                            $roww = mysqli_fetch_array($finsresult);
                                $p_ids = $roww['id'];
                                $namas = $roww['nama'];
                                $datas = mysqli_query($conn,"SELECT * FROM perkembangan WHERE pasien_id=$p_ids");
                                $jumlahs = mysqli_num_rows($datas);

                                echo "<tr>";
                                echo "<td>$namas</td>";
                                echo "<td>$jumlahs</td>";
                                echo "<td><div class='lihat'><a class='btn btn-sm' href='dokter_daftar_perkembangan.php?id=$id&p_id=$p_ids'>
                                Perkembangan</a></div></td>"; 
                                echo "</tr>";
                        }
                    }
                }

                while($p = mysqli_fetch_array($sql2)){
                    $pasienid = $p['pasien_id'];
                    $finresult = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasienid");
                    $row = mysqli_fetch_array($finresult);
                        $p_id = $row['id'];
                        $nama = $row['nama'];
                        $data = mysqli_query($conn,"SELECT * FROM perkembangan WHERE pasien_id=$p_id");
                        $jumlah = mysqli_num_rows($data);

                        echo "<tr>";
                        echo "<td>$nama</td>";
                        echo "<td>$jumlah</td>";
                        echo "<td><div class='lihat'><a class='btn btn-sm' href='dokter_daftar_perkembangan.php?id=$id&p_id=$p_id'>
                        Perkembangan</a></div></td>"; 
                        echo "</tr>";
                }
                    // else {
                    //     $resultbefore = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasien_id");
                    //     $result = ReadAtribut($resultbefore);
                    // }
                // }
                // $tot = mysqli_num_rows($rows);
                // $nm = 0;
                // while($nm<$tot){
                //     if ($rows === NULL) {
                //             // printf("Error: %s\n", mysqli_error($conn));
                //         echo "Kata tidak ditemukan.";
                //         $resultbefore = mysqli_query($conn, "SELECT id, nama FROM pasien WHERE id = $pasien_id");
                //         $result = ReadAtribut($resultbefore);
                //             // break;
                //             // die();
                //     } else {
                //         $result = Array();

                //         $cnt=0;

                //         while ($data = mysqli_fetch_row($rows))
                //         {
                //             $result[$cnt++] = $data[0];
                //         }
                //     }
                //     $nm++;
                // }
                

                //     // $arr_key=ReadAtribut($result);

                //     while($row = mysqli_fetch_array($result)){

                //     $p_id = $row['id'];
                //     $nama = $row['nama'];
                //     $data = mysqli_query($conn,"SELECT * FROM perkembangan WHERE pasien_id=$p_id");
                //     $jumlah = mysqli_num_rows($data);

                //     echo "<tr>";
                //     echo "<td>$nama</td>";
                //     echo "<td>$jumlah</td>";
                //     echo "<td><div class='lihat'><a class='btn btn-sm' href='dokter_daftar_perkembangan.php?id=$id&p_id=$p_id'>
                //     Lihat Perkembangan</a></div></td>"; 
                //     echo "</tr>";
                // }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>           
</div>

<footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373; margin: 120px 0px 0px">
    Copyright &copy Teknik Informatika UII 2017. All right reserved
</footer>

<!--   Script -->
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/js.js"></script>

</body>
</html>
