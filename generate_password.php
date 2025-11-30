<?php
/**
 * File untuk generate password hash
 * Jalankan file ini untuk mendapatkan hash password yang benar
 */

$password = 'password';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h2>Password Hash Generator</h2>";
echo "<hr>";
echo "<p>Password: <strong>$password</strong></p>";
echo "<p>Hash: <strong>$hash</strong></p>";
echo "<hr>";
echo "<p>Copy hash di atas dan gunakan untuk update password di database</p>";
echo "<p>Atau jalankan query SQL berikut di phpMyAdmin:</p>";
echo "<pre>";
echo "UPDATE user SET password = '$hash' WHERE username = 'admin';\n";
echo "UPDATE user SET password = '$hash' WHERE role = 'mahasiswa';\n";
echo "UPDATE user SET password = '$hash' WHERE role = 'dosen';\n";
echo "</pre>";
?>
