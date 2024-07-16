<?php
// Include file koneksi.php
require 'koneksi.php';

// Query untuk menampilkan data dengan status aktif (1) dan tidak aktif (0)
$query = " SELECT  id, 
        nama_tipeuser, 
        CASE WHEN status_tipeuser = 'aktif' THEN 1 ELSE 0 END AS status_tipeuser,
        nama_provinsi,
        CASE WHEN status_provinsi = 'aktif' THEN 1 ELSE 0 END AS status_provinsi,
        nama_kota,
        CASE WHEN status_kota = 'aktif' THEN 1 ELSE 0 END AS status_kota,
        nama_kecamatan,
        CASE WHEN status_kecamatan = 'aktif' THEN 1 ELSE 0 END AS status_kecamatan,
        nama_userprofile,
        CASE WHEN status_userprofile = 'aktif' THEN 1 ELSE 0 END AS status_userprofile
    FROM 
        tipeuser,
        provinsi,
        kota,
        kecamatan,
        userprofile
    WHERE 
        id_tipeuser = user.fk_tipeuser_id AND
        provinsi.id = kota.fk_provinsi_id AND
        kota.id = kecamatan.fk_kota_id AND
        kecamatan.id = userprofile.fk_kecamatan_id
";

// Eksekusi query dan tampilkan hasil
try {
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        echo "<h2>Data dengan Status (1 = Aktif, 0 = Tidak Aktif):</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nama Tipe User</th><th>Status Tipe User</th><th>Nama Provinsi</th><th>Status Provinsi</th><th>Nama Kota</th><th>Status Kota</th><th>Nama Kecamatan</th><th>Status Kecamatan</th><th>Nama User Profile</th><th>Status User Profile</th></tr>";
        
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_tipeuser'] . "</td>";
            echo "<td>" . $row['status_tipeuser'] . "</td>";
            echo "<td>" . $row['nama_provinsi'] . "</td>";
            echo "<td>" . $row['status_provinsi'] . "</td>";
            echo "<td>" . $row['nama_kota'] . "</td>";
            echo "<td>" . $row['status_kota'] . "</td>";
            echo "<td>" . $row['nama_kecamatan'] . "</td>";
            echo "<td>" . $row['status_kecamatan'] . "</td>";
            echo "<td>" . $row['nama_userprofile'] . "</td>";
            echo "<td>" . $row['status_userprofile'] . "</td>";
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
