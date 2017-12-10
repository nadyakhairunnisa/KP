<?php
	include('../../connect/connect.php');
	$pasien_id = $_POST['id'];
	$bidan = $_POST['bidan'];
	$jadwal_check = $_POST['jadwal_check'];
	$usia_knd = $_POST['usia_knd'];
	$berat_knd = $_POST['berat_knd'];
	$tensi = $_POST['tensi'];
	$detak_jantung = $_POST['detak_jantung'];
	$tinggi_badan = $_POST['tinggi_badan'];
	$berat_badan = $_POST['berat_badan'];
	$keterangan = $_POST['keterangan'];
	// $status = $_POST['status'];
	$nama_file = $_FILES['gambar']['name'];
	$tmp_file =$_FILES['gambar']['tmp_name'];

	$path="../../images/".$nama_file;
	$savepic="images/".$nama_file;
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

    $today = date('d-m-Y');
	$tgl_masuk = strtotime($jadwal_check);
	$tgl_today = strtotime($today); 
	
	mysqli_begin_transaction($conn);

	if($tgl_masuk <= $tgl_today){
	    $query = mysqli_query($conn, "INSERT INTO perkembangan (pasien_id, bidan_id, jadwal_check, usia_knd, berat_knd, tensi, detak_jantung, tinggi_badan, berat_badan, keterangan, gambar, status ) values ('$pasien_id', '$bidan', '$jadwal_check', '$usia_knd', '$berat_knd', '$tensi', '$detak_jantung', '$tinggi_badan', '$berat_badan', '$keterangan', '$savepic', 'Hadir')");
	    $move = move_uploaded_file($tmp_file, $path);

	    if($query && $move){
	    	mysqli_commit($conn);
			echo "<script>alert('Data berhasil disimpan!');
				window.location.href='../../read_daftar_perkembangan.php?id=$pasien_id' </script>";
	    } else {
	    	mysqli_rollback($conn);
			echo "<script>alert('Data gagal disimpan. A');
				window.location.href='../../create_perkembangan.php?id=$pasien_id' </script>";
	    }

	} else {
		// mysqli_rollback($conn);
		// echo "<script>alert('Data gagal disimpan. Note: Error updating Time.');
		// 	window.location.href='../../create_perkembangan.php?id=$pasien_id' </script>";

		$query = mysqli_query($conn, "INSERT INTO perkembangan (pasien_id, bidan_id, jadwal_check, usia_knd, status ) values ('$pasien_id', '$bidan', '$jadwal_check', $usia_knd, 'Belum Hadir')");

	    if($query){
	    	mysqli_commit($conn);
			echo "<script>alert('Data berhasil disimpan!');
				window.location.href='../../read_daftar_perkembangan.php?id=$pasien_id' </script>";
	    } else {
	    	mysqli_rollback($conn);
			echo "<script>alert('Data gagal disimpan.');
				window.location.href='../../create_perkembangan.php?id=$pasien_id' </script>";
	    }
	}

	mysqli_close();

    //header("Location: ../../read_daftar_perkembangan.php?id=$pasien_id");
?>
