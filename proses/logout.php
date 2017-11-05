<?php
	include("../connect/connect.php");
	session_start();
	if(isset($_SESSION['user'])){
		session_destroy();
		echo "<script> alert('Sampai Jumpa Lagi!');
		 	  window.location.href='../login.php';	</script>";
	}
	
?>