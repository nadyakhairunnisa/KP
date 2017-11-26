<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT user_id FROM bidan WHERE id='$id'");
	$result = mysqli_fetch_array($query);

	$sql = mysqli_query($conn, "DELETE FROM bidan WHERE id = '$id'");
	$sql2 = mysqli_query($conn, "DELETE FROM user WHERE id = '$result[user_id]'");

	header("Location: ../../read_daftar_dokter.php");
?>