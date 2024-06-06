<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['level'] !== 'penyewa') {
  // Jika belum login atau level bukan penyewa, redirect ke halaman login
  header("Location: loginfix/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pemesanan Kos</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Pemesanan Kos</h1>
    <form action="proses_booking.php" method="post">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="tanggal">Tanggal Check-in:</label>
      <input type="date" id="tanggal" name="tanggal" required>

      <input type="submit" value="Pesan Sekarang">
    </form>
  </div>
</body>
</html>
