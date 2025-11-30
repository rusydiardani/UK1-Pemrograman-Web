<?php
// File untuk memperbaiki sinkronisasi data mahasiswa dan user
// Akses: http://localhost/kuliah_ci4/fix_sinkronisasi.php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'kuliah';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "<style>
    body { font-family: Arial; padding: 20px; background: #f3f4f6; }
    .container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h1 { color: #4f46e5; }
    .success { background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .error { background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .warning { background: #fef3c7; color: #92400e; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .info { background: #dbeafe; color: #1e40af; padding: 15px; border-radius: 8px; margin: 10px 0; }
    table { border-collapse: collapse; width: 100%; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background: #4f46e5; color: white; }
    .btn { background: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; display: inline-block; margin: 10px 5px; }
    .btn:hover { background: #4338ca; }
</style>";

echo "<div class='container'>";
echo "<h1>🔧 Perbaikan Sinkronisasi Data</h1>";
echo "<hr>";

// 1. Cek user mahasiswa yang tidak ada di tabel mahasiswa
echo "<h2>1️⃣ Cek User Tanpa Data Mahasiswa</h2>";
$result = $conn->query("
    SELECT u.id_user, u.username, u.nama_user 
    FROM user u 
    LEFT JOIN mahasiswa m ON u.username = m.nim 
    WHERE u.role = 'mahasiswa' AND m.nim IS NULL
");

if ($result->num_rows > 0) {
    echo "<div class='warning'>";
    echo "⚠️ Ditemukan <strong>{$result->num_rows}</strong> user mahasiswa tanpa data di tabel mahasiswa:";
    echo "</div>";
    
    echo "<table>";
    echo "<tr><th>ID User</th><th>Username (NIM)</th><th>Nama User</th><th>Aksi</th></tr>";
    
    $usersToFix = [];
    while ($row = $result->fetch_assoc()) {
        $usersToFix[] = $row;
        echo "<tr>";
        echo "<td>{$row['id_user']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['nama_user']}</td>";
        echo "<td><span style='color: red;'>❌ Tidak ada di tabel mahasiswa</span></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // Auto fix
    echo "<h3>🔨 Memperbaiki...</h3>";
    $fixed = 0;
    foreach ($usersToFix as $user) {
        $nim = $conn->real_escape_string($user['username']);
        $nama = $conn->real_escape_string($user['nama_user']);
        
        $sql = "INSERT INTO mahasiswa (nim, nama) VALUES ('$nim', '$nama')";
        if ($conn->query($sql)) {
            echo "<div class='success'>✅ Berhasil menambahkan: $nim - $nama</div>";
            $fixed++;
        } else {
            echo "<div class='error'>❌ Gagal menambahkan: $nim - " . $conn->error . "</div>";
        }
    }
    
    echo "<div class='info'>";
    echo "📊 <strong>Hasil:</strong> $fixed dari {$result->num_rows} data berhasil diperbaiki";
    echo "</div>";
    
} else {
    echo "<div class='success'>✅ Tidak ada user mahasiswa tanpa data di tabel mahasiswa</div>";
}

// 2. Cek mahasiswa yang tidak punya user
echo "<hr>";
echo "<h2>2️⃣ Cek Mahasiswa Tanpa User</h2>";
$result = $conn->query("
    SELECT m.nim, m.nama 
    FROM mahasiswa m 
    LEFT JOIN user u ON m.nim = u.username 
    WHERE u.username IS NULL
");

if ($result->num_rows > 0) {
    echo "<div class='warning'>";
    echo "⚠️ Ditemukan <strong>{$result->num_rows}</strong> mahasiswa tanpa akun user:";
    echo "</div>";
    
    echo "<table>";
    echo "<tr><th>NIM</th><th>Nama</th><th>Status</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['nim']}</td>";
        echo "<td>{$row['nama']}</td>";
        echo "<td><span style='color: red;'>❌ Tidak bisa login (tidak ada user)</span></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<div class='info'>";
    echo "💡 <strong>Catatan:</strong> Mahasiswa ini tidak bisa login karena tidak memiliki akun user.<br>";
    echo "Silakan hapus data mahasiswa ini atau buat user baru melalui halaman admin.";
    echo "</div>";
    
} else {
    echo "<div class='success'>✅ Semua mahasiswa memiliki akun user</div>";
}

// 3. Tampilkan hasil akhir
echo "<hr>";
echo "<h2>📊 Hasil Akhir</h2>";

$totalMahasiswa = $conn->query("SELECT COUNT(*) as total FROM mahasiswa")->fetch_assoc()['total'];
$totalUser = $conn->query("SELECT COUNT(*) as total FROM user WHERE role='mahasiswa'")->fetch_assoc()['total'];

echo "<div class='info'>";
echo "<strong>Total Mahasiswa:</strong> $totalMahasiswa<br>";
echo "<strong>Total User Mahasiswa:</strong> $totalUser<br>";

if ($totalMahasiswa == $totalUser) {
    echo "<br><span style='color: green; font-size: 1.2em;'>✅ Data sudah sinkron!</span>";
} else {
    echo "<br><span style='color: red; font-size: 1.2em;'>❌ Data belum sinkron!</span>";
}
echo "</div>";

$conn->close();

echo "<hr>";
echo "<a href='public/admin/mahasiswa' class='btn'>← Kembali ke Halaman Mahasiswa</a>";
echo "<a href='cek_database.php' class='btn' style='background: #059669;'>🔍 Cek Database</a>";
echo "<a href='fix_sinkronisasi.php' class='btn' style='background: #dc2626;'>🔄 Refresh Halaman Ini</a>";

echo "</div>";
?>
