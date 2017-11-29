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

	$tgl = mysqli_query($conn, "SELECT tanggal FROM pasien WHERE id='$id'");
	$tgls = mysqli_fetch_array($tgl);
	$tgl = $tgls['tanggal'];
	
	$arrays=explode("-", $tgl);
	$tahunold=$arrays[0];

	if($tahunold != $tahun){		
		$sql = mysqli_query($conn, "SELECT username FROM user WHERE id='$user_id'");
	$sql = mysqli_fetch_array($sql);
	$sql = $sql['username'];
		
		$unameid = substr($sql,-3);
echo $unameid . '<hr>';
		$username = 'PS'.($tahun-2000).$unameid;
echo $username;
die;
		$result = mysqli_query($conn, "UPDATE user set username = '$username' WHERE id = '$user_id'");

		// $password = rand();
		// mysqli_query($conn, "INSERT INTO user (grup_id, username, password) values ('3', '$username', '$password')");

		// $result = mysqli_query($conn, "SELECT id FROM user WHERE username='$username'");
		// $new_user_id = mysqli_fetch_array($result);

		// $query = mysqli_query($conn, "UPDATE pasien set user_id = '$new_user_id[id]', nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali', tanggal = '$date' WHERE id = '$id'");
		// $del = mysqli_query($conn, "DELETE FROM user WHERE id = '$user_id'");
	}

	$query = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali', tanggal = '$date' WHERE id = '$id'");

	if($query){
		header("Location: ../../read_profil_pasien.php?id=$id");
	}
?>



