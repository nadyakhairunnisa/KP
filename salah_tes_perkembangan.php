  <thead>
          <th>Nama Pasien</th>
          <th>Nama Dokter</th>
          <th>Jumlah Check Up</th>
        </thead>

        <tbody>
          <?php
         $query = "SELECT id, pasien_id,  bidan_id, jadwal_check usia_knd, berat_knd, tensi, detak_jantung, tinggi_badan, berat_badan, keterangan, gambar, status FROM perkembangan";
          $result = mysqli_query(mysqli_connect("localhost", "root", "", "preggie"), $query);
          $no = 1;
          while ($row = mysqli_fetch_array($result)) {
            $nama = $row['nama'];
            $username = $row['username'];
            $password = $row['password'];
            $no_hp = $row['no_hp'];
            $alamat = $row['alamat'];
            $tanggal = $row['tanggal'];

            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$nama</td>";
            echo "<td>$username</td>";
            echo "<td>$password</td>";
            echo "<td>$no_hp</td>";
            echo "<td>$alamat</td>";
            echo "<td>$tanggal</td>";
            echo "<td>
             <a href='kelola_perkembangan.php'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Kelola Data Perkembangan</button></a>
          </td>";
  
          $no++;
        }

        ?> 
      </tbody>