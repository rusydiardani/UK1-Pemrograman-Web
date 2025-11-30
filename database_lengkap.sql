-- Database Lengkap Sistem Perkuliahan
-- Jalankan file ini untuk membuat database, tabel, dan data simulasi

CREATE DATABASE IF NOT EXISTS kuliah;
USE kuliah;

-- Hapus tabel jika sudah ada (untuk fresh install)
DROP TABLE IF EXISTS rencana_studi;
DROP TABLE IF EXISTS nilai_mutu;
DROP TABLE IF EXISTS jadwal;
DROP TABLE IF EXISTS ruangan;
DROP TABLE IF EXISTS mata_kuliah;
DROP TABLE IF EXISTS dosen;
DROP TABLE IF EXISTS mahasiswa;
DROP TABLE IF EXISTS user;

-- Tabel User
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama_user VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'mahasiswa', 'dosen')
);

-- Tabel Mahasiswa
CREATE TABLE mahasiswa (
    nim CHAR(10) PRIMARY KEY,
    nama VARCHAR(100)
);

-- Tabel Dosen
CREATE TABLE dosen (
    nidn CHAR(10) PRIMARY KEY,
    nama VARCHAR(100)
);

-- Tabel Mata Kuliah
CREATE TABLE mata_kuliah (
    id_mata_kuliah INT AUTO_INCREMENT PRIMARY KEY,
    kode_mata_kuliah VARCHAR(10),
    nama_mata_kuliah VARCHAR(100),
    sks INT
);

-- Tabel Ruangan
CREATE TABLE ruangan (
    id_ruangan INT AUTO_INCREMENT PRIMARY KEY,
    nama_ruangan VARCHAR(50)
);

-- Tabel Jadwal
CREATE TABLE jadwal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50),
    id_mata_kuliah INT,
    id_ruangan INT,
    nidn CHAR(10),
    hari VARCHAR(20),
    jam VARCHAR(20),
    FOREIGN KEY (id_mata_kuliah) REFERENCES mata_kuliah(id_mata_kuliah) ON DELETE CASCADE,
    FOREIGN KEY (id_ruangan) REFERENCES ruangan(id_ruangan) ON DELETE CASCADE,
    FOREIGN KEY (nidn) REFERENCES dosen(nidn) ON DELETE CASCADE
);

-- Tabel Nilai Mutu
CREATE TABLE nilai_mutu (
    nilai_huruf CHAR(2) PRIMARY KEY,
    nilai_mutu FLOAT
);

-- Tabel Rencana Studi
CREATE TABLE rencana_studi (
    id_rencana_studi INT AUTO_INCREMENT PRIMARY KEY,
    nim CHAR(10),
    id_jadwal INT,
    nilai_angka FLOAT DEFAULT NULL,
    nilai_huruf CHAR(2) DEFAULT NULL,
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE,
    FOREIGN KEY (id_jadwal) REFERENCES jadwal(id) ON DELETE CASCADE
);

-- ========================================
-- INSERT DATA SIMULASI
-- ========================================

-- Insert Nilai Mutu
INSERT INTO nilai_mutu (nilai_huruf, nilai_mutu) VALUES
('A', 4.0),
('A-', 3.7),
('B+', 3.3),
('B', 3.0),
('B-', 2.7),
('C+', 2.3),
('C', 2.0),
('D', 1.0),
('E', 0.0);

-- Insert User Admin
-- Password: password
INSERT INTO user (nama_user, username, password, role) VALUES
('Administrator', 'admin', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'admin');

-- Insert Mahasiswa
INSERT INTO mahasiswa (nim, nama) VALUES
('2101001', 'Budi Santoso'),
('2101002', 'Siti Nurhaliza'),
('2101003', 'Ahmad Fauzi'),
('2101004', 'Dewi Lestari'),
('2101005', 'Rizki Pratama'),
('2101006', 'Andi Wijaya'),
('2101007', 'Maya Sari'),
('2101008', 'Doni Prasetyo');

