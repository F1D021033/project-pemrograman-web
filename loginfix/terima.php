<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['level'] !== 'pemilik') {
  // Jika belum login atau level bukan penyewa, redirect ke halaman login
  header("Location: loginfix/login.php");
  exit();
}

// Mengambil data dari form saat tombol Pesan ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengambil nilai inputan form
  $nama = $_POST['nama'];
  $nohp = $_POST['nohp'];
  $pekerjaan = $_POST['pekerjaan'];

  // Validasi jika ada data yang kosong
  if (empty($nama) || empty($nohp) || empty($pekerjaan)) {
    echo "Anda harus mengisi semua data dengan lengkap!";
  } else {
    // Lakukan proses penyimpanan data pesanan ke dalam database
    // Tambahkan kode di sini sesuai dengan proses penyimpanan data ke dalam database yang digunakan
    // Misalnya, menggunakan query SQL INSERT INTO untuk menyimpan data pesanan ke dalam tabel pemesanan
    // Setelah berhasil menyimpan, tampilkan pesan sukses atau redirect ke halaman lain
    echo "Pesanan berhasil diterima!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PESANAN</title>
	<link rel="stylesheet" type="text/css" href="pesanan.css">
</head>
<body>
	<center><h2>PESAN KOS SEKARANG!</h2></center>
	<div class="login">
		<form action="#" method="POST" onSubmit="validasi()">
			<div>
				<label>Nama Lengkap:</label>
				<input type="text" name="nama" id="nama" />
			</div>
			<div>
				<label>No Hp:</label>
				<input type="text" name="nohp" id="nohp" />
			</div>
			<div>
				<label>Pekerjaan:</label>
				<textarea cols="40" rows="5" name="pekerjaan" id="pekerjaan"></textarea>
			</div>
			<div>
				<input type="submit" value="Pesan" class="tombol">
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">
	function validasi() {
		var nama = document.getElementById("nama").value;
		var nohp = document.getElementById("nohp").value;
		var pekerjaan = document.getElementById("pekerjaan").value;
		if (nama != "" && nohp != "" && pekerjaan != "") {
			return true;
		} else {
			alert('Anda harus mengisi data dengan lengkap!');
			return false;
		}
	}
</script>
</html>