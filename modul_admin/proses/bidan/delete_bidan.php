<?php
	include('../../connect/connect.php');
	$id = $_GET['id'];
	$sql = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"),"DELETE FROM bidan WHERE id = $id");

	header("Location: ../../read_bidan.php");
?>
