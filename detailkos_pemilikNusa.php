<?php
// Mengatur waktu kedaluwarsa cookie sesi ke 1 jam
$expire = 3600; // 1 jam
session_set_cookie_params($expire);
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
    <meta charset="utf-8" />
    <title>FIND-KOST</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicons -->
    <!-- <link href="img/info.png" rel="icon"> -->
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet" />
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <style>
      .mySlides {
        display: none;
      }

      .w3-left,
      .w3-right,
      .w3-badge {
        cursor: pointer;
      }

      .w3-badge {
        height: 13px;
        width: 13px;
        padding: 0;
      }
    </style>
  </head>

  <body id="body">
    <!--==========================
    Header
  ============================-->
    <header id="header" style="height: 115px">
      <div class="container">
        <div id="logo" class="pull-left">
          <h1>
            <a href="#body" class="scrollto">FIND-<span>KOST</span></a>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
          <br />
          <h1 style="font-size: 16px">
            <a href="daftarkosku.php">Beranda </a>
            <i class="fa fa-angle-double-right"></i>
            <a style="color: #50d8af" href="#">Nama Kos</a>
          </h1>
          <br />
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="daftarkosku.php">Beranda</a></li>
            <li class="menu-has-children">
              <a href="#">Akun</a>
              <ul>
                <li><a href="loginfix/profilakun_pemilik.php">Profil</a></li>
                <li>
                  <a href="https://wa.me/qr/3IYJOWCXQKNYL1" target="_blank"
                    >Chat</a
                  >
                </li>
                <li><a href="keluar.php">Keluar</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- #nav-menu-container -->
      </div>
    </header>
    <!-- #header -->

    <!--==========================
    Intro Section
  ============================-->
  <?php
$servername = "localhost";
$database = "_findkos";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Koneksi Gagal: " . mysqli_connect_error());
}

?>

<section id="" style="width:100%; height: 380px; background-color: #fff">
  <div class="w3-content w3-display-container">
    <?php
      // Mengambil data gambar dari database
      $queryGambar = "SELECT nama_file FROM gambar WHERE id_gambar = 1";
      $resultGambar = mysqli_query($conn, $queryGambar);
      if ($resultGambar && mysqli_num_rows($resultGambar) > 0) {
        while ($rowGambar = mysqli_fetch_assoc($resultGambar)) {
          $namaFile = $rowGambar['nama_file'];
          echo '<img class="mySlides" src="img/intro-carousel/' . $namaFile . '" style="width:100%; height: 300px">';
        }
      }
    ?>
    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
      <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
      <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
    </div>
  </div>
</section>
</section>
      <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs((slideIndex += n));
        }

        function currentDiv(n) {
          showDivs((slideIndex = n));
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          if (n > x.length) {
            slideIndex = 1;
          }
          if (n < 1) {
            slideIndex = x.length;
          }
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
          }
          x[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " w3-white";
        }
      </script>
    </section>

<section id="team" class="wow fadeInUp">
  <div class="container">
  <div class="section-header" style="font-size: 25px; text-align: center">
    <h2>
      <?php
      require 'koneksi.php';

      // Mengambil data kos dari database berdasarkan id_kos
      $id_kos = 1; // ID kos yang akan ditampilkan
      $queryKos = "SELECT * FROM kos WHERE id_kos = $id_kos";
      $resultKos = mysqli_query($conn, $queryKos);

      if ($resultKos && mysqli_num_rows($resultKos) > 0) {
        $rowKos = mysqli_fetch_assoc($resultKos);
        $namaKos = $rowKos['nama_kos'];

        // Menampilkan nama kos Nusa Kekalik
        echo $namaKos;
      }
      mysqli_close($conn);
      ?>
      <a href="editkosNusa.php" class="btn-get-started scrollto">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </a>
    </h2>
    <hr />
  </div>
  <div class="row" style="padding-right: 120px; padding-left: 120px">
    <div class="col-lg-9 content">
      <div class="padding-0 box-v4-alert">
        <?php
        require 'koneksi.php';

        // Mengambil data kos dari database berdasarkan id_kos
        $id_kos = 1; // ID kos yang akan ditampilkan
        $queryKos = "SELECT * FROM kos WHERE id_kos = $id_kos";
        $resultKos = mysqli_query($conn, $queryKos);

        if ($resultKos && mysqli_num_rows($resultKos) > 0) {
          $rowKos = mysqli_fetch_assoc($resultKos);
          $luas_kamar = $rowKos['luas'];
          $keterangan_biaya = $rowKos['keterangan'];

          // Mengambil data fasilitas dari database berdasarkan id_fasilitas
          $id_fasilitas = 1; // ID fasilitas yang akan ditampilkan
          $queryFasilitas = "SELECT * FROM fasilitas WHERE id_fasilitas = $id_fasilitas";
          $resultFasilitas = mysqli_query($conn, $queryFasilitas);

          if ($resultFasilitas && mysqli_num_rows($resultFasilitas) > 0) {
            $rowFasilitas = mysqli_fetch_assoc($resultFasilitas);
            $fasilitas = json_decode($rowFasilitas['fasilitas'], true);

            // Menampilkan fasilitas
            echo '<p style="font-size: 16px">';
            echo '<b>Fasilitas : </b><br />';
            foreach ($fasilitas as $fasilitas_item) {
              echo $fasilitas_item . '<br />';
            }
            echo '</p>';
          }
        ?>
        <p style="font-size: 16px"><b>Luas Kamar : </b><?php echo $luas_kamar; ?></p>
        <p style="font-size: 16px">
          <b>Keterangan Biaya Lain : </b><?php echo $keterangan_biaya; ?>
        </p>
        <?php
        } else {
          echo '<p>Kos tidak ditemukan.</p>';
        }
        mysqli_close($conn);
        ?>
      </div>
    </div>
    <div class="col-lg-3 col-md-6" style="background-color: #b5ffd6; padding: 15px; height: 330px">
      <div class="member">
        <div class="details">
          <?php
          require 'koneksi.php';

          // Mengambil data kos dari database berdasarkan id_kos
          $id_kos = 1; // ID kos yang akan ditampilkan
          $queryKos = "SELECT * FROM kos WHERE id_kos = $id_kos";
          $resultKos = mysqli_query($conn, $queryKos);

          if ($resultKos && mysqli_num_rows($resultKos) > 0) {
            $rowKos = mysqli_fetch_assoc($resultKos);
            $ketersediaan = $rowKos['ketersediaan'];
            $harga = $rowKos['harga'];
            $alamat = $rowKos['alamat'];
          ?>
            <h4 style="font-size: 35px"><?php echo $ketersediaan; ?> Kamar Tersedia</h4>
            <hr />
            <span style="font-size: 15px"><b>Rp <?php echo $harga; ?> / bulan</b></span>
            <span><?php echo $alamat; ?></span>
          <?php
          }
          mysqli_close($conn);
          ?>
        </div>
      </div>
      <a
          href="https://wa.me/qr/3IYJOWCXQKNYL1"
          target="_blank"
          class="btn-get-started scrollto"
          style="color: #ffffff"
        >
          <div
            class=""
            style="
              background-color: #2e4ca5;
              height: 35px;
              border-radius: 3px;
              text-align: center;
              font-size: 16px;
              padding-top: 5px;
              margin-top: 10px;
            "
          >
            Chat
          </div>
        </a>
    </div>
  </div>
</div>
</section>


    <br />

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>FIND-KOST</strong>. All Rights Reserved
        </div>
        <div class="credits"></div>
      </div>
    </footer>
    <!-- #footer -->

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

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
  </body>
</html>
