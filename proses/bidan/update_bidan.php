<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$date = date('d-m-Y');

	$sql = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', tanggal = '$date' WHERE id = '$id'");
	if($sql){
		header("Location: ../../read_bidan.php");
	}
?>