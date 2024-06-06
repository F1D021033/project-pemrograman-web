<?php
session_start();
require 'koneksi.php';

// Mendapatkan nilai feedback dari form
$feedback = $_POST['FEEDBACK'];

// Mendapatkan waktu saat ini
$timestamp = date("Y-m-d H:i:s");

// Memeriksa apakah field feedback kosong
if (empty($feedback)) {
    echo 'Harap mengisi field feedback.';
    exit();
}

// Mendapatkan username dari session atau data login
$username = $_SESSION['username'];

// Mendapatkan informasi id dan nama_pengguna berdasarkan username login
$query = "SELECT id, nama_pengguna FROM login WHERE nama_pengguna = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $nama_pengguna = $row['nama_pengguna'];
} else {
    echo "Error: User tidak ditemukan.";
    exit();
}

// Membuat query untuk menyimpan feedback ke dalam tabel
$sql = "INSERT INTO feedback (text, tanggal, id, nama_pengguna) VALUES ('$feedback', '$timestamp', '$id', '$nama_pengguna')";

if (mysqli_query($conn, $sql)) {
    echo 'Feedback berhasil terkirim. Terima kasih!';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
?>