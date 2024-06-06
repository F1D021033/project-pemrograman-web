<?php
require 'koneksi.php';
$first_name = $_POST["first_name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];

$level = 'penyewa'; // Set level sebagai 'penyewa'

$query_sql = "INSERT INTO login (level, nama_lengkap, alamat, no_telp, email, nama_pengguna, kata_sandi)
              VALUES ('$level', '$first_name', '$address', '$phone', '$email', '$last_name', '$password')";

if (mysqli_query($conn, $query_sql)) {
  header("Location: login.php");
} else {
  echo "Pendaftaran gagal" . mysqli_error($conn);
}