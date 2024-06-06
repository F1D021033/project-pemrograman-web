<?php
// Mengatur waktu kedaluwarsa cookie sesi ke 1 jam
$expire = 3600; // 1 jam
session_set_cookie_params($expire);
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['level'] !== 'penyewa') {
  // Jika belum login atau level bukan penyewa, redirect ke halaman login
  header("Location: loginfix/login.php");
  exit();
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Akun | FIND-KOST</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #f2f2f2">
  <div class="container" style="width: 650px; height: 50%; margin-top: 50px; font-family: Raleway; border-color: #50d8af; border-width: 2px; background-color: #fff; border-radius: 15px">
    <div class="col-md-12">
      <br>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- homeyLink -->
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-0173509626327009" data-ad-slot="9233259299" data-ad-format="link"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <br>

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
             <!-- Tombol Kembali -->
            <a href="../penyewa.php" class="btn btn-primary">
              <span class="glyphicon glyphicon-arrow-left"></span>
            </a>
            <h2>Profil penyewa</h2>

            <form id="reg_form" method="post" class="form-horizontal">
              <fieldset>
                <?php
                require_once 'koneksi.php';

                // Tangkap data yang dikirim dari form profil
                $nama_pengguna = $_SESSION['username'];
                $level = 'penyewa'; // Level yang ingin diperbarui

                // Query untuk mendapatkan data dari tabel login berdasarkan nama pengguna
                $query = "SELECT * FROM login WHERE nama_pengguna = '$nama_pengguna' AND level = '$level'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $id = $row['id'];
                  $nama_lengkap = $row['nama_lengkap'];
                  $alamat = $row['alamat'];
                  $no_telp = $row['no_telp'];
                  $email = $row['email'];
                  $nama_pengguna = $row['nama_pengguna'];
                  $kata_sandi = $row['kata_sandi'];
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $nama_lengkap = $_POST['nama_lengkap'];
                  $alamat = $_POST['alamat'];
                  $no_telp = $_POST['no_telp'];
                  $email = $_POST['email'];
                  $nama_pengguna = $_POST['nama_pengguna'];
                  $kata_sandi = $_POST['kata_sandi'];

                  // Query untuk memperbarui data pada tabel login
                  $query = "UPDATE login SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', no_telp = '$no_telp', email = '$email', nama_pengguna = '$nama_pengguna', kata_sandi = '$kata_sandi' WHERE id = $id AND level = '$level'";

                  // Jalankan query
                  $result = mysqli_query($conn, $query);

                  if ($result) {
                    // Jika query berhasil dijalankan, berikan pesan sukses atau tindakan yang sesuai
                    echo "";
                  } else {
                    // Jika query gagal dijalankan, berikan pesan error atau tindakan yang sesuai
                    echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
                  }
                }
                ?>

                <div class="form-group has-feedback">
                  <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" type="text" value="<?php echo $nama_lengkap; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                  <label for="alamat" class="col-md-4 control-label">Alamat</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                      <input id="alamat" name="alamat" placeholder="Alamat" class="form-control" type="text" value="<?php echo $alamat; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                  <label for="no_telp" class="col-md-4 control-label">Nomor Telepon</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                      <input id="no_telp" name="no_telp" placeholder="Nomor Telepon" class="form-control" type="text" value="<?php echo $no_telp; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                  <label for="email" class="col-md-4 control-label">Email</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input id="email" name="email" placeholder="Email" class="form-control" type="text" value="<?php echo $email; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                  <label for="nama_pengguna" class="col-md-4 control-label">Nama Pengguna</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control" type="text" value="<?php echo $nama_pengguna; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                  <label for="kata_sandi" class="col-md-4 control-label">Kata Sandi</label>
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      <input id="kata_sandi" name="kata_sandi" placeholder="Kata Sandi" class="form-control" type="password" value="<?php echo $kata_sandi; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <br>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- homeyLink -->
      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-0173509626327009" data-ad-slot="9233259299" data-ad-format="link"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <br>

    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>