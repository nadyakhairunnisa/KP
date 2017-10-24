<?php
    include("connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM perkembangan WHERE id =$id LIMIT 1");
    $bidan= mysqli_fetch_array($sql);
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

      <h1 style="text-align: center; margin-top:85px; color:black;">Update Data Perkembangan</h1>
         <form action="proses/perkembangan/update_perkembangan.php" method="POST" enctype="multipart/form-data" style="margin-top:50px;">
            <label>Nama</label> <br>
                <input id="nama" name="nama" type="text" placeholder="Nama" maxlength="50" value="<?php echo $perkembangan['nama'];?>"> <br>
            <label>Nama Dokter</label> <br>
                <div class="form-group" style="margin:0px 100px;">
                  <label for="sel1"></label>
                  <select class="form-control" id="sel1">
                    <option>dr. Hari</option>
                    <option>dr. Nadya</option>
                    <option>dr. Altus</option>
                  </select>
                </div>
             <label>Jadwal Check Up</label> <br>
                <input id="jadwal_check" name="tanggal" type="date" value="<?php echo $perkembangan['jadwal_check'];?>"> <br>
            <label>Usia Kandungan</label> <br>
                <input id="usia_knd" name="usia_knd" type="text" placeholder="Usia Kandungan" maxlength="2" value="<?php echo $perkembangan['usia_knd'];?>"> <br>
            <label>Berat Kandungan</label> <br>
                <input id="berat_knd" name="berat_knd" type="text" placeholder="Berat Kandungan" maxlength="5" value="<?php echo $perkembangan['berat_knd'];?>"> <br>
            <label>Tensi</label> <br>
                <input id="tensi" name="tensi" type="text" placeholder="Tensi" maxlength="10" value="<?php echo $perkembangan['tensi'];?>"> <br>
            <label>Detak Jantung</label> <br>
                <input id="detak_jantung" name="detak_jantung" type="text" placeholder="Detak Jantung" maxlength="10" value="<?php echo $perkembangan['detak_jantung'];?>"> <br>
            <label>Tinggi Badan</label> <br>
                <input id="tinggi_badan" name="tinggi_badan" type="text" placeholder="Tinggi Badan" maxlength="3" value="<?php echo $perkembangan['tinggi_badan'];?>"> <br>
            <label>Berat Badan</label> <br>
                <input id="berat_badan" name="berat_badan" type="text" placeholder="Berat Badan" maxlength="3" value="<?php echo $perkembangan['berat_badan'];?>"> <br>
            <label>Keterangan</label> <br>
                <textarea id="keterangan" name="keterangan" style="width:55%;" value="<?php echo $perkembangan['keterangan'];?>"></textarea> <br>
            <label>Jadwal Selanjutnya</label> <br>
                <input id="jadwal_next" name="tanggal" type="date" value="<?php echo $perkembangan['jadwal_next'];?>"> <br>   
             <label>Status</label> <br>
                <div class="form-group" style="margin:0px 100px;">
                  <label for="sel1"></label>
                  <select class="form-control" id="sel1">
                    <option>Hadir</option>
                    <option>Belum Hadir</option>
                  </select>
                </div>
            <label>Gambar</label> <br>
                <input type="file" style="margin:0px 110px;";> <br>
            <button type="submit" onclick="return konfirmasi_ubah()">Update</button>
            <!-- <a href="kelola_perkembangan_list.html"><div class="btn">Submit</div></a> -->

        </form>

        </form>
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