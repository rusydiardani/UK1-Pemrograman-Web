<?php
// File untuk debug data mahasiswa
// Akses: http://localhost/kuliah_ci4/debug_mahasiswa.php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'kuliah';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "<h2>Debug Data Mahasiswa</h2>";
echo "<hr>";

// Count total
$result = $conn->query("SELECT COUNT(*) as total FROM mahasiswa");
$total = $result->fetch_assoc()['total'];
echo "<p><strong>Total Mahasiswa di Database:</strong> $total</p>";

// Show all data
echo "<h3>Semua Data Mahasiswa:</h3>";
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY nim ASC");

echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background: #4f46e5; color: white;'>";
echo "<th>No</th><th>NIM</th><th>Nama</th>";
echo "</tr>";

$no = 1;
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$row['nim']}</td>";
    echo "<td>{$row['nama']}</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";

// Check user table
echo "<hr>";
echo "<h3>Data User Mahasiswa:</h3>";
$result = $conn->query("SELECT * FROM user WHERE role='mahasiswa' ORDER BY username ASC");

echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background: #4f46e5; color: white;'>";
echo "<th>No</th><th>Username (NIM)</th><th>Nama User</th><th>Role</th>";
echo "</tr>";

$no = 1;
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$row['username']}</td>";
    echo "<td>{$row['nama_user']}</td>";
    echo "<td>{$row['role']}</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";

$conn->close();

echo "<hr>";
echo "<p><a href='public/admin/mahasiswa'>Kembali ke Halaman Mahasiswa</a></p>";
?>
