<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT pasien_id FROM perkembangan WHERE id = '$id'");
	$pid = mysqli_fetch_array($query);
	// echo $pid['pasien_id'];
	// die;
	
	mysqli_begin_transaction($conn);

	$sql = mysqli_query($conn, "DELETE FROM perkembangan WHERE id = '$id'");

	if($sql){
		mysqli_commit($conn);
		echo "<script>alert('Data berhasil dihapus!');
			window.location.href='../../read_daftar_perkembangan.php?id=$pid[pasien_id]' </script>";
	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal dihapus.');
			window.location.href='../../read_daftar_perkembangan.php?id=$pid[pasien_id]' </script>";
		// echo mysqli_error ($conn );
		// die;
	}

	mysql_close();
	// header("Location: ../../read_daftar_perkembangan.php");
?>