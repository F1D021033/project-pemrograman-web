<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil nilai dari form
  $nama_kos = $_POST['nama_kos'];
  $luas = $_POST['luas'];
  $keterangan = $_POST['keterangan'];
  $ketersediaan = $_POST['ketersediaan'];
  $harga = $_POST['harga'];
  $alamat = $_POST['alamat'];
  $id_kos = 4; // Ganti 4 dengan ID kos yang ingin diupdate

  // Mengambil data kos yang ada di database
  $queryGetKos = "SELECT * FROM kos WHERE id_kos = $id_kos";
  $resultGetKos = mysqli_query($conn, $queryGetKos);

  if (!$resultGetKos) {
    die("Gagal mengambil data kos: " . mysqli_error($conn));
  }

  // Memeriksa apakah data kos ditemukan
  if (mysqli_num_rows($resultGetKos) > 0) {
    $existingKos = mysqli_fetch_assoc($resultGetKos);

    // Memperbarui nilai atribut yang diubah
    if (!empty($nama_kos)) {
      $existingKos['nama_kos'] = $nama_kos;
    }
    if (!empty($luas)) {
      $existingKos['luas'] = $luas;
    }
    if (!empty($keterangan)) {
      $existingKos['keterangan'] = $keterangan;
    }
    if (!empty($ketersediaan)) {
      $existingKos['ketersediaan'] = $ketersediaan;
    }
    if (!empty($harga)) {
      $existingKos['harga'] = $harga;
    }
    if (!empty($alamat)) {
      $existingKos['alamat'] = $alamat;
    }

    // Mengupdate tabel kos dengan nilai atribut yang baru
    $queryUpdateKos = "UPDATE kos SET nama_kos = '{$existingKos['nama_kos']}', luas = '{$existingKos['luas']}', keterangan = '{$existingKos['keterangan']}', ketersediaan = '{$existingKos['ketersediaan']}', harga = '{$existingKos['harga']}', alamat = '{$existingKos['alamat']}' WHERE id_kos = $id_kos";
    $resultUpdateKos = mysqli_query($conn, $queryUpdateKos);

    if (!$resultUpdateKos) {
      die("Gagal mengupdate data kos: " . mysqli_error($conn));
    }

    // Memperbarui fasilitas yang dipilih
    if (isset($_POST['fasilitas']) && is_array($_POST['fasilitas'])) {
      $fasilitas = $_POST['fasilitas']; // array fasilitas yang dipilih

      // Menghapus data fasilitas yang lama
      $queryDeleteFasilitas = "DELETE FROM fasilitas WHERE id_kos = $id_kos";
      $resultDeleteFasilitas = mysqli_query($conn, $queryDeleteFasilitas);

      if (!$resultDeleteFasilitas) {
        die("Gagal menghapus data fasilitas: " . mysqli_error($conn));
      }

      // Memasukkan data fasilitas yang baru
      $fasilitasJSON = json_encode($fasilitas);
      $queryInsertFasilitas = "INSERT INTO fasilitas (id_kos, fasilitas) VALUES ($id_kos, '$fasilitasJSON')";
      $resultInsertFasilitas = mysqli_query($conn, $queryInsertFasilitas);

      if (!$resultInsertFasilitas) {
        die("Gagal memasukkan data fasilitas: " . mysqli_error($conn));
      }
    }

    // Menampilkan pesan sukses menggunakan pop-up
    $message = "Data berhasil diupdate";
    echo '<script>alert("' . $message . '"); window.location.href = "editkosPutri.php";</script>';

    mysqli_close($conn);
  } else {
    // Jika data kos tidak ditemukan, tampilkan pesan error atau lakukan tindakan yang sesuai
    die("Data kos tidak ditemukan");
  }
}
?>