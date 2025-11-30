# Panduan Instalasi Sistem Perkuliahan

## Sistem Informasi Perkuliahan dengan CodeIgniter 4

Sistem ini dibuat untuk mengelola jadwal kelas, rencana studi, penilaian dan hasil studi pada perkuliahan dengan fitur multi-role (Admin, Mahasiswa, Dosen).

## Fitur Utama

### 1. Role Admin
- CRUD Mahasiswa
- CRUD Dosen
- CRUD Ruangan
- CRUD Jadwal

### 2. Role Mahasiswa
- Membuat Rencana Studi (mengambil mata kuliah)
- Melihat Hasil Studi dengan perhitungan IPK

### 3. Role Dosen
- Melihat Jadwal Mengajar
- Mengisi Nilai Mahasiswa

## Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- MySQL/MariaDB
- WAMP Server (sudah terinstall)
- Composer (untuk dependency management)

## Langkah Instalasi

### 1. Persiapan Database

Jalankan SQL berikut di phpMyAdmin atau MySQL client:

```sql
CREATE DATABASE kuliah;
```

Kemudian jalankan file SQL yang sudah disediakan:
- Jalankan struktur tabel dari instruksi tugas
- Jalankan `data_simulasi.sql` untuk data contoh

### 2. Konfigurasi Database

File `.env` sudah dikonfigurasi dengan setting berikut:

```
database.default.hostname = localhost
database.default.database = kuliah
database.default.username = root
database.default.password = 
```

Jika password MySQL Anda berbeda, edit file `.env` dan ubah bagian `database.default.password`.

### 3. Jalankan Aplikasi

1. Pastikan WAMP Server sudah running
2. Akses aplikasi melalui browser:
   ```
   http://localhost/[nama-folder-project]/public
   ```

## Akun Login Default

### Admin
- Username: `admin`
- Password: `password`

### Mahasiswa (contoh)
- Username: `2101001` (NIM)
- Password: `password`

### Dosen (contoh)
- Username: `0101018801` (NIDN)
- Password: `password`

## Struktur Database

### Tabel-tabel:
1. **user** - Menyimpan data login semua user
2. **mahasiswa** - Data mahasiswa
3. **dosen** - Data dosen
4. **mata_kuliah** - Data mata kuliah
5. **ruangan** - Data ruangan
6. **jadwal** - Jadwal perkuliahan
7. **rencana_studi** - Rencana studi mahasiswa
8. **nilai_mutu** - Konversi nilai huruf ke nilai mutu

## Fitur Tambahan

- Desain modern dan responsive dengan Bootstrap 5
- Gradient color scheme yang menarik
- Icon dari Bootstrap Icons
- Alert notification otomatis
- Validasi form
- Perhitungan IPK otomatis

## Catatan Penting

1. Semua password default adalah `password` (sudah di-hash)
2. Sistem menggunakan session untuk autentikasi
3. Filter middleware untuk proteksi route berdasarkan role
4. Relasi database menggunakan Foreign Key

## Troubleshooting

### Error "Base table or view not found"
- Pastikan database `kuliah` sudah dibuat
- Pastikan semua tabel sudah dibuat dengan benar

### Error "Access denied for user"
- Periksa konfigurasi database di file `.env`
- Pastikan username dan password MySQL benar

### Halaman blank/error 500
- Periksa file log di `writable/logs/`
- Pastikan folder `writable` memiliki permission yang benar

## Pengembangan Lebih Lanjut

Anda dapat menambahkan fitur:
- Export data ke Excel/PDF
- Cetak KHS (Kartu Hasil Studi)
- Notifikasi email
- Upload foto profil
- Dan lain-lain

## Kontak

Jika ada pertanyaan atau masalah, silakan hubungi pengembang.

---
Dibuat dengan ❤️ menggunakan CodeIgniter 4
