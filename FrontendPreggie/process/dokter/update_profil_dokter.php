<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	// $user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	
	$query = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', tanggal = '$date' WHERE id = '$id'");

	if($query){
		header("Location: ../../dokter_profil.php?id=$id");
	}
?>