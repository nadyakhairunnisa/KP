<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	// $user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$gol_darah = $_POST['gol_darah'];
	$usia = $_POST['usia'];
	$nama_wali = $_POST['nama_wali'];
	$today = date('d-m-Y');
	
	$no_hp = preg_replace("/[^(0-9)]/", "", $no_hp);
	$gol_darah = preg_replace("/[^(A,B,AB,O)]/", "", $gol_darah);

	mysqli_begin_transaction($conn);

	$query = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali' WHERE id = '$id'");

	if($query){
		mysqli_commit($conn);
		echo "<script>alert('Data berhasil disimpan!');
			window.location.href='../../pasien_profil.php?id=$id' </script>";
	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan.');
			window.location.href='../../pasien_profil.php?id=$id' </script>";
	}

	mysqli_close();
?>