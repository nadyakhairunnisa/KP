<?php 
	include("../connect/connect.php");
	$user =$_POST['username'];
	$pass =$_POST['password'];

	if(isset($_POST['login'])){
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' and password = '$pass'");

		if(mysqli_num_rows($sql)==1){
			$result = mysqli_fetch_assoc($sql);
			if($result){
				session_start();
				$_SESSION['user']=$user;
				if($result['kode_id']=='1'){
					echo "<script> alert('Anda Berhasil Login');
					window.location.href='../home_admin.php' </script>";
				} else if($result['kode_id']=='2'){
					echo "<script> alert('Anda Berhasil Login');
					window.location.href='../home_dokter.php' </script>";
				} else if($result['kode_id']=='3'){
					echo "<script> alert('Anda Berhasil Login');
					window.location.href='../home_pasien.php' </script>";
				}
			}
				
		} else {
			echo "<script> alert('Username atau Password anda salah!!');
				window.location.href='../login.php' </script>";
		}

		
	}
 ?>