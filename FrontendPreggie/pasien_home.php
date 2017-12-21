<?php
include("process/check_login.php");
include("connect/connect.php");
$id=$_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM pasien WHERE id =$id LIMIT 1");
$pasien = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn, "SELECT * FROM perkembangan WHERE pasien_id =$id ");
$row = mysqli_num_rows($sql2);
// $p = mysqli_fetch_array($sql2);
$today = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>PREGGIE</title>
 <link rel="icon" type="image/png" href="images/logo.png">      

 <!-- Bootstrap -->    
 <link rel="stylesheet" href="css/bootstrap.css">    
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <!-- StyleSheet -->
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/animate.css">
 <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
 <!-- <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.7.0/fullcalendar.print.css'> -->
 <!--   Script --> 
</head>

<body>

  <!-- Navbar Section -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>></a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a <?php echo ("href='pasien_home.php?id=$pasien[id]'"); ?>>Home</a></li>          
        <li><a <?php echo ("href='pasien_profil.php?id=$pasien[id]'"); ?>>Profil</a></li>
        <li><a href="process/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navbar end -->


  <!-- Carousel Slider -->       
  <div id="first-slider">
   <div id="carousel-top" class="carousel slide carousel-fade ">
     <!-- Indicators -->
     <ol class="carousel-indicators">
       <li data-target="#carousel-top" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-top" data-slide-to="1"></li>
       <li data-target="#carousel-top" data-slide-to="2"></li>
       <li data-target="#carousel-top" data-slide-to="3"></li>
     </ol>
     <!-- Wrapper for slides -->
     <div class="carousel-inner" role="listbox">
       <!-- Item 1 -->
       <div class="item active slide1 parallax ">
        <div class="row">
          <div class="container">
           <div class="col-md-12 text-center">
             <p  data-animation="animated fadeInDown">Kehamilan adalah awal dari masa depan anak-anak anda yang cerah <br> karenanya persiapkanlah dengan sebaik mungkin</p>
             <h3  data-animation="animated fadeInLeft">Diari <span class="blue">Ibu Hamil</span></h3>
             <a href="#kalender" class="btn btn-info" data-animation="animated fadeInUp" role="button">Kalenderku</a>
           </div>
         </div>
       </div>
     </div>
     <!-- Item 2 -->
     <div class="item slide2 parallax">
       <div class="row"><div class="container">
         <div class="col-md-12 text-center">
           <p  data-animation="animated fadeInUp">Seorang bayi dapat membuat cinta menjadi lebih kuat, siang menjadi pendek, malam menjadi panjang, masa lalu terlupakan dan masa depan pantas untuk dihidupkan</p>
           <h3 data-animation="animated fadeInDown">Kehidupan <span class="blue">Baru</span></h3>
           <a href="#kalender" class="btn btn-info" data-animation="animated fadeInUp" role="button">Kalenderku</a>
         </div>
       </div>
     </div>
   </div>
   <!-- Item 3 -->
   <div class="item slide3 parallax">
    <div class="row">
      <div class="container">
       <div class="col-md-12 text-center">
         <h3  data-animation="animated fadeInLeft"><span class="blue">Ibu Bahagia </span> Bayi Sehat</h3>
         <p  data-animation="animated fadeInUp">Ketika seoarang anak baru lahir, ibunya juga baru lahir. Karena seorang ibu belum ada sebelumnya </p>
         <a href="#kalender" class="btn btn-info" data-animation="animated fadeInUp" role="button">Kalenderku</a>
       </div>
     </div></div>
   </div>
   <!-- Item 4 -->
   <div class="item slide4 parallax">
    <div class="row">
      <div class="container">
       <div class="col-md-12 text-center">
         <p  data-animation="animated fadeInUp">Kelahiran adalah permulaan spiritual yang paling mendalam yang dapat dimiliki seorang wanita</p>
         <h3 data-animation="animated fadeInDown">Membuat <span class="blue">Keajaiban</span></h3>
         <a href="#kalender" class="btn btn-info" data-animation="animated fadeInUp" role="button">Kalenderku</a>
       </div>
     </div>
   </div>
 </div>

</div>
</div>
</div> <!-- Slider end -->


