-- Data Simulasi untuk Sistem Perkuliahan
-- Jalankan setelah membuat database dan tabel

USE kuliah;

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
INSERT INTO user (nama_user, username, password, role) VALUES
('Administrator', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
-- Password: password

-- Insert Mahasiswa
INSERT INTO mahasiswa (nim, nama) VALUES
('2101001', 'Budi Santoso'),
('2101002', 'Siti Nurhaliza'),
('2101003', 'Ahmad Fauzi'),
('2101004', 'Dewi Lestari'),
('2101005', 'Rizki Pratama');

-- Insert User Mahasiswa
INSERT INTO user (nama_user, username, password, role) VALUES
('Budi Santoso', '2101001', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mahasiswa'),
('Siti Nurhaliza', '2101002', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mahasiswa'),
('Ahmad Fauzi', '2101003', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mahasiswa'),
('Dewi Lestari', '2101004', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mahasiswa'),
('Rizki Pratama', '2101005', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mahasiswa');

-- Insert Dosen
INSERT INTO dosen (nidn, nama) VALUES
('0101018801', 'Dr. Agus Setiawan, M.Kom'),
('0102019002', 'Prof. Sri Wahyuni, M.T'),
('0103019103', 'Drs. Bambang Hermanto, M.Sc');

-- Insert User Dosen
INSERT INTO user (nama_user, username, password, role) VALUES
('Dr. Agus Setiawan, M.Kom', '0101018801', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dosen'),
('Prof. Sri Wahyuni, M.T', '0102019002', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dosen'),
('Drs. Bambang Hermanto, M.Sc', '0103019103', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dosen');

-- Insert Mata Kuliah
INSERT INTO mata_kuliah (kode_mata_kuliah, nama_mata_kuliah, sks) VALUES
('IF101', 'Pemrograman Web', 3),
('IF102', 'Basis Data', 3),
('IF103', 'Struktur Data', 3),
('IF104', 'Jaringan Komputer', 3),
('IF105', 'Sistem Operasi', 3);

-- Insert Ruangan
INSERT INTO ruangan (nama_ruangan) VALUES
('R.101'),
('R.102'),
('R.103'),
('Lab Komputer 1'),
('Lab Komputer 2');

-- Insert Jadwal
INSERT INTO jadwal (nama_kelas, id_mata_kuliah, id_ruangan, nidn, hari, jam) VALUES
('A', 1, 4, '0101018801', 'Senin', '08:00-10:30'),
('B', 1, 4, '0101018801', 'Selasa', '08:00-10:30'),
('A', 2, 5, '0102019002', 'Rabu', '10:30-13:00'),
('A', 3, 1, '0103019103', 'Kamis', '08:00-10:30'),
('A', 4, 2, '0102019002', 'Jumat', '08:00-10:30'),
('A', 5, 3, '0103019103', 'Senin', '13:00-15:30');

-- Insert Rencana Studi (Mahasiswa mengambil mata kuliah)
INSERT INTO rencana_studi (nim, id_jadwal, nilai_angka, nilai_huruf) VALUES
-- Budi Santoso (2101001)
('2101001', 1, 85, 'A'),
('2101001', 3, 78, 'B+'),
('2101001', 4, 82, 'A-'),

-- Siti Nurhaliza (2101002)
('2101002', 1, 90, 'A'),
('2101002', 3, 88, 'A'),
('2101002', 5, 85, 'A'),

-- Ahmad Fauzi (2101003)
('2101003', 2, 75, 'B'),
('2101003', 4, 80, 'A-'),
('2101003', 6, NULL, NULL),

-- Dewi Lestari (2101004)
('2101004', 1, 92, 'A'),
('2101004', 3, NULL, NULL),

-- Rizki Pratama (2101005)
('2101005', 2, 70, 'B-'),
('2101005', 5, 77, 'B+');
