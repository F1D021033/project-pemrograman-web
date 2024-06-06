<?php
session_start();
require 'koneksi.php';

if(isset($_POST["first_name"]) && isset($_POST["password"])) {
    $first_name = $_POST["first_name"];
    $password = $_POST["password"];

    $query_sql = "SELECT * FROM login
                WHERE nama_pengguna = '$first_name' AND kata_sandi = '$password'";

    $result = mysqli_query($conn, $query_sql);
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['level'] == "pemilik") {
            $_SESSION['username'] = $first_name;
            $_SESSION['level'] = "pemilik";
            $_SESSION['logged_in'] = true; // Tambahkan ini
            header("location:../daftarkosku.php");
            exit;
        } else if ($data['level'] == "penyewa") {
            $_SESSION['username'] = $first_name;
            $_SESSION['level'] = "penyewa";
            $_SESSION['logged_in'] = true; // Tambahkan ini
            header("location:../penyewa.php");
            exit;
        }
    }
}

header("location:index.php?pesan=gagal");
exit;
?>