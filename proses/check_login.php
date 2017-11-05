<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script> alert('Anda Belum Login');
		window.location.href='../login.php' </script>";
	} else {
		$user = $_SESSION['user'];
	}
?>