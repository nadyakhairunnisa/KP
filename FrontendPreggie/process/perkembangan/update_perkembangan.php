<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	// $pasien_id = $_POST['id'];
	$bidan = $_POST['bidan'];
	$jadwal_check = $_POST['jadwal_check'];
	$usia_knd = $_POST['usia_knd'];
	$berat_knd = $_POST['berat_knd'];
	$tensi = $_POST['tensi'];
	$detak_jantung = $_POST['detak_jantung'];
	$tinggi_badan = $_POST['tinggi_badan'];
	$berat_badan = $_POST['berat_badan'];
	$keterangan = $_POST['keterangan'];
	// $namafile = $_FILES['gambar']['name'];
 	// $uploadfile = $dir_gambar . $namafile;
	// $status = $_POST['status'];
	$today = date('d-m-Y');
	$tgl_masuk = strtotime($jadwal_check);
	$tgl_today = strtotime($today); 
	
	mysqli_begin_transaction($conn);

	if($tgl_masuk <= $tgl_today){
		$sql = mysqli_query($conn, "UPDATE perkembangan set bidan_id = '$bidan', jadwal_check = '$jadwal_check', usia_knd= '$usia_knd', berat_knd = '$berat_knd', tensi = '$tensi', detak_jantung = '$detak_jantung', tinggi_badan = '$tinggi_badan', berat_badan = '$berat_badan', keterangan = '$keterangan', status = 'Hadir' WHERE id = '$id'");
		if($sql){
			mysqli_commit($conn);
			echo "<script>alert('Data berhasil disimpan!');
				window.location.href='../../read_perkembangan.php?id=$id' </script>";
		} else {
			printf('Error: %s\n', mysqli_error($conn));
			die();
			mysqli_rollback($conn);
			echo "<script>alert('Data gagal disimpan.');
				window.location.href='../../read_perkembangan.php?id=$id' </script>";
		}

	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan. Note: Error updating Time.');
			window.location.href='../../read_perkembangan.php?id=$id' </script>";
	}

	mysqli_close();

	// header("Location: ../../read_daftar_perkembangan.php");
?>

