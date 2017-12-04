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
				if($result['grup_id']=='1'){
					echo "<script> alert('Selamat datang PERAWAT!');
					window.location.href='../admin_home.php' </script>";
				} else if($result['grup_id']=='2'){
					$query = mysqli_query($conn, "SELECT id FROM bidan WHERE user_id = $result[id]");
					$id = mysqli_fetch_assoc($query);
					echo "<script> alert('Selamat datang DOKTER!');
					window.location.href='../dokter_home.php?id=$id[id]' </script>";
				} else if($result['grup_id']=='3'){
					$query = mysqli_query($conn, "SELECT id FROM pasien WHERE user_id = $result[id]");
					$id = mysqli_fetch_assoc($query);
					echo "<script> alert('Selamat datang CALON IBU!');
					window.location.href='../pasien_home.php?id=$id[id]' </script>";
				}
			}
				
		} else {
			echo "<script> alert('Username atau Password anda salah!!');
				window.location.href='../login.php' </script>";
		}

		
	}
 ?>