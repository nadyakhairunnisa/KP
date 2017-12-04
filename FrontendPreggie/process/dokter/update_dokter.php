<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$date = $_POST['tanggal'];
	$array=explode("-", $date);
	$tahun=$array[0];
	$today = date('d-m-Y');
	$tgl_masuk = strtotime($date);
	$tgl_today = strtotime($today); 
	
	mysqli_begin_transaction($conn);

	if($tgl_masuk <= $tgl_today){
		$tgl = mysqli_query($conn, "SELECT tanggal FROM bidan WHERE id='$id'");
		$tgls = mysqli_fetch_array($tgl);
		$tgl = $tgls['tanggal'];
		
		$arrays=explode("-", $tgl);
		$tahunold=$arrays[0];

		if($tahunold != $tahun){		
			$sql = mysqli_query($conn, "SELECT username FROM user WHERE id='$user_id'");
			$sql = mysqli_fetch_array($sql);
			$sql = $sql['username'];
			
			$unameid = substr($sql,-3);
			//echo $unameid . '<hr>';
			$username = 'BD'.($tahun-2000).$unameid;
			//echo $username;
			//die;
			$result = mysqli_query($conn, "UPDATE user set username = '$username' WHERE id = '$user_id'");

			if($result){
				$no_hp = preg_replace("/[^(0-9)]/", "", $no_hp);
				$query = mysqli_query($conn, "UPDATE bidan set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', tanggal = '$date' WHERE id = '$id'");
				if($query){
					mysqli_commit($conn);
					echo "<script>alert('Data berhasil disimpan!');
					window.location.href='../../read_profil_dokter.php?id=$id' </script>";
				} else {
					mysqli_rollback($conn);
					echo "<script>alert('Data gagal disimpan. Note: Error updating Bidan.');
					window.location.href='../../read_profil_dokter.php?id=$id' </script>";
				}
			} else {
				mysqli_rollback($conn);
				echo "<script>alert('Data gagal disimpan. Note: Error updating User.');
				window.location.href='../../read_profil_dokter.php?id=$id' </script>";
			}
		}

	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan. Note: Error updating Time.');
			window.location.href='../../read_profil_dokter.php?id=$id' </script>";
	}

	mysqli_close();

	// header("Location: ../../read_profil_dokter.php?id=$id");
	
?>