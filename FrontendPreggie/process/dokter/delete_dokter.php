<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT user_id FROM bidan WHERE id='$id'");
	$user_id = mysqli_fetch_array($query);

	mysqli_begin_transaction($conn);
	$sql = mysqli_query($conn, "DELETE FROM bidan WHERE id = '$id'") && mysqli_query($conn, "DELETE FROM user WHERE id = $user_id[user_id]");

	if($sql){
		mysqli_commit($conn);
		echo "<script>alert('Data berhasil dihapus!');
			window.location.href='../../read_daftar_dokter.php' </script>";
	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal dihapus. Error: Dokter terdapat dalam Data Perkembangan.');
			window.location.href='../../read_profil_dokter.php?id=$id' </script>";
		// echo mysqli_error ($conn );
		// die;
	}

	mysqli_close();
?>