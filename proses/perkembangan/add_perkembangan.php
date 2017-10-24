<?php
	include('../../connect/connect.php');
	$jadwal_check = $_POST['jadwal_check'];
	$usia_knd = $_POST['usia_knd'];
	$berat_knd = $_POST['berat_knd'];
	$tensi = $_POST['tensi'];
	$detak_jantung = $_POST['detak_jantung'];
	$tinggi_badan = $_POST['tinggi_badan'];
	$berat_badan = $_POST['berat_badan'];
	$keterangan = $_POST['keterangan'];
	$jadwal_next = $_POST['jadwal_next'];
	$status = $_POST['status'];
	$namafile = $_FILES['gambar']['name'];
	$tmp_file =$_FILES['gambar']['tmp_name'];

	$path="../../images/".$nama_file;
    // $uploadfile = $dir_gambar . $namafile;

// 	if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
// 	$sql = "INSERT INTO perkembangan (pasien_id, bidan_id, jadwal_check, usia_knd, berat_knd, tensi, detak_jantung, tinggi_badan, berat_badan, keterangan, jadwal_next, gambar, status ) values ('2', '2', '$jadwal_check', '$usia_knd', '$berat_knd', '$tensi', '$detak_jantung', '$tinggi_badan', '$berat_badan', '$keterangan', '$jadwal_next', '$namafile', 'hadir')";
// 	$result = mysqli_query($conn, $sql);
// 	if($result){
// 		header("Location: ../../read_perkembangan.php");
// 	}else{
// 		echo "<script>alert('Coba lagi')</script>";
// 	}
// } 

    mysqli_query($conn, "INSERT INTO perkembangan (pasien_id, bidan_id, jadwal_check, usia_knd, berat_knd, tensi, detak_jantung, tinggi_badan, berat_badan, keterangan, jadwal_next, gambar, status ) values ('2', '2', '$jadwal_check', '$usia_knd', '$berat_knd', '$tensi', '$detak_jantung', '$tinggi_badan', '$berat_badan', '$keterangan', '$jadwal_next', '$namafile', 'hadir')");
    move_uploaded_file($tmp_file, $path);

    header("Location: ../../read_perkembangan.php");

// header("Location: ../../create_perkembangan.php");
	
?>
