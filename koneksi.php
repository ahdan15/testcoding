<?php
$host = 'localhost';
$dbname = 'testcoding'; // 
$username = 'root'; // 
$password = ''; // 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Tambahkan konfigurasi tambahan jika diperlukan
    // Misalnya: $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // echo "Koneksi sukses"; // Anda bisa komentari atau hapus echo ini
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    // Atau tambahkan log atau pesan lainnya untuk penanganan kesalahan
}
?>
