<?php
	session_start();
	if(isset($_SESSION['user'])){
		session_destroy();
		echo "<script> alert('Berhasil Logout');
		 	  window.location.href='../../admin.php';	</script>";
	}
?>