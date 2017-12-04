<?php
	include('../../connect/connect.php');
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$date = $_POST['tanggal'];
	$password = rand();
	$array=explode("-", $date);
	$tahun=$array[0];
	$today = date('d-m-Y');
	$tgl_masuk = strtotime($date);
	$tgl_today = strtotime($today); 
	

	mysqli_begin_transaction($conn);

	if($tgl_masuk <= $tgl_today){
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE grup_id='2'");
		$data = mysqli_num_rows($sql);

		if($data<10){
			$username = 'BD'.($tahun-2000).'00'.($data+1);
		} else if($data>=10 && $data<100){
			$username = 'BD'.($tahun-2000).'0'.($data+1);
		} else if($data>=100){
			$username = 'BD'.($tahun-2000).($data+1);
		}
		

		$sql1 = mysqli_query($conn, "INSERT INTO user (grup_id, username, password) values ('2', '$username', '$password')");

		$result = mysqli_query($conn, "SELECT id FROM user WHERE username='$username'");
		$user_id = mysqli_fetch_array($result);

		$no_hp = preg_replace("/[^(0-9)]/", "", $no_hp);

		$sql2 = mysqli_query($conn, "INSERT INTO bidan (user_id, nama, no_hp, alamat, tanggal) values ('$user_id[id]', '$nama','$no_hp', '$alamat', '$date')");
		
		if($sql1 && $sql2) {
			mysqli_commit($conn);
			echo "<script>alert('Data berhasil disimpan!');
					window.location.href='../../read_daftar_dokter.php' </script>";
		} else {
			mysqli_rollback($conn);
			echo "<script>alert('Data gagal disimpan.');
			window.location.href='../../create_dokter.php' </script>";
			// echo mysqli_error ($conn );
			// die;
		}

	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan. Note: Error updating Time.');
			window.location.href='../../create_dokter.php' </script>";
	}

	mysqli_close();

?>