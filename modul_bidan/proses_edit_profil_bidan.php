<?php
	include("/koneksi/connect.php");
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	

	$sql = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE id = '$id'");

	$sqlpass = mysqli_query($conn, "UPDATE user set password = '$password' WHERE id = '$id'"); 

	if($sql){
		header("Location: profil_bidan.php?id=$id");
	}elseif ($sqlpass) {
		header("Location: profil_bidan.php?id=$id");
		# code...
	}
?>