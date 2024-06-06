
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
</head>

<body id="body">
  <!--==========================
    Header
  ============================-->
  <header id="header" >
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">FIND-<span>KOST</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Beranda</a></li>
          <li><a href="#portfolio">Daftar Kos</a></li>
          <li><a href="#testimonials">Feedback</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="loginfix/login.php" target="_blank">Masuk</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
  <div class="intro-content">
    <h2>Kamu butuh <span>kos?</span><br><span>Cari</span> sekarang juga!</h2>
    <div class="container">
        <form action="" method="GET" role="form" class="contactForm">
            <div class="form-row">
                <div class="form-group col-md-10" style="padding-left: 185px">
                    <input style="text-align: center; height: 50px; font-size: 20px" type="text" name="name"
                        class="form-control" id="name" placeholder="Masukkan wilayah yang Anda inginkan"
                        data-rule="minlen:1" data-msg="Please enter the address" list="wilayah" />
                    <datalist id="wilayah">
                        <option>Kos Permata Gomong</option>
                        <!-- <option>Kos Asri Langko</option> -->
                        <!-- <option>Kos Mawar Dasan Agung</option> -->
                        <option>Kos Melati Swakarsa</option>
                        <!-- <option>Kos Sentral Pagesangan</option> -->
                        <option>Kos Nusa Kekalik</option>
                        <option>Kos Putri Airlangga</option>
                    </datalist>
                </div>
            </div>

            <div>
                <a href="#" class="btn-get-started scrollto" onclick="cariKos()">Cari</a>
            </div>
        </form>
    </div>
</div>

<script>
    function cariKos() {
        var wilayah = document.getElementById('name').value;
        var detailKos = '';

        switch (wilayah) {
            case 'Kos Permata Gomong':
                detailKos = 'detailkosPermata.php';
                break;
            case 'Kos Melati Swakarsa':
                detailKos = 'detailkosMelati.php';
                break;
            case 'Kos Nusa Kekalik':
                detailKos = 'detailkosNusa.php';
                break;
            case 'Kos Putri Airlangga':
                detailKos = 'detailkosPutri.php';
                break;
            default:
                break;
        }

        if (detailKos !== '') {
            window.location.href = detailKos;
        }
    }
</script>
    <div id="intro-carousel" class="owl-carousel" style="opacity: 0.4">
      <div class="item" style="background-image: url('img/intro-carousel/selasar-atas-1024x768.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/kost jimbaran bali-16.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/66.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/bisnis-kos-kosan.jpg');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/11.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">
    <!--==========================
      Services Section
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 style="text-align: center;">Daftar Kos</h2>
        </div>
      </div>
      <br>

      <?php
require 'koneksi.php';
// Mengambil data ketersediaan dari tabel kos dengan id_kos = 1
$queryKetersediaan1 = "SELECT ketersediaan FROM kos WHERE id_kos = 1";
$resultKetersediaan1 = mysqli_query($conn, $queryKetersediaan1);
if ($resultKetersediaan1 && mysqli_num_rows($resultKetersediaan1) > 0) {
  $rowKetersediaan1 = mysqli_fetch_assoc($resultKetersediaan1);
  $ketersediaan1 = $rowKetersediaan1['ketersediaan'];
} else {
  $ketersediaan1 = 0;
}

// Mengambil data nama_kos dari tabel kos dengan id_kos = 1
$queryNamaKos1 = "SELECT nama_kos FROM kos WHERE id_kos = 1";
$resultNamaKos1 = mysqli_query($conn, $queryNamaKos1);
if ($resultNamaKos1 && mysqli_num_rows($resultNamaKos1) > 0) {
  $rowNamaKos1 = mysqli_fetch_assoc($resultNamaKos1);
  $nama_kos1 = $rowNamaKos1['nama_kos'];
} else {
  $nama_kos1 = "";
}

