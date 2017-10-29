<?php
  include("../proses/check_login.php");
  include("../koneksi/connect.php");
?>

<div class="col-md-12 kibu">
  <h1 style="text-align: center; margin-bottom:50px;">Daftar Data Perkembangan</h1>
    <table style="margin-bottom:50px;">
      <tr>
        <th>TANGGAL</th>
        <th>NAMA DOKTER</th>
        <th>USIA KANDUNGAN</th>
        <th></th>
      </tr>
        <?php
          $userid = $_GET['id'];
          $query = "SELECT p.id, ps.user_id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id JOIN pasien ps ON p.pasien_id = ps.id WHERE ps.user_id = '$userid' AND p.status = 'Done'";
          $result = mysqli_query($conn, $query);
          while ($baris=mysqli_fetch_assoc($result)){
            echo("<tr>");
            echo("<td>$baris[jadwal_check]</td>");
            echo("<td>dr. $baris[nama]</td>");
            echo("<td>$baris[usia_knd] Minggu</td>");
            echo("<td><a href='lihat_detail_perkembangan.php?id=$baris[id]&user_id=$userid'><u style='color:blue;'><button type='button' class='btn btn-info btn-lg' data-toggle='modal'>Lihat Detail Perkembangan</button></a>");
            echo("</tr>");
          }
        ?>
    </table>
</div>