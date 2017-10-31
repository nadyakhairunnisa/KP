<?php
	include("../koneksi/connect.php");

	//$user_id = $_GET['id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$password = rand();
	$tanggal = getdate();
	$tahun = $tanggal['year'];

	$sql = mysqli_query($conn, "SELECT * FROM user WHERE kode_id='1'");
	$data = mysqli_num_rows($sql);

	if($data<10){
		$username = 'BD'.($tahun-2000).'00'.($data+1);
	} else if($data>=10 && $data<100){
		$username = 'BD'.($tahun-2000).'0'.($data+1);
	} else if($data>=100){
		$username = 'BD'.($tahun-2000).($data+1);
	}

	mysqli_query($conn, "INSERT INTO user (kode_id, username, password) values ('1', '$username', '$password')");

	$result = mysqli_query($conn, "SELECT id FROM user WHERE username='$username'");
	$user_id = mysqli_fetch_array($result);

	mysqli_query($conn, "INSERT INTO bidan (user_id, nama, no_hp, alamat, tanggal) values ('$user_id[id]','$nama','$no_hp','$alamat','$tahun')");
	
	header("Location: ../login.php");

?> 