// Mengambil data ketersediaan dari tabel kos dengan id_kos = 2
$queryKetersediaan2 = "SELECT ketersediaan FROM kos WHERE id_kos = 2";
$resultKetersediaan2 = mysqli_query($conn, $queryKetersediaan2);
if ($resultKetersediaan2 && mysqli_num_rows($resultKetersediaan2) > 0) {
  $rowKetersediaan2 = mysqli_fetch_assoc($resultKetersediaan2);
  $ketersediaan2 = $rowKetersediaan2['ketersediaan'];
} else {
  $ketersediaan2 = 0;
}

// Mengambil data nama_kos dari tabel kos dengan id_kos = 2
$queryNamaKos2 = "SELECT nama_kos FROM kos WHERE id_kos = 2";
$resultNamaKos2 = mysqli_query($conn, $queryNamaKos2);
if ($resultNamaKos2 && mysqli_num_rows($resultNamaKos2) > 0) {
  $rowNamaKos2 = mysqli_fetch_assoc($resultNamaKos2);
  $nama_kos2 = $rowNamaKos2['nama_kos'];
} else {
  $nama_kos2 = "";
}

// Mengambil data ketersediaan dari tabel kos dengan id_kos = 3
$queryKetersediaan3 = "SELECT ketersediaan FROM kos WHERE id_kos = 3";
$resultKetersediaan3 = mysqli_query($conn, $queryKetersediaan3);
if ($resultKetersediaan3 && mysqli_num_rows($resultKetersediaan3) > 0) {
  $rowKetersediaan3 = mysqli_fetch_assoc($resultKetersediaan3);
  $ketersediaan3 = $rowKetersediaan3['ketersediaan'];
} else {
  $ketersediaan3 = 0;
}

// Mengambil data nama_kos dari tabel kos dengan id_kos = 3
$queryNamaKos3 = "SELECT nama_kos FROM kos WHERE id_kos = 3";
$resultNamaKos3 = mysqli_query($conn, $queryNamaKos3);
if ($resultNamaKos3 && mysqli_num_rows($resultNamaKos3) > 0) {
  $rowNamaKos3 = mysqli_fetch_assoc($resultNamaKos3);
  $nama_kos3 = $rowNamaKos3['nama_kos'];
} else {
  $nama_kos3 = "";
}

// Mengambil data ketersediaan dari tabel kos dengan id_kos = 4
$queryKetersediaan4 = "SELECT ketersediaan FROM kos WHERE id_kos = 4";
$resultKetersediaan4 = mysqli_query($conn, $queryKetersediaan4);
if ($resultKetersediaan4 && mysqli_num_rows($resultKetersediaan4) > 0) {
  $rowKetersediaan4 = mysqli_fetch_assoc($resultKetersediaan4);
  $ketersediaan4 = $rowKetersediaan4['ketersediaan'];
} else {
  $ketersediaan4 = 0;
}

// Mengambil data nama_kos dari tabel kos dengan id_kos = 4
$queryNamaKos4 = "SELECT nama_kos FROM kos WHERE id_kos = 4";
$resultNamaKos4 = mysqli_query($conn, $queryNamaKos4);
if ($resultNamaKos4 && mysqli_num_rows($resultNamaKos4) > 0) {
  $rowNamaKos4 = mysqli_fetch_assoc($resultNamaKos4);
  $nama_kos4 = $rowNamaKos4['nama_kos'];
} else {
  $nama_kos4 = "";
}
?>

