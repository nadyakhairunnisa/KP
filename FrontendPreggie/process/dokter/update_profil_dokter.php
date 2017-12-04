<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	// $user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];

	$no_hp = preg_replace("/[^(0-9)]/", "", $no_hp);
	
	mysqli_begin_transaction($conn);

	$query = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE id = '$id'");

	if($query){
		mysqli_commit($conn);
		echo "<script>alert('Data berhasil disimpan!');
			window.location.href='../../dokter_profil.php?id=$id' </script>";
	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan.');
			window.location.href='../../dokter_profil.php?id=$id' </script>";
	}

	mysqli_close();
?>