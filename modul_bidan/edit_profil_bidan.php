<?php
	include("/koneksi/connect.php");
	$id=$_GET['id'];
	$query = mysqli_query($conn,"SELECT * FROM bidan WHERE id=$id");
  $bidan = mysqli_fetch_array($query);
  
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
		            	
		          </div>        
		        </div>        
		      </nav>

      <!-- <div class="col-md-11 kibu"> -->

            <div class="col-md-11 kibu">
            
     			 <h1 style="text-align: center; margin-top:50px;">Form Edit Profil</h1>

     			 
     		<div id="form_edit">
				<form  method="POST" action="proses_edit_profil_bidan.php" align=" ">
					 
					<input type="hidden" name="id" value="<?php echo $bidan['id'];?>">
					<label>nama</label> <br>
					<input style="float:center; border:1px solid #ababab;" type="text" name="nama" value="<?php echo $bidan['nama']; ?>"><br>
        			<br>
					
					<label>No.Hp</label> <br>
					<input style="float:center; border:1px solid #ababab;" type="text" name="no_hp" value="<?php echo $bidan['no_hp']; ?>"><br>
        			<br>
					
					<label>Alamat</label> <br>
					<textarea style="float:center; border: 1px solid #ababab; text-align:center" name="alamat"><?php echo $bidan['alamat']; ?></textarea><br>
        			<br>

          <label>Password</label> <br>
          <input style="float:center; border:1px solid #ababab;" type="password" name="password" value="<?php echo $bidan['password']; ?>"><br>
              <br>

          <!-- <button class='btn btn-info btn-lg' style='color:white;'type="submit">Simpan</button>     -->
          <button class='btn btn-info btn-lg' style='color:white;'type="submit" onClick="return konfirmasi_kirim()">Simpan</button>
          <!-- <button class='btn btn-info btn-lg' style='color:white;'type="reset"  onclick="location.href='profil_dokter.php'">Cancel</button><br><br>  --> 
          <?php echo("<a href='profil_bidan.php?id=$id'>"); ?><button class='btn btn-info btn-lg' style='color:white;' type="button" onClick="return konfirmasi_hapus()">Cancel</button></a><br><br>    
        

			            
			      	</form>
			      	</div>
			      	</div>


		<script src="js/jquery.js"></script>    
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        
    <script>
        new WOW().init();
    </script>  


  </body>
  </html>
