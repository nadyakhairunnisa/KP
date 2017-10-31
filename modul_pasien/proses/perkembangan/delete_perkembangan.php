<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$sql = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"),"DELETE FROM perkembangan WHERE id = $id");

	mysql_close();
	header("Location: ../../kelola_perkembangan.php");
?>