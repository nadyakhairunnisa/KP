<?php
  include("../proses/check_login.php");
  include("../koneksi/connect.php");
?>

<div class="col-md-12 kibu">
  <h1 style="text-align: center; margin-bottom:50px;">Jadwal Check-Up Selanjutnya</h1>
    <table style="margin-bottom:50px;">
      <tr>
        <th>TANGGAL</th>
        <th>NAMA DOKTER</th>
        <th>USIA KANDUNGAN</th>
      </tr>
        <?php
          $userid = $_GET['id'];
          $query = "SELECT p.id, p.jadwal_check, b.nama, p.usia_knd FROM perkembangan p JOIN bidan b ON p.bidan_id = b.id JOIN pasien ps ON p.pasien_id = ps.id WHERE ps.user_id = '$userid' AND p.status = 'Undone'";
          $result = mysqli_query($conn, $query);
          while ($baris=mysqli_fetch_assoc($result)){
            echo("<tr>");
            echo("<td>$baris[jadwal_check]</td>");
            echo("<td>dr. $baris[nama]</td>");
            echo("<td>$baris[usia_knd] Minggu</td>");
            echo("</tr>");
          }
        ?>
    </table>
</div>