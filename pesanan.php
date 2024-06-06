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
				<input type="email" name="email" id="email" />
			</div>
			<div>
				<label>Pekerjaan:</label>
				<textarea cols="40" rows="5" name="alamat" id="alamat"></textarea>
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
		var email = document.getElementById("email").value;
		var alamat = document.getElementById("alamat").value;
		if (nama != "" && email!="" && alamat !="") {
			return true;
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
		}
	}
</script>
</html>