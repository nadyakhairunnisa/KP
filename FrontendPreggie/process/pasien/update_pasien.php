<?php
	include("../../connect/connect.php");
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$gol_darah = $_POST['gol_darah'];
	$usia = $_POST['usia'];
	$nama_wali = $_POST['nama_wali'];
	$date = $_POST['tanggal'];
	$password = $_POST['password'];
	$array=explode("-", $date);
	$tahun=$array[0];
	$today = date('d-m-Y');
	$tgl_masuk = strtotime($date);
	$tgl_today = strtotime($today);
	$no_hp = preg_replace("/[^(0-9)]/", "-", $no_hp);
	$gol_darah = preg_replace("/[^(A,B,AB,O)]/", "", $gol_darah);
	
	mysqli_begin_transaction($conn);

	if($tgl_masuk <= $tgl_today){
		$tgl = mysqli_query($conn, "SELECT tanggal FROM pasien WHERE id='$id'");
		$tgls = mysqli_fetch_array($tgl);
		$tgl = $tgls['tanggal'];
		
		$arrays=explode("-", $tgl);
		$tahunold=$arrays[0];

		if($tahunold != $tahun){		
			$sql = mysqli_query($conn, "SELECT username FROM user WHERE id='$user_id'");
			$sql1 = mysqli_fetch_array($sql);
			$sql2 = $sql1['username'];
			
			$unameid = substr($sql2,-3);
			//echo $unameid . '<hr>';
			$username = 'PS'.($tahun-2000).$unameid;
			//echo $username;
			//die;
			$result = mysqli_query($conn, "UPDATE user set username = '$username', password = '$password' WHERE id = '$user_id'");

			if($result){

				$query = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali' , tanggal = '$date' WHERE id = '$id'");

				if($query){
					mysqli_commit($conn);
					echo "<script>alert('Data berhasil disimpan!');
					window.location.href='../../read_profil_pasien.php?id=$id' </script>";
				} else {
					mysqli_rollback($conn);
					echo "<script>alert('Data gagal disimpan. Note: Error updating Pasien.');
					window.location.href='../../read_profil_pasien.php?id=$id' </script>";
				}
				die('test4');
			} else {
				mysqli_rollback($conn);
				echo "<script>alert('Data gagal disimpan. Note: Error updating User.');
				window.location.href='../../read_profil_pasien.php?id=$id' </script>";
				// die('test3');
			}
			// die('test2');
		} else {
			$query = mysqli_query($conn, "UPDATE pasien set nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', gol_darah = '$gol_darah', usia = '$usia', nama_wali = '$nama_wali' , tanggal = '$date' WHERE id = '$id'");
			if($query){
				mysqli_commit($conn);
				echo "<script>alert('Data berhasil disimpan!');
				window.location.href='../../read_profil_pasien.php?id=$id' </script>";
			} else {
				mysqli_rollback($conn);
				echo "<script>alert('Data gagal disimpan. Note: Error updating Pasien.');
				window.location.href='../../read_profil_pasien.php?id=$id' </script>";
			}
		}

		// die('test1'); MUNCUL

	} else {
		mysqli_rollback($conn);
		echo "<script>alert('Data gagal disimpan. Note: Error updating Time.');
			window.location.href='../../read_profil_pasien.php?id=$id' </script>";
		// die('test');
	}

	// function close() {      
 //        mysqli_close($this->conn);     
 //    }

	// die;
	mysqli_close($conn);

	// header("Location: ../../read_profil_pasien.php?id=$id");
?>