<!-- Calendar -->
<div class="col-md-12 container" id="kalender">

 <div class="col-md-7 col-xs-12 calendar">
  <h3 style="color: #ff6666">Klik Tanggal untuk Melihat Pemberitahuan</h3><br>
      <!-- <div class="calendar_item">
        <div class="month">
          November 2017
        </div>
        <div class="day">
          <p>Senin</p>
          <p>Selasa</p>
          <p>Rabu</p>
          <p>Kamis</p>
          <p>Jumat</p>
          <p>Sabtu</p>
          <p>Minggu</p>
        </div>
        <div class="date">
         <p></p>
          <p>1</p><p>2</p><p>3</p><p>4</p><p>5</p><p>6</p><p>7</p>
          <p>8</p><p class="active_1" data-toggle="collapse" data-target="#data_1">9</p><p>10</p><p>11</p><p>12</p><p>13</p><p class="active_2" data-toggle="collapse" data-target="#data_2">14</p>
          <p>15</p><p>16</p><p>17</p><p class="active_3" data-toggle="collapse" data-target="#data_3">18</p><p>19</p><p>20</p><p>21</p>
          <p>22</p><p>23</p><p>24</p><p>25</p><p>26</p><p>27</p><p>28</p>
          <p>29</p><p>30</p><p>31</p>
        </div>
      </div> -->

      <div id='calendar'></div>

    </div>

    <div class="col-md-4 event_detail">
      <!-- <div class="header">
        Pemberitahuan
      </div> -->
      <div class="collapse" id="data_1">
        <!-- <div class="card">
          <p><i class="fa fa-clock-o" aria-hidden="true"></i>Trimester Pertama : 3 Minggu</p>
          <p><i class="fa fa-calendar" aria-hidden="true"></i>9 November 2017</p>      
          <br>
          <p><i class="fa fa-user" aria-hidden="true"></i>dr. Jecky Fernando</p>
          <p><i class="fa fa-check-square-o" aria-hidden="true"></i>Anda telah Check-Up 3kali</p>      
        </div>
        <div class="card-footer">        
          <a class="btn btn-sm" href="pasien_perkembangan.html" style="width:45%">Lihat Perkembangan</a>
        </div>   -->
      </div>
      <div class="collapse" id="data_2">
        <!-- <div class="card">
          <p><i class="fa fa-clock-o" aria-hidden="true"></i>Trimester Pertama : 4 Minggu</p>
          <p><i class="fa fa-calendar" aria-hidden="true"></i>14 November 2017</p>      
          <br>
          <p><i class="fa fa-user" aria-hidden="true"></i>dr. Agus Sp.OG</p>
          <p><i class="fa fa-check-square-o" aria-hidden="true"></i>Anda telah check up 3 kali</p>      
        </div>
        <div class="card-footer">        
          <a class="btn btn-sm" href="pasien_perkembangan.html" style="width:45%">Lihat Perkembangan</a>
        </div>  -->   
      </div>
      <div class="collapse" id="data_3">
        <!-- <div class="card">
          <p><i class="fa fa-clock-o" aria-hidden="true"></i>Trimester Pertama : 5 Minggu</p>
          <p><i class="fa fa-calendar" aria-hidden="true"></i>18 November 2017</p>      
          <br>
          <p><i class="fa fa-user" aria-hidden="true"></i>dr. Nurul Fatikah Sp.OG</p>
          <p><i class="fa fa-check-square-o" aria-hidden="true"></i>Anda telah Check Up 3 kali</p>      
        </div>
        <div class="card-footer">        
          <a class="btn btn-sm" href="pasien_perkembangan.html" style="width:45%">Lihat Perkembangan</a>
        </div>  -->   
      </div>
    </div>


    <div class="col-md-5">
      <div class="kotak" style="margin-top: 20px;">
        <br><br><div class="col-md-1 ket_1"></div>
        <div class="col-md-3">Hari Ini</div>
<!--         <div class="col-md-1 ket_3"></div>
        <div class="col-md-3">Check Up</div> -->
        <div class="col-md-1 ket_2"></div>
        <div class="col-md-3">Check Up</div><br>      
      </div>
    </div>

        <div id="konten-ajax">
        </div>

  </div><!-- Calendar end -->

  <script type="text/javascript" src="js/js.js"></script>
  <script type="text/javascript" src="js/jquery-1.12.2.js"></script>
  <script type="text/javascript" src="js/jquery2.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
          header: {
        // left: 'prev,next today',
        center: 'prev,next',
        right: 'month,basicWeek,basicDay'
      },
            // defaultDate: '2014-09-12',
            // navLinks: true,
            // editable: true,
            // eventLimit: true, // allow "more" link when too many events

          defaultDate: '<?php echo $today; ?>',
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          eventLimit: true, // allow "more" link when too many events
          events: [
          <?php
          $no = 1;
          while($p = mysqli_fetch_array($sql2)){
            $p_id = $p['id'];
            $usia = $p['usia_knd'];
            $tanggal = $p['jadwal_check'];
            echo "{";
            // echo "id: 'data-".$no."',";
            echo "title: 'Minggu ke-$usia',";
            echo "start: '$tanggal',";
            echo "url: 'pasien_konten_home.php?id=$id&p_id=$p_id',";
            echo "overlap: false";
            echo "},";
            $no++;
          }
          ?>
          // {
          //   title: 'All Day Event',
          //   start: '2017-11-01'
          // }
          ],
          eventClick: function(event) {
            // $(document).ready(function(){
            //   $("#konten-ajax").load(<?php $userid = $_GET['id']; echo("href='konten/latest_perkembangan.php?id=$userid'"); ?>);
            // });
            // $(function(){
              // $("#menu a").click(function(){
                url = $(this).attr("href");
                $("#konten-ajax").load(event.url);
                return false;
              // });
              $(document).ajaxStart(function(){
                $("#konten-ajax").css({'display':'none'});
              });
              $(document).ajaxComplete(function(){
                $("#konten-ajax").slideDown('slow');
              });
            // });
            // if (event.url) {
                // $(function(){
                  // $(event.url).click(function(){
                  //   url = $(event.url).attr("href");
                  //   $("#konten-ajax").load(url);
                  //   return false;
                  // });
                  // $(document).ajaxStart(function(){
                  //   $("#konten-ajax").css({'display':'none'});
                  // });
                  // $(document).ajaxComplete(function(){
                  //   $("#konten-ajax").slideDown('slow');
                  // });
                // });

                // window.open(event.url);
                // return false;
            // }
          }
        });
    });
  </script>


<div class="col-md-12 " style="padding:0;">
  <footer class="navbar navbar-default text-center" style="padding-top: 20px; color: #737373; margin: 30px 0px 0px">
    Copyright &copy Teknik Informatika UII 2017. All right reserved
  </footer>
</div>

</body>
</html>
