<?php

include "koneksi.php"; // Mengimpor file koneksi.php yang berisi konfigurasi koneksi ke database.

session_start(); // Memulai sesi PHP. Diperlukan untuk mengakses atau menyimpan data sesi.

session_destroy(); // Mengeluarkan sesi yang sedang berjalan.

header("Location: index.php"); // Mengarahkan pengguna ke halaman index.php setelah sesi dihancurkan.

exit; // Menghentikan eksekusi program PHP setelah mengarahkan pengguna ke halaman index.php.

?>
