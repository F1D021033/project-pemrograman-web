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
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil nilai dari form
  $nama_kos = isset($_POST['kos_name']) ? $_POST['kos_name'] : "";
  $luas = isset($_POST['luas_kamar']) ? $_POST['luas_kamar'] : "";
  $keterangan = isset($_POST['keterangan_biaya']) ? $_POST['keterangan_biaya'] : "";
  $ketersediaan = isset($_POST['jumlah_kamar']) ? $_POST['jumlah_kamar'] : "";
  $harga = isset($_POST['harga']) ? $_POST['harga'] : "";
  $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";

  if (!empty($nama_kos) && !empty($luas) && !empty($keterangan) && !empty($ketersediaan) && !empty($harga) && !empty($alamat)) {
    // Menyimpan data ke dalam tabel kos
    $queryKos = "INSERT INTO kos (nama_kos, luas, keterangan, ketersediaan, harga, alamat) 
                 VALUES ('$nama_kos', '$luas', '$keterangan', '$ketersediaan', '$harga', '$alamat')";
    $resultKos = mysqli_query($conn, $queryKos);

    if ($resultKos) {
      // Ambil ID kos yang baru saja di-generate
      $id_kos = mysqli_insert_id($conn);

      // Simpan fasilitas ke dalam tabel fasilitas
      if (isset($_POST['fasilitas']) && is_array($_POST['fasilitas'])) {
        // Mengambil nilai dari $_POST['fasilitas'] yang merupakan array fasilitas
        $fasilitasArray = $_POST['fasilitas']; 
        $fasilitasJSON = json_encode($fasilitasArray); // Mengonversi array fasilitas menjadi JSON string
        
        // Query untuk menyimpan data fasilitas dalam tabel fasilitas
        $queryFasilitas = "INSERT INTO fasilitas (id_kos, fasilitas) VALUES ('$id_kos', '$fasilitasJSON')";
        $resultFasilitas = mysqli_query($conn, $queryFasilitas); // Menjalankan query
        
        if (!$resultFasilitas) {
          // Jika penyimpanan fasilitas gagal, tampilkan pesan error dan kembali ke halaman sebelumnya
          echo "Terjadi kesalahan dalam menyimpan fasilitas: " . mysqli_error($conn);
          exit();
        }
      }

      // Simpan informasi gambar ke dalam array gambarData
      $gambarData = array();
      
      if (isset($_FILES['gambar']) && is_array($_FILES['gambar'])) {
        $gambarArray = $_FILES['gambar'];

        for ($i = 0; $i < count($gambarArray['name']); $i++) {
          $gambarName = $gambarArray['name'][$i];
          $gambarTmpName = $gambarArray['tmp_name'][$i];
          $gambarError = $gambarArray['error'][$i];
          
          if ($gambarError === 0) {
            $gambarDestination = "path/to/upload/directory/" . $gambarName; // Ubah "path/to/upload/directory/" dengan direktori upload yang sesuai di server
            
            // Simpan informasi gambar ke dalam array gambarData
            $gambarData[] = $gambarName;

            move_uploaded_file($gambarTmpName, $gambarDestination);
          } else {
            // Jika terjadi error dalam proses upload gambar, tampilkan pesan error dan kembali ke halaman sebelumnya
            echo '<script>alert("Terjadi kesalahan dalam mengupload gambar."); window.location.href = "tambahkos.php";</script>';
            exit();
          }
        }
      }

      // Simpan informasi gambar ke dalam tabel gambar menggunakan format JSON
      $gambarJSON = json_encode($gambarData);

      // Query untuk menyimpan informasi gambar ke dalam tabel gambar
      $queryGambar = "INSERT INTO gambar (id_kos, nama_file, tanggal) VALUES ('$id_kos', '$gambarJSON', NOW())";
      $resultGambar = mysqli_query($conn, $queryGambar);

      if (!$resultGambar) {
        // Jika penyimpanan informasi gambar gagal, tampilkan pesan error dan kembali ke halaman sebelumnya
        echo '<script>alert("Terjadi kesalahan dalam menyimpan informasi gambar."); window.location.href = "tambahkos.php";</script>';
        exit();
      }

      // Jika semua penyimpanan data berhasil, lakukan tindakan selanjutnya (misalnya, tampilkan pesan sukses atau redirect ke halaman lain)
      echo '<script>alert("Data berhasil disimpan!"); window.location.href = "tambahkos.php";</script>';
    } else {
      // Jika penyimpanan data ke tabel kos gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
      echo '<script>alert("Terjadi kesalahan. Data gagal disimpan."); window.location.href = "tambahkos.php";</script>';
    }
  } else {
    // Jika ada input yang kosong, tampilkan pesan error atau lakukan tindakan yang sesuai
    echo '<script>alert("Mohon lengkapi semua inputan."); window.location.href = "tambahkos.php";</script>';
  }
}

mysqli_close($conn);
?>