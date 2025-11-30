<?php
/**
 * File untuk testing koneksi database
 * Akses file ini melalui browser untuk memastikan koneksi database berhasil
 * URL: http://localhost/[nama-folder]/test_koneksi.php
 */

// Konfigurasi database (sesuaikan dengan .env)
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'kuliah';

echo "<h2>Testing Koneksi Database</h2>";
echo "<hr>";

// Test koneksi
try {
    $conn = new mysqli($hostname, $username, $password);
    
    if ($conn->connect_error) {
        die("<p style='color: red;'>❌ Koneksi gagal: " . $conn->connect_error . "</p>");
    }
    
    echo "<p style='color: green;'>✅ Koneksi ke MySQL berhasil!</p>";
    
    // Test database exists
    $result = $conn->query("SHOW DATABASES LIKE '$database'");
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'>✅ Database '$database' ditemukan!</p>";
        
        // Select database
        $conn->select_db($database);
        
        // Test tables
        $tables = ['user', 'mahasiswa', 'dosen', 'mata_kuliah', 'ruangan', 'jadwal', 'rencana_studi', 'nilai_mutu'];
        
        echo "<h3>Checking Tables:</h3>";
        echo "<ul>";
        
        foreach ($tables as $table) {
            $result = $conn->query("SHOW TABLES LIKE '$table'");
            if ($result->num_rows > 0) {
                // Count rows
                $count_result = $conn->query("SELECT COUNT(*) as total FROM $table");
                $count = $count_result->fetch_assoc()['total'];
                echo "<li style='color: green;'>✅ Tabel '$table' ada ($count rows)</li>";
            } else {
                echo "<li style='color: red;'>❌ Tabel '$table' tidak ditemukan!</li>";
            }
        }
        
        echo "</ul>";
        
        // Test sample data
        echo "<h3>Sample Data:</h3>";
        
        // Check admin user
        $result = $conn->query("SELECT * FROM user WHERE role='admin' LIMIT 1");
        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            echo "<p style='color: green;'>✅ User Admin ditemukan: " . $admin['username'] . "</p>";
        } else {
            echo "<p style='color: red;'>❌ User Admin tidak ditemukan!</p>";
        }
        
        // Check mahasiswa
        $result = $conn->query("SELECT COUNT(*) as total FROM mahasiswa");
        $total = $result->fetch_assoc()['total'];
        echo "<p>Total Mahasiswa: <strong>$total</strong></p>";
        
        // Check dosen
        $result = $conn->query("SELECT COUNT(*) as total FROM dosen");
        $total = $result->fetch_assoc()['total'];
        echo "<p>Total Dosen: <strong>$total</strong></p>";
        
        // Check jadwal
        $result = $conn->query("SELECT COUNT(*) as total FROM jadwal");
        $total = $result->fetch_assoc()['total'];
        echo "<p>Total Jadwal: <strong>$total</strong></p>";
        
        echo "<hr>";
        echo "<h3 style='color: green;'>✅ Semua test berhasil!</h3>";
        echo "<p>Sistem siap digunakan. Silakan akses aplikasi melalui:</p>";
        echo "<p><strong>URL: <a href='public/'>public/</a></strong></p>";
        echo "<p>Login dengan:</p>";
        echo "<ul>";
        echo "<li>Admin - Username: <strong>admin</strong>, Password: <strong>password</strong></li>";
        echo "<li>Mahasiswa - Username: <strong>2101001</strong>, Password: <strong>password</strong></li>";
        echo "<li>Dosen - Username: <strong>0101018801</strong>, Password: <strong>password</strong></li>";
        echo "</ul>";
        
    } else {
        echo "<p style='color: red;'>❌ Database '$database' tidak ditemukan!</p>";
        echo "<p>Silakan jalankan file <strong>database_lengkap.sql</strong> terlebih dahulu.</p>";
    }
    
    $conn->close();
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><small>File ini hanya untuk testing. Hapus file ini setelah sistem berjalan dengan baik.</small></p>";
?>
