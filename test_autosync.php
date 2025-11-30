<?php
// File untuk test auto-sync
// Akses: http://localhost/kuliah_ci4/test_autosync.php

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
    .container { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; }
    h1 { color: #4f46e5; }
    .success { background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .error { background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .info { background: #dbeafe; color: #1e40af; padding: 15px; border-radius: 8px; margin: 10px 0; }
    .btn { background: #4f46e5; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; display: inline-block; margin: 10px 5px; }
</style>";

echo "<div class='container'>";
echo "<h1>🧪 Test Auto-Sync System</h1>";
echo "<hr>";

// 1. Cek total data
$totalMhs = $conn->query("SELECT COUNT(*) as total FROM mahasiswa")->fetch_assoc()['total'];
$totalUser = $conn->query("SELECT COUNT(*) as total FROM user WHERE role='mahasiswa'")->fetch_assoc()['total'];

echo "<h2>📊 Status Saat Ini:</h2>";
echo "<div class='info'>";
echo "<strong>Total Mahasiswa:</strong> $totalMhs<br>";
echo "<strong>Total User Mahasiswa:</strong> $totalUser<br>";

if ($totalMhs == $totalUser) {
    echo "<br><span style='color: green; font-size: 1.2em;'>✅ Data sudah sinkron!</span>";
} else {
    echo "<br><span style='color: red; font-size: 1.2em;'>❌ Data belum sinkron!</span>";
    echo "<br>Selisih: " . abs($totalMhs - $totalUser) . " data";
}
echo "</div>";

// 2. Cek user tanpa mahasiswa
$result = $conn->query("
    SELECT u.username, u.nama_user 
    FROM user u 
    LEFT JOIN mahasiswa m ON u.username = m.nim 
    WHERE u.role = 'mahasiswa' AND m.nim IS NULL
");

if ($result->num_rows > 0) {
    echo "<h2>⚠️ User Tanpa Data Mahasiswa:</h2>";
    echo "<div class='error'>";
    echo "Ditemukan <strong>{$result->num_rows}</strong> user yang perlu disinkronkan:<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo "- {$row['username']} ({$row['nama_user']})<br>";
    }
    echo "</div>";
    
    echo "<div class='info'>";
    echo "💡 <strong>Auto-sync akan memperbaiki ini saat Anda buka halaman Data Mahasiswa</strong>";
    echo "</div>";
} else {
    echo "<div class='success'>";
    echo "✅ Tidak ada user tanpa data mahasiswa";
    echo "</div>";
}

// 3. Test button
echo "<hr>";
echo "<h2>🔧 Aksi:</h2>";
echo "<a href='public/admin/mahasiswa' class='btn'>📋 Buka Halaman Data Mahasiswa (Auto-Sync akan berjalan)</a>";
echo "<a href='fix_sinkronisasi.php' class='btn' style='background: #dc2626;'>🔨 Perbaiki Manual</a>";
echo "<a href='test_autosync.php' class='btn' style='background: #059669;'>🔄 Refresh Test Ini</a>";

// 4. Instruksi
echo "<hr>";
echo "<h2>📝 Cara Test Auto-Sync:</h2>";
echo "<div class='info'>";
echo "<ol>";
echo "<li>Lihat status di atas (apakah sinkron atau tidak)</li>";
echo "<li>Klik tombol <strong>'Buka Halaman Data Mahasiswa'</strong></li>";
echo "<li>Auto-sync akan berjalan otomatis</li>";
echo "<li>Kembali ke halaman ini dan klik <strong>'Refresh Test Ini'</strong></li>";
echo "<li>Cek apakah status sudah berubah menjadi <strong>'Data sudah sinkron'</strong></li>";
echo "</ol>";
echo "</div>";

// 5. Log info
echo "<hr>";
echo "<h2>📄 Log Auto-Sync:</h2>";
echo "<div class='info'>";
echo "Log auto-sync tersimpan di: <code>writable/logs/log-" . date('Y-m-d') . ".log</code><br>";
echo "Cari kata kunci: <strong>'Auto-sync'</strong>";
echo "</div>";

$conn->close();
echo "</div>";
?>
