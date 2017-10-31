<?php 
	include("../koneksi/connect.php");
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
					window.location.href='../home_admin.php' </script>";
				} else if($result['grup_id']=='2'){
					echo "<script> alert('Selamat datang DOKTER!');
					window.location.href='../home_bidan.php?id=$result[id]' </script>";
				} else if($result['grup_id']=='3'){
					echo "<script> alert('Selamat datang CALON IBU!');
					window.location.href='../home_pasien.php?id=$result[id]' </script>";
				}
			}
				
		} else {
			echo "<script> alert('Username atau Password anda salah!!');
				window.location.href='../login.php' </script>";
		}

		
	}
 ?>