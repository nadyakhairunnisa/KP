<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$today = date('d-m-Y');

	$no_hp = preg_replace("/[^(0-9)]/", "", $no_hp);
	
	mysqli_begin_transaction($conn);

	$query = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE id = '$id'");

	if($query){
		$result = mysqli_query($conn, "UPDATE user set password = '$password' WHERE id = '$user_id'");
		if($result){
			mysqli_commit($conn);
			echo "<script>alert('Data berhasil disimpan!');
			window.location.href='../../dokter_profil.php?id=$id' </script>";
		} else {
			mysqli_rollback($conn);
			echo "<script>alert('Data gagal disimpan. Note: Error updating User.');
			window.location.href='../../dokter_profil.php?id=$id' </script>";
		}
	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan. Note: Error updating Bidan.');
			window.location.href='../../dokter_profil.php?id=$id' </script>";
	}

	mysqli_close();
?>