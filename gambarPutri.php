<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil nilai dari form
  $id_gambar = 4; // ID gambar yang akan diupdate

  // Memeriksa apakah file gambar telah diunggah
  if (isset($_FILES['gambar'])) {
    $file = $_FILES['gambar'];

    // Mengambil informasi file
    $fileNames = $file['name'];
    $fileTmps = $file['tmp_name'];

    // Memeriksa apakah tidak ada error saat mengunggah file
    $uploadErrors = array();
    $uploadedFiles = array();
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');

    foreach ($fileNames as $key => $fileName) {
      $fileTmp = $fileTmps[$key];
      $fileType = $file['type'][$key];
      $fileError = $file['error'][$key];

      // Memeriksa apakah file yang diunggah adalah gambar
      if (in_array($fileType, $allowedTypes) && $fileError === 0) {
        // Menentukan direktori penyimpanan file gambar
        $uploadDir = 'img/portfolio/';
        $uploadPath = $uploadDir . $fileName;

        // Memindahkan file gambar ke direktori penyimpanan
        move_uploaded_file($fileTmp, $uploadPath);

        // Menyimpan informasi gambar ke dalam tabel gambar
        $query = "UPDATE gambar SET nama_file = '$fileName' WHERE id_gambar = $id_gambar";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $uploadedFiles[] = $fileName;
        } else {
          $uploadErrors[] = mysqli_error($conn);
        }
      } else {
        $uploadErrors[] = "File '$fileName' bukan gambar atau terjadi kesalahan saat mengunggah.";
      }
    }

    if (!empty($uploadedFiles)) {
      // Menampilkan pesan sukses menggunakan pop-up
      $message = "Gambar berhasil diupdate: " . implode(", ", $uploadedFiles);
      echo '<script>alert("' . $message . '"); window.location.href = "editkosPutri.php";</script>';
    } else {
      // Menampilkan pesan error menggunakan pop-up
      $errorMessage = "Terjadi kesalahan dalam mengupdate gambar: " . implode(", ", $uploadErrors);
      echo '<script>alert("' . $errorMessage . '"); window.location.href = "editkosPutri.php";</script>';
    }
  } else {
    // Menampilkan pesan jika file gambar tidak ditemukan
    echo '<script>alert("File gambar tidak ditemukan. Mohon unggah file gambar."); window.location.href = "editkosPutri.php";</script>';
  }

  mysqli_close($conn);
}
?>