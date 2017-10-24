<?php
	include("../../connect/connect.php");
	$jadwal_check = $_POST['jadwal_check'];
	$usia_knd = $_POST['usia_knd'];
	$berat_knd = $_POST['berat_knd'];
	$tensi = $_POST['tensi'];
	$detak_jantung = $_POST['detak_jantung'];
	$tinggi_badan = $_POST['tinggi_badan'];
	$berat_badan = $_POST['berat_badan'];
	$keterangan = $_POST['keterangan'];
	$jadwal_next = $_POST['jadwal_next'];
	// $namafile = $_FILES['gambar']['name'];
 //    $uploadfile = $dir_gambar . $namafile;
	$status = $_POST['status']
	$date = date('d-m-Y');

	$sql = mysqli_query($conn, "UPDATE perkembangan set jadwal_check = '$jadwal_check', usia_knd= '$usia_knd', berat_knd = '$berat_knd', tensi = '$tensi', detak_jantung = '$detak_jantung', tinggi_badan = '$tinggi_badan', berat_badan = '$berat_badan', keterangan = '$keterangan', jadwal_next = '$jadwal_next', status = '$status', tanggal = '$date'  WHERE id = '$id'");
	if($sql){
		header("Location: ../../kelola_perkembangan.php");
	}
?>

