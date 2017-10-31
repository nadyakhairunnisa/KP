<?php
	include('../../connect/connect.php');
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$gol_darah = $_POST['gol_darah'];
	$usia = $_POST['usia'];
	$nama_wali = $_POST['nama_wali'];
	$date = $_POST['tanggal'];
	$password = rand();
	$array=explode("-", $date);
	$tahun=$array[0];

	// $sql = "INSERT INTO pasien (user_id, nama, no_hp, alamat, gol_darah, usia, nama_wali, tanggal) values ('1', '$nama', '$no_hp', '$alamat', '$gol_darah', '$usia', '$nama_wali', '$tanggal')";
	// $result = mysqli_query($conn, $sql);
	// if($result){
	// 	header("Location: ../../read_pasien.php");
	// }else{
	// 	echo "<script>alert('Coba lagi')</script>";
	// }

	$sql = mysqli_query($conn, "SELECT * FROM user WHERE grup_id='3'");
	$data = mysqli_num_rows($sql);

	if($data<10){
		$username = 'PS'.($tahun-2000).'00'.($data+1);
	} else if($data>=10 && $data<100){
		$username = 'PS'.($tahun-2000).'0'.($data+1);
	} else if($data>=100){
		$username = 'PS'.($tahun-2000).($data+1);
	}
	

	mysqli_query($conn, "INSERT INTO user (grup_id, username, password) values ('3', '$username', '$password')");

	$result = mysqli_query($conn, "SELECT id FROM user WHERE username='$username'");
	$user_id = mysqli_fetch_array($result);

	mysqli_query($conn, "INSERT INTO pasien (user_id, nama, no_hp, alamat, gol_darah, usia, nama_wali, tanggal) values ('$user_id[id]', '$nama', '$no_hp', '$alamat', '$gol_darah', '$usia', '$nama_wali', '$date')");
	
	header("Location: ../../read_profil.php");
?>

