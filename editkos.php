<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['level'] !== 'pemilik') {
  // Jika belum login atau level bukan penyewa, redirect ke halaman login
  header("Location: loginfix/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FIND-KOST</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons --> 
  <!-- <link href="img/info.png" rel="icon"> -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
  .mySlides {display:none}
  .w3-left, .w3-right, .w3-badge {cursor:pointer}
  .w3-badge {height:13px;width:13px;padding:0}
  </style>
</head>

<body id="body">
  <!--==========================
    Header
  ============================-->
  <header id="header" style="height: 115px">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">FIND-<span>KOST</span></a></h1>
        <br>
        <h1 style="font-size: 16px ">
          <a href="daftarkosku.php">Beranda </a>    
          <i class="fa fa-angle-double-right"></i>
          <a href="detailkos_pemilik.php">Nama Kos </a>
          <i class="fa fa-angle-double-right"></i>
          <a style="color: #50d8af;" href="#">Edit Kos</a>
        </h1>
        <br>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="daftarkosku.php">Beranda</a></li>
           <li class="menu-has-children"><a href="#">Akun</a>
            <ul>
              <li><a href="loginfix/profilakun_pemilik.php">Profil</a></li>
              <!-- <li><a href="https://wa.me/qr/3IYJOWCXQKNYL1">Chat</a></li> -->
              <li><a href="keluar.php">Keluar</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

    <!-- Bagian yang disisipkan dari kode kedua -->
    <section id="" style="width:100%; height: 380px; background-color: #fff">
      <div class="w3-content w3-display-container" style="">
        <img class="mySlides" src="img/intro-carousel/selasar-atas-1024x768.jpg" style="width:100%; height: 300px">
        <img class="mySlides" src="img/intro-carousel/kost jimbaran bali-16.jpg" style="width:100%; height: 300px">
        <img class="mySlides" src="img/intro-carousel/bisnis-kos-kosan.jpg" style="width:100%; height: 300px">

        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
          <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
          <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
      </div>
      <script>
      var slideIndex = 1;
      showDivs(slideIndex);
      function plusDivs(n) {
        showDivs(slideIndex += n);
      }
      function currentDiv(n) {
        showDivs(slideIndex = n);
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
           dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " w3-white";
      }
      </script>
      <br>
      </script>
    </section>
    <!-- Akhir bagian yang disisipkan dari kode kedua -->
  <section id="team" class="wow fadeInUp">
  <form id="uploadForm" style="margin-left: 185px" method="POST" action="insert.php" enctype="multipart/form-data">
      <input type="file" id="gambarInput" name="gambar[]" accept="image/*" multiple>
  <div class="container">
    <div class="section-header" style="font-size: 25px; text-align: center;">
      <form method="POST" action="insert.php">
        <input type="text" name="kos_name" placeholder="Kos Muslimah" style="text-align: center; border-color: #000">
        <hr>
    </div>
    <div class="row" style="padding-right: 100px; padding-left: 100px">
      <div class="col-lg-9 content">
        <div class="padding-0 box-v4-alert">
          <p style="font-size: 16px"><b>Fasilitas : </b><br>
            <input type="checkbox" name="fasilitas[]" value="Laundri"> Laundri<br>
            <input type="checkbox" name="fasilitas[]" value="Listrik" checked=""> Listrik<br>
            <input type="checkbox" name="fasilitas[]" value="Keamanan 24 Jam" checked=""> Keamanan 24 Jam<br>
            <input type="checkbox" name="fasilitas[]" value="Kebersihan"> Kebersihan<br>
            <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"> Kamar Mandi Dalam<br>
            <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Luar" checked=""> Kamar Mandi Luar<br>
            <input type="checkbox" name="fasilitas[]" value="PDAM"> PDAM<br>
            <input type="checkbox" name="fasilitas[]" value="Penjaga Kos 24 Jam"> Penjaga Kos 24 Jam<br>
            <input type="checkbox" name="fasilitas[]" value="WiFi" checked=""> WiFi<br>
          </p>
          <p style="font-size: 16px"><b>Luas Kamar : </b> <input type="text" name="luas_kamar" placeholder="3x3 meter" style="text-align: center; border-color: #000"></p>
          <p style="font-size: 16px"><b>Keterangan Biaya Lain : </b> <input type="text" name="keterangan_biaya" placeholder="Sudah termasuk listrik" style="text-align: center; border-color: #000"> </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6" style="background-color: #b5ffd6; padding: 15px; height: 340px">
        <div class="member">
          <div class="details">
            <h4 style="font-size: 35px">Tersedia<br><input type="text" name="jumlah_kamar" placeholder="9" style="text-align: center; border-color: #000; width: 50px; font-size: 24px"><br>Kamar</h4>
            <hr>
            <span style="font-size: 15px"><b><input type="text" name="harga" placeholder="Rp 900.000" style="text-align: center; border-color: #000; width: 150px"> / bulan</b></span>
            <br>
            <span style="font-size: 15px"><input type="text" name="alamat" placeholder="Jl. Arif Rahman Hakim" style="text-align: center; border-color: #000;width: 100%"></span>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn-get-started scrollto" style="color: #ffffff; background-color: #2e4ca5; height: 40px; border-radius: 3px; text-align: center; margin-left: 850px; font-size: 16px; padding-top: 5px; width: 10%">
      <b>Submit</b>
    </button>
    </form>
    </form>
    <br>
  </div>
</section>
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>FIND-KOST</strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- #footer -->
</body>
</html>