<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$sql = mysqli_query($conn, "DELETE FROM perkembangan WHERE id = '$id'");

	mysql_close();
	header("Location: ../../read_daftar_perkembangan.php");
?>