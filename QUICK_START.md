# 🚀 Quick Start Guide

Panduan cepat untuk menjalankan Sistem Perkuliahan dalam 5 menit!

## ⚡ Langkah Cepat

### 1️⃣ Pastikan WAMP/XAMPP Running
- Jalankan WAMP atau XAMPP
- Pastikan Apache dan MySQL aktif (icon hijau)

### 2️⃣ Import Database
1. Buka browser, akses: `http://localhost/phpmyadmin`
2. Klik tab "Import"
3. Pilih file `database_lengkap.sql`
4. Klik "Go" atau "Kirim"
5. Tunggu sampai selesai (akan muncul pesan sukses)

### 3️⃣ Cek Koneksi (Opsional)
Akses: `http://localhost/[nama-folder-project]/test_koneksi.php`

Jika muncul centang hijau semua, berarti berhasil! ✅

### 4️⃣ Jalankan Aplikasi
Akses: `http://localhost/[nama-folder-project]/public`

### 5️⃣ Login
Pilih salah satu akun:

**Admin:**
- Username: `admin`
- Password: `password`

**Mahasiswa:**
- Username: `2101001`
- Password: `password`

**Dosen:**
- Username: `0101018801`
- Password: `password`

## ✅ Selesai!

Sistem sudah siap digunakan. Selamat mencoba! 🎉

---

## 🔧 Jika Ada Masalah

### Error "Access Denied"
Edit file `.env`, ubah baris:
```
database.default.password = 
```
Isi dengan password MySQL Anda (jika ada)

### Error "Database not found"
Ulangi langkah import database (langkah 2)

### Halaman Blank
1. Cek folder `writable` ada permission write
2. Lihat error di `writable/logs/log-[tanggal].log`

### Masih Error?
Baca dokumentasi lengkap di:
- `PANDUAN_INSTALASI.md` - Instalasi detail
- `CARA_PENGGUNAAN.md` - Tutorial penggunaan

---

## 📱 Akses dari HP/Device Lain

1. Cari IP komputer Anda:
   - Windows: Buka CMD, ketik `ipconfig`
   - Cari "IPv4 Address" (contoh: 192.168.1.100)

2. Di HP/device lain (harus 1 jaringan):
   ```
   http://192.168.1.100/[nama-folder-project]/public
   ```

---

## 🎯 Apa yang Bisa Dilakukan?

### Sebagai Admin:
- Tambah/Edit/Hapus Mahasiswa
- Tambah/Edit/Hapus Dosen
- Tambah/Edit/Hapus Ruangan
- Buat/Edit/Hapus Jadwal Kuliah

### Sebagai Mahasiswa:
- Ambil Mata Kuliah (KRS)
- Lihat Jadwal Kuliah
- Lihat Nilai & IPK

### Sebagai Dosen:
- Lihat Jadwal Mengajar
- Input Nilai Mahasiswa

---

## 💡 Tips

1. **Untuk Testing:**
   - Login sebagai admin dulu
   - Cek semua data sudah ada
   - Coba login sebagai mahasiswa dan dosen

2. **Untuk Demo:**
   - Gunakan data yang sudah ada
   - Tunjukkan fitur CRUD di admin
   - Tunjukkan perhitungan IPK di mahasiswa

3. **Untuk Development:**
   - Backup database sebelum ubah struktur
   - Test di localhost dulu
   - Cek log error di `writable/logs/`

---

## 📞 Butuh Bantuan?

Baca dokumentasi lengkap:
1. `README_PROJECT.md` - Overview project
2. `PANDUAN_INSTALASI.md` - Instalasi detail
3. `CARA_PENGGUNAAN.md` - Tutorial lengkap

---

**Happy Coding! 🚀**