-- Insert User Mahasiswa (Password: password)
INSERT INTO user (nama_user, username, password, role) VALUES
('Budi Santoso', '2101001', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Siti Nurhaliza', '2101002', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Ahmad Fauzi', '2101003', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Dewi Lestari', '2101004', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Rizki Pratama', '2101005', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Andi Wijaya', '2101006', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Maya Sari', '2101007', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa'),
('Doni Prasetyo', '2101008', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'mahasiswa');

-- Insert Dosen
INSERT INTO dosen (nidn, nama) VALUES
('0101018801', 'Dr. Agus Setiawan, M.Kom'),
('0102019002', 'Prof. Sri Wahyuni, M.T'),
('0103019103', 'Drs. Bambang Hermanto, M.Sc'),
('0104019204', 'Dr. Rina Kusuma, M.Kom'),
('0105019305', 'Ir. Hadi Santoso, M.T');

-- Insert User Dosen (Password: password)
INSERT INTO user (nama_user, username, password, role) VALUES
('Dr. Agus Setiawan, M.Kom', '0101018801', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'dosen'),
('Prof. Sri Wahyuni, M.T', '0102019002', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'dosen'),
('Drs. Bambang Hermanto, M.Sc', '0103019103', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'dosen'),
('Dr. Rina Kusuma, M.Kom', '0104019204', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'dosen'),
('Ir. Hadi Santoso, M.T', '0105019305', '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC', 'dosen');

-- Insert Mata Kuliah
INSERT INTO mata_kuliah (kode_mata_kuliah, nama_mata_kuliah, sks) VALUES
('IF101', 'Pemrograman Web', 3),
('IF102', 'Basis Data', 3),
('IF103', 'Struktur Data', 3),
('IF104', 'Jaringan Komputer', 3),
('IF105', 'Sistem Operasi', 3),
('IF106', 'Algoritma Pemrograman', 3),
('IF107', 'Pemrograman Mobile', 3),
('IF108', 'Kecerdasan Buatan', 3);

-- Insert Ruangan
INSERT INTO ruangan (nama_ruangan) VALUES
('R.101'),
('R.102'),
('R.103'),
('R.104'),
('Lab Komputer 1'),
('Lab Komputer 2'),
('Lab Komputer 3'),
('Aula');

-- Insert Jadwal
INSERT INTO jadwal (nama_kelas, id_mata_kuliah, id_ruangan, nidn, hari, jam) VALUES
('A', 1, 5, '0101018801', 'Senin', '08:00-10:30'),
('B', 1, 5, '0101018801', 'Selasa', '08:00-10:30'),
('A', 2, 6, '0102019002', 'Rabu', '10:30-13:00'),
('B', 2, 6, '0102019002', 'Kamis', '10:30-13:00'),
('A', 3, 1, '0103019103', 'Kamis', '08:00-10:30'),
('A', 4, 2, '0104019204', 'Jumat', '08:00-10:30'),
('A', 5, 3, '0105019305', 'Senin', '13:00-15:30'),
('A', 6, 7, '0101018801', 'Selasa', '13:00-15:30'),
('A', 7, 7, '0104019204', 'Rabu', '08:00-10:30'),
('A', 8, 4, '0103019103', 'Jumat', '13:00-15:30');

-- Insert Rencana Studi dengan Nilai
INSERT INTO rencana_studi (nim, id_jadwal, nilai_angka, nilai_huruf) VALUES
-- Budi Santoso (2101001) - Sudah ada nilai
('2101001', 1, 85, 'A'),
('2101001', 3, 78, 'B+'),
('2101001', 5, 82, 'A-'),
('2101001', 6, 88, 'A'),

-- Siti Nurhaliza (2101002) - Sudah ada nilai
('2101002', 1, 90, 'A'),
('2101002', 3, 88, 'A'),
('2101002', 6, 85, 'A'),
('2101002', 8, 92, 'A'),

-- Ahmad Fauzi (2101003) - Sebagian sudah dinilai
('2101003', 2, 75, 'B'),
('2101003', 5, 80, 'A-'),
('2101003', 7, NULL, NULL),
('2101003', 10, NULL, NULL),

-- Dewi Lestari (2101004) - Sebagian sudah dinilai
('2101004', 1, 92, 'A'),
('2101004', 3, 85, 'A'),
('2101004', 9, NULL, NULL),

-- Rizki Pratama (2101005)
('2101005', 2, 70, 'B-'),
('2101005', 6, 77, 'B+'),
('2101005', 8, 82, 'A-'),

-- Andi Wijaya (2101006)
('2101006', 1, 88, 'A'),
('2101006', 5, 75, 'B'),
('2101006', 7, NULL, NULL),

-- Maya Sari (2101007)
('2101007', 2, 90, 'A'),
('2101007', 4, 85, 'A'),
('2101007', 9, NULL, NULL),

-- Doni Prasetyo (2101008)
('2101008', 3, 78, 'B+'),
('2101008', 6, 80, 'A-'),
('2101008', 10, NULL, NULL);

-- Tampilkan ringkasan data
SELECT 'Data berhasil diinsert!' as Status;
SELECT COUNT(*) as 'Total User' FROM user;
SELECT COUNT(*) as 'Total Mahasiswa' FROM mahasiswa;
SELECT COUNT(*) as 'Total Dosen' FROM dosen;
SELECT COUNT(*) as 'Total Mata Kuliah' FROM mata_kuliah;
SELECT COUNT(*) as 'Total Ruangan' FROM ruangan;
SELECT COUNT(*) as 'Total Jadwal' FROM jadwal;
SELECT COUNT(*) as 'Total Rencana Studi' FROM rencana_studi;
