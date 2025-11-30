-- File untuk memperbaiki password di database
-- Jalankan file ini di phpMyAdmin setelah import database_lengkap.sql
-- Semua password akan di-set menjadi: password

USE kuliah;

-- Update password untuk semua user
-- Hash ini adalah hasil dari password_hash('password', PASSWORD_DEFAULT)
UPDATE user SET password = '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC';

-- Verifikasi
SELECT username, role, 'password' as password_text FROM user;

-- Pesan sukses
SELECT 'Password berhasil diupdate! Semua user sekarang menggunakan password: password' as Status;
