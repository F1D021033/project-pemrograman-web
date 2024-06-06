<?php
session_start();
// Cek apakah pengguna sudah login dan memiliki level pemilik
if (!isset($_SESSION['logged_in']) || $_SESSION['level'] !== 'pemilik') {
    // Jika belum login atau level bukan pemilik, redirect ke halaman login
    header("Location: loginfix/login.php");
    exit();
}

// Mendapatkan daftar pesanan dari database (contoh data dummy)
$daftarPesanan = array(
    array('id' => 1, 'nama' => 'Karina', 'nohp' => '081234567890', 'pekerjaan' => 'Mahasiswa'),
    array('id' => 2, 'nama' => 'Sari Meland', 'nohp' => '081234567891', 'pekerjaan' => 'Mahasiswa'),
    array('id' => 3, 'nama' => 'Wiya', 'nohp' => '081234567892', 'pekerjaan' => 'Mahasiswa')
);

// Fungsi untuk mengubah status pesanan menjadi diterima
function terimaPesanan($idPesanan)
{
    // Implementasikan logika untuk mengubah status pesanan menjadi diterima
    // Misalnya, mengupdate nilai status pesanan di database
    echo "Pesanan dengan ID $idPesanan diterima.";
}

// Fungsi untuk mengubah status pesanan menjadi ditolak
function tolakPesanan($idPesanan)
{
    // Implementasikan logika untuk mengubah status pesanan menjadi ditolak
    // Misalnya, mengupdate nilai status pesanan di database
    echo "Pesanan dengan ID $idPesanan ditolak.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TERIMA PESANAN</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 300px;
            padding: 20px;
            margin: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }
        
        h2 {
            text-align: center;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin: 10px 0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #f44336;
        }

        /* Style pop-up */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            z-index: 10000;
        }

        .popup h3 {
            margin-top: 0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #555;
            cursor: pointer;
        }

        .popup-content {
            margin-top: 20px;
            text-align: center;
        }

        .popup-content p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>TERIMA PESANAN</h2>
    <div class="container">
        <?php foreach ($daftarPesanan as $pesanan) : ?>
            <div class="card">
                <h3>Pesanan ID: <?php echo $pesanan['id']; ?></h3>
                <p>Nama Lengkap: <?php echo $pesanan['nama']; ?></p>
                <p>No HP: <?php echo $pesanan['nohp']; ?></p>
                <p>Pekerjaan: <?php echo $pesanan['pekerjaan']; ?></p>
                <div class="actions">
                    <button onclick="openPopup(<?php echo $pesanan['id']; ?>)">Terima</button>
                    <button class="btn-danger" onclick="tolakPesanan(<?php echo $pesanan['id']; ?>)">Tolak</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="overlay" id="overlay"></div>

    <?php foreach ($daftarPesanan as $pesanan) : ?>
        <div class="popup" id="popup-<?php echo $pesanan['id']; ?>">
            <h3>Konfirmasi Pesanan</h3>
            <span class="close-btn" onclick="closePopup(<?php echo $pesanan['id']; ?>)">&times;</span>
            <div class="popup-content">
                <p>Nama Lengkap: <?php echo $pesanan['nama']; ?></p>
                <p>No HP: <?php echo $pesanan['nohp']; ?></p>
                <p>Pekerjaan: <?php echo $pesanan['pekerjaan']; ?></p>
                <form action="#" method="post">
                    <input type="hidden" name="id_pesanan" value="<?php echo $pesanan['id']; ?>">
                    <input type="submit" name="terima" value="Terima Pesanan" class="btn">
                    <input type="submit" name="tolak" value="Tolak Pesanan" class="btn btn-danger">
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        function openPopup(id) {
            var popup = document.getElementById('popup-' + id);
            var overlay = document.getElementById('overlay');
            popup.style.display = 'block';
            overlay.style.display = 'block';
        }

        function closePopup(id) {
            var popup = document.getElementById('popup-' + id);
            var overlay = document.getElementById('overlay');
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }
    </script>
</body>
</html>