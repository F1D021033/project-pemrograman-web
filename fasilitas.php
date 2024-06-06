<?php
// Mengimpor file koneksi
require_once 'koneksi.php';

// Mendapatkan data dari formulir
if (isset($_POST['fasilitas'])) {
    $fasilitas = $_POST['fasilitas'];

    // Menyimpan data ke database
    foreach ($fasilitas as $fasilitas_item) {
        $sql = "INSERT INTO fasilitas (nama_fasilitas) VALUES ('$fasilitas_item')";
        if ($conn->query($sql) === false) {
            echo "Gagal menyimpan data: " . $conn->error;
        }
    }
    echo "Data berhasil disimpan ke database.";
}
$conn->close();
?>