<?php
// Include file koneksi.php
require 'koneksi.php';

// Query untuk masing-masing tabel
$query_tipeuser = "SELECT * FROM tipeuser";
$query_user = "SELECT * FROM user";
$query_userprofile = "SELECT * FROM userprofile";
$query_provinsi = "SELECT * FROM provinsi";
$query_kota = "SELECT * FROM kota";
$query_kecamatan = "SELECT * FROM kecamatan";

// Eksekusi query dan tampilkan hasil
try {
    // Query untuk tabel tipeuser
    $result_tipeuser = $conn->query($query_tipeuser);
    echo "<h2>Data dari tabel tipeuser:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>nama_tipeuser</th><th>status_tipeuser</th></tr>";
    while ($row = $result_tipeuser->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['nama_tipeuser'] . "</td><td>" . $row['status_tipeuser'] . "</td></tr>";
    }
    echo "</table>";
    echo "<br>"; // Jarak antara tabel

    // Query untuk tabel user
    $result_user = $conn->query($query_user);
    echo "<h2>Data dari tabel user:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Username</th><th>password</th><th>status_user</th></tr>";
    while ($row = $result_user->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td><td>" . $row['status_user'] . "</td></tr>";
    }
    echo "</table>";
    echo "<br>"; // Jarak antara tabel

    // Query untuk tabel userprofile
    $result_userprofile = $conn->query($query_userprofile);
    echo "<h2>Data dari tabel userprofile:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nama_userprofile</th><th>Alamat_userprofile</th><th>status_userprofile</th><th>fk_provinsi_id</th><th>fk_kota_id</th><th>fk_kecamatan_id</th></tr>";
    while ($row = $result_userprofile->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['nama_userprofile'] . "</td><td>" . $row['alamat_userprofile'] . "</td><td>" . $row['status_userprofile'] . "</td><td>" . $row['fk_provinsi_id'] . "</td><td>" . $row['fk_kota_id'] . "</td><td>" . $row['fk_kecamatan_id'] . "</td></tr>";
    }
    echo "</table>";
    echo "<br>"; // Jarak antara tabel

    // Query untuk tabel provinsi
    $result_provinsi = $conn->query($query_provinsi);
    echo "<h2>Data dari tabel provinsi:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nama Provinsi</th><th>status_provinsi</th></tr>";
    while ($row = $result_provinsi->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['nama_provinsi'] . "</td><td>" . $row['status_provinsi'] . "</td></tr>";
    }
    echo "</table>";
    echo "<br>"; // Jarak antara tabel

    // Query untuk tabel kota
    $result_kota = $conn->query($query_kota);
    echo "<h2>Data dari tabel kota:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nama Kota</th><th>status_kota</th><th>fk_provinsi_id</th></tr>";
    while ($row = $result_kota->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['nama_kota'] . "</td><td>" . $row['status_kota'] . "</td><td>" . $row['fk_provinsi_id'] . "</td></tr>";
    }
    echo "</table>";
    echo "<br>"; // Jarak antara tabel

    // Query untuk tabel kecamatan
    $result_kecamatan = $conn->query($query_kecamatan);
    echo "<h2>Data dari tabel kecamatan:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nama Kecamatan</th><th>status_kecamatan</th><th>fk_kota_id</th></tr>";
    while ($row = $result_kecamatan->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row['nama_kecamatan'] . "</td><td>" . $row['status_kecamatan'] . "</td><td>" . $row['fk_kota_id'] . "</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
