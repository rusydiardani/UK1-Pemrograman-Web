<?php
// File untuk cek database secara langsung
// Akses: http://localhost/kuliah_ci4/cek_database.php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'kuliah';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "<style>
    body { font-family: Arial; padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background: #4f46e5; color: white; }
    tr:nth-child(even) { background: #f9fafb; }
    .success { color: green; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    .info { background: #e0e7ff; padding: 15px; border-radius: 8px; margin: 20px 0; }
</style>";

echo "<h1>🔍 Cek Database Mahasiswa</h1>";
echo "<hr>";

// 1. Cek koneksi
echo "<div class='info'>";
echo "✅ <strong>Koneksi Database Berhasil!</strong><br>";
echo "Database: <strong>$database</strong>";
echo "</div>";

// 2. Count total mahasiswa
$result = $conn->query("SELECT COUNT(*) as total FROM mahasiswa");
$total = $result->fetch_assoc()['total'];
echo "<h2>Total Mahasiswa: <span class='success'>$total</span></h2>";

// 3. Tampilkan semua data mahasiswa
echo "<h3>📋 Semua Data Mahasiswa:</h3>";
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY nim ASC");

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama</th></tr>";
    
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
} else {
    echo "<p class='error'>Tidak ada data mahasiswa!</p>";
}

// 4. Cek data user mahasiswa
echo "<hr>";
echo "<h3>👤 Data User Mahasiswa:</h3>";
$result = $conn->query("SELECT id_user, username, nama_user, role FROM user WHERE role='mahasiswa' ORDER BY username ASC");
$totalUser = $result->num_rows;
echo "<p>Total User Mahasiswa: <strong>$totalUser</strong></p>";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>ID User</th><th>Username (NIM)</th><th>Nama User</th><th>Role</th></tr>";
    
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>{$row['id_user']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['nama_user']}</td>";
        echo "<td>{$row['role']}</td>";
        echo "</tr>";
        $no++;
    }
    echo "</table>";
}

// 5. Cek apakah ada data yang tidak sinkron
echo "<hr>";
echo "<h3>🔄 Cek Sinkronisasi Data:</h3>";

// Mahasiswa yang tidak punya user
$result = $conn->query("
    SELECT m.nim, m.nama 
    FROM mahasiswa m 
    LEFT JOIN user u ON m.nim = u.username 
    WHERE u.username IS NULL
");

if ($result->num_rows > 0) {
    echo "<p class='error'>⚠️ Mahasiswa tanpa akun user:</p>";
    echo "<table>";
    echo "<tr><th>NIM</th><th>Nama</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['nim']}</td>";
        echo "<td>{$row['nama']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='success'>✅ Semua mahasiswa memiliki akun user</p>";
}

// User mahasiswa yang tidak ada di tabel mahasiswa
$result = $conn->query("
    SELECT u.username, u.nama_user 
    FROM user u 
    LEFT JOIN mahasiswa m ON u.username = m.nim 
    WHERE u.role = 'mahasiswa' AND m.nim IS NULL
");

if ($result->num_rows > 0) {
    echo "<p class='error'>⚠️ User mahasiswa tanpa data mahasiswa:</p>";
    echo "<table>";
    echo "<tr><th>Username</th><th>Nama</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['nama_user']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='success'>✅ Semua user mahasiswa memiliki data mahasiswa</p>";
}

// 6. Query yang digunakan CodeIgniter
echo "<hr>";
echo "<h3>🔍 Test Query CodeIgniter:</h3>";
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY nim ASC LIMIT 10");
echo "<p>Query: <code>SELECT * FROM mahasiswa ORDER BY nim ASC LIMIT 10</code></p>";
echo "<p>Hasil: <strong>{$result->num_rows} rows</strong></p>";

$conn->close();

echo "<hr>";
echo "<div class='info'>";
echo "<strong>📌 Kesimpulan:</strong><br>";
echo "- Total di Database: <strong>$total mahasiswa</strong><br>";
echo "- Total User Mahasiswa: <strong>$totalUser user</strong><br>";
echo "- Jika angka berbeda, ada masalah sinkronisasi<br>";
echo "- Jika sama dengan yang tampil di web, tidak ada masalah<br>";
echo "</div>";

echo "<p><a href='public/admin/mahasiswa' style='background: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; display: inline-block;'>← Kembali ke Halaman Mahasiswa</a></p>";
?>