<div class="container-fluid">
  <div class="row no-gutters">
    <div class="col-lg-3 col-md-3" style="padding: 10px">
      <div class="portfolio-item wow fadeInUp">
        <a href="detailkosNusa.php" class="">
        <?php
          // Mengambil data gambar dari tabel gambar dengan id_kos = 1
          $queryGambar1 = "SELECT nama_file FROM gambar WHERE id_kos = 1";
          $resultGambar1 = mysqli_query($conn, $queryGambar1);
          if ($resultGambar1 && mysqli_num_rows($resultGambar1) > 0) {
            $rowGambar1 = mysqli_fetch_assoc($resultGambar1);
            $namaFile1 = $rowGambar1['nama_file'];
          } else {
            $namaFile1 = "default.jpg"; // Gambar default jika tidak ditemukan
          }
          ?>
          <img src="img/intro-carousel/<?php echo $namaFile1; ?>" alt="">
          <div class="portfolio-overlay">
            <div class="portfolio-info">
              <h2 class="wow fadeInUp">Sisa <?php echo $ketersediaan1; ?> Kamar</h2>
            </div>
            <div class="" style="background-color: #f9f9f9; height: 55px; margin-top: 180px; opacity: 0.8;">
              <h2><span style="margin-top: 190px; text-align: center; font-size: 20px; color: #000000"><?php echo $nama_kos1; ?></span></h2>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-3" style="padding: 10px">
      <div class="portfolio-item wow fadeInUp">
        <a href="detailkosPermata.php" class="">
        <?php
          // Mengambil data gambar dari tabel gambar dengan id_kos = 2
          $queryGambar2 = "SELECT nama_file FROM gambar WHERE id_kos = 2";
          $resultGambar2 = mysqli_query($conn, $queryGambar2);
          if ($resultGambar2 && mysqli_num_rows($resultGambar2) > 0) {
            $rowGambar2 = mysqli_fetch_assoc($resultGambar2);
            $namaFile2 = $rowGambar2['nama_file'];
          } else {
            $namaFile2 = "default.jpg"; // Gambar default jika tidak ditemukan
          }
          ?>
          <img src="img/intro-carousel/<?php echo $namaFile2; ?>" alt="">
          <div class="portfolio-overlay">
            <div class="portfolio-info">
              <h2 class="wow fadeInUp">Sisa <?php echo $ketersediaan2; ?> Kamar</h2>
            </div>
            <div class="" style="background-color: #f9f9f9; height: 55px; margin-top: 180px; opacity: 0.8;">
              <h2><span style="margin-top: 190px; text-align: center; font-size: 20px; color: #000000"><?php echo $nama_kos2; ?></span></h2>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-md-3" style="padding: 10px">
      <div class="portfolio-item wow fadeInUp">
        <a href="detailkosMelati.php" class="">
        <?php
          // Mengambil data gambar dari tabel gambar dengan id_kos = 3
          $queryGambar3 = "SELECT nama_file FROM gambar WHERE id_kos = 3";
          $resultGambar3 = mysqli_query($conn, $queryGambar3);
          if ($resultGambar3 && mysqli_num_rows($resultGambar3) > 0) {
            $rowGambar3 = mysqli_fetch_assoc($resultGambar3);
            $namaFile3 = $rowGambar3['nama_file'];
          } else {
            $namaFile3 = "default.jpg"; // Gambar default jika tidak ditemukan
          }
          ?>
          <img src="img/intro-carousel/<?php echo $namaFile3; ?>" alt="">
          <div class="portfolio-overlay">
            <div class="portfolio-info">
              <h2 class="wow fadeInUp">Sisa <?php echo $ketersediaan3; ?> Kamar</h2>
            </div>
            <div class="" style="background-color: #f9f9f9; height: 55px; margin-top: 180px; opacity: 0.8;">
              <h2><span style="margin-top: 190px; text-align: center; font-size: 20px; color: #000000"><?php echo $nama_kos3; ?></span></h2>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-md-3" style="padding: 10px">
      <div class="portfolio-item wow fadeInUp">
        <a href="detailkosPutri.php" class="">
          <?php
          // Mengambil data gambar dari tabel gambar dengan id_kos = 4
          $queryGambar4 = "SELECT nama_file FROM gambar WHERE id_kos = 4";
          $resultGambar4 = mysqli_query($conn, $queryGambar4);
          if ($resultGambar4 && mysqli_num_rows($resultGambar4) > 0) {
            $rowGambar4 = mysqli_fetch_assoc($resultGambar4);
            $namaFile4 = $rowGambar4['nama_file'];
          } else {
            $namaFile4 = "default.jpg"; // Gambar default jika tidak ditemukan
          }
          ?>
          <img src="img/intro-carousel/<?php echo $namaFile4; ?>" alt="">
          <div class="portfolio-overlay">
            <div class="portfolio-info">
              <h2 class="wow fadeInUp">Sisa <?php echo $ketersediaan4; ?> Kamar</h2>
            </div>
            <div class="" style="background-color: #f9f9f9; height: 55px; margin-top: 180px; opacity: 0.8;">
              <h2><span style="margin-top: 190px; text-align: center; font-size: 20px; color: #000000"><?php echo $nama_kos4; ?></span></h2>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
