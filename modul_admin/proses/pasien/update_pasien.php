<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$gol_darah = $_POST['gol_darah'];
	$usia = $_POST['usia'];
	$nama_wali = $_POST['nama_wali'];
	$date = date('d-m-Y');

	$sql = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali', tanggal = '$date' WHERE id = '$id'");
	if($sql){
		header("Location: ../../read_profil.php");
	}
?>



