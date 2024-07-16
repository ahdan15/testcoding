<?php
// Include file koneksi.php
require 'koneksi.php';

// Query untuk menampilkan data dari userprofile dengan mengakses relasi langsung
$query = "SELECT 
   id_userprofile, nama_userprofile, status_userprofile, 
    nama_provinsi, nama_kota, nama_kecamatan
    FROM 
        userprofile, 
        kota , 
        provinsi , 
        kecamatan 
    WHERE 
        fk_kota_id_up = id_kota AND
        fk_provinsi_id_up = id_provinsi AND
        fk_kecamatan_id_up = id_kecamatan
";

// Eksekusi query dan tampilkan hasil
try {
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        echo "<h2>Data User Profile:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>User ID</th><th>Nama User Profile</th><th>Status User Profile</th><th>Nama Provinsi</th><th>Nama Kota</th><th>Nama Kecamatan</th></tr>";
        
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_userprofile'] . "</td>";
            echo "<td>" . $row['nama_userprofile'] . "</td>";
            echo "<td>" . $row['status_userprofile'] . "</td>";
            echo "<td>" . $row['nama_provinsi'] . "</td>";
            echo "<td>" . $row['nama_kota'] . "</td>";
            echo "<td>" . $row['nama_kecamatan'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