</section>
    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2 style="text-align: center;">Feedback</h2>
    </div>
    <div class="owl-carousel testimonials-carousel">
      <?php
      // Mengimpor file koneksi.php
      require_once 'koneksi.php';

      // Membuat koneksi ke database
      $connection = mysqli_connect($servername, $username, $password, $database);

      // Memeriksa apakah koneksi berhasil
      if (!$connection) {
        die("Koneksi database gagal: " . mysqli_connect_error());
      }

      // Mengambil semua feedback yang sudah terkirim
      $query = "SELECT * FROM feedback";
      $result = mysqli_query($connection, $query);

      // Memeriksa apakah query berhasil dijalankan
      if ($result && mysqli_num_rows($result) > 0) {
        // Menampilkan feedback yang sudah terkirim
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="testimonial-item">';
          echo '<p>';
          echo '<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">';
          echo $row['text'];
          echo '<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">';
          echo '</p>';
          // Menampilkan nama pengguna yang memberikan feedback
          $id = $row['id'];
          $query_pengguna = "SELECT nama_pengguna FROM login WHERE id = '$id'";
          $result_pengguna = mysqli_query($connection, $query_pengguna);
          $row_pengguna = mysqli_fetch_assoc($result_pengguna);
          $nama_pengguna = $row_pengguna['nama_pengguna'];
          echo '<span style="font-weight: bold;"> ' . $nama_pengguna . '</span>';
          echo '</div>';
        }
      } else {
        echo "Belum ada feedback yang terkirim.";
        // echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">Belum ada feedback yang terkirim.</div>';
      }
      // Menutup koneksi ke database
      mysqli_close($connection);
      ?>
    </div>
  </div>
</section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/about-imgg.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Tentang Kami</h2>
            <h3>Kami adalah tim yang berdedikasi dalam pengembangan sistem informasi pencarian kos yang bertujuan untuk membantu pencari kos dalam mencari tempat tinggal yang sesuai dengan kebutuhan mereka.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> FIND-KOS menawarkan desain modern, fasilitas lengkap, lokasi strategis, dan komunitas yang hangat dan akrab.</li>
              <li><i class="ion-android-checkmark-circle"></i> Dapatkan pengalaman tinggal yang nyaman dengan desain modern, fasilitas lengkap, lokasi strategis, dan komunitas yang hangat dan akrab di FIND-KOS.</li>
              <li><i class="ion-android-checkmark-circle"></i> Temukan kenyamanan tinggal dengan desain modern, fasilitas lengkap, lokasi strategis, dan komunitas yang hangat di FIND-KOS.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 style="text-align: center;">Hubungi Kami</h2>
          <p style="text-align: center;">Jika Anda menghadapi kesulitan atau memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui contact di bawah ini. Tim kami akan dengan senang hati membantu Anda menyelesaikan masalah, memberikan panduan, atau memberikan informasi lebih lanjut.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Majapahit No.62, Gomong, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83115</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor Handphone</h3>
              <p><a href="tel:+155895548855">+6281234567890</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">findkos@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>
      </div>
    </section><!-- #contact -->

  </main>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>FIND-KOST</strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>