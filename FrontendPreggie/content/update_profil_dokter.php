<?php
    include("process/check_login.php");
    include("connect/connect.php");
    $id=$_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM bidan WHERE id =$id LIMIT 1");
    $bidan = mysqli_fetch_array($sql);
?>

<div class="col-md-7 edit dokter">        
    <div class="col-md-12 input">
    <form class="form-horizontal" role="form" method="post" action="process/dokter/update_profil_dokter.php" align=""> 
        <label>Nama</label>
        <input type="text" name="nama" <?php echo("placeholder='$bidan[nama]'"); ?>><br>
        <label>No HP</label>
        <input type="text" name="no_hp" <?php echo("placeholder='$bidan[no_hp]'"); ?>><br>
        <label>Alamat</label>
        <input type="text" name="alamat" <?php echo("placeholder='$bidan[alamat]'"); ?>><br>
        <div style="text-align:center;" >
            <!-- <button type="submit" name="login" style="border: none; background: #ff6666;"><div onclick="change()" class="btn btn-sm">Simpan</div></button></a> -->
            <input  onclick="change()" type="button" value="Edit" id="myButton1" />
         </div>    
    </div> 
</div>