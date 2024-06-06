<?php
$servername = "localhost";
$database = "_findkos";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Koneksi Gagal : " . mysqli_connect_error);
} else {
  echo "Koneksi Berhasil";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_kos = 1;
  $level = 'pemilik';
  $nama_lengkap = $_POST['nama_lengkap'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $email = $_POST['email'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $kata_sandi = $_POST['kata_sandi'];

  $query = "UPDATE kos SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', no_telp = '$no_telp', email = '$email', nama_pengguna = '$nama_pengguna', kata_sandi = '$kata_sandi' WHERE id_kos = $id_kos AND level = '$level'";
  
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Data berhasil diperbarui.";
  } else {
    echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>