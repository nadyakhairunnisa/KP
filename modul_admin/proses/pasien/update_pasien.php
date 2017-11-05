<?php
	include("../../../connect/connect.php");
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$gol_darah = $_POST['gol_darah'];
	$usia = $_POST['usia'];
	$nama_wali = $_POST['nama_wali'];
	$date = $_POST['tanggal'];
	$array=explode("-", $date);
	$tahun=$array[0];

	$tgl = mysqli_query($conn, "SELECT tanggal FROM pasien WHERE user_id='$user_id'");
	$arrays=explode("-", $tgl);
	$tahuns=$arrays[0];

	if($tahuns == $tahun){
		$query = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali', tanggal = '$date' WHERE id = '$id'");

	} else {
		
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE grup_id='3'");
		$data = mysqli_num_rows($sql);

		if($data<10){
			$username = 'PS'.($tahun-2000).'00'.($data+1);
		} else if($data>=10 && $data<100){
			$username = 'PS'.($tahun-2000).'0'.($data+1);
		} else if($data>=100){
			$username = 'PS'.($tahun-2000).($data+1);
		}

		$password = rand();
		mysqli_query($conn, "INSERT INTO user (grup_id, username, password) values ('3', '$username', '$password')");

		$result = mysqli_query($conn, "SELECT id FROM user WHERE username='$username'");
		$new_user_id = mysqli_fetch_array($result);

		$query = mysqli_query($conn, "UPDATE pasien set user_id = '$new_user_id[id]', nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali', tanggal = '$date' WHERE id = '$id'");
		$del = mysqli_query($conn, "DELETE FROM user WHERE id = '$user_id'");
	}

	if($query){
		header("Location: ../../read_profil_pasien.php?id=$id");
	}
?>



