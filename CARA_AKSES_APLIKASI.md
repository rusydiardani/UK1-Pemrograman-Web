# 🌐 Cara Akses Aplikasi yang Benar

## ❌ URL yang SALAH
```
http://localhost:5080/authenticate  ❌ SALAH!
http://localhost:8080/              ❌ SALAH!
```

## ✅ URL yang BENAR

### Untuk Akses Aplikasi:
```
http://localhost/kuliah_ci4/public/
```

atau

```
http://localhost/kuliah_ci4/public/login
```

## 📋 Langkah-Langkah Akses

### 1. Pastikan WAMP Server Running
- Klik icon WAMP di system tray
- Pastikan icon berwarna **HIJAU** (bukan orange/merah)
- Jika orange/merah, klik "Start All Services"

### 2. Buka Browser
Buka browser favorit Anda (Chrome, Firefox, Edge, dll)

### 3. Ketik URL yang Benar
```
http://localhost/kuliah_ci4/public/
```

### 4. Halaman Login Akan Muncul
Anda akan melihat halaman login dengan desain gradient ungu

### 5. Login dengan Akun Default

**Admin:**
- Username: `admin`
- Password: `password`

**Mahasiswa:**
- Username: `2101001`
- Password: `password`

**Dosen:**
- Username: `0101018801`
- Password: `password`

## 🔧 Troubleshooting

### Error "This site can't be reached"
**Penyebab:** WAMP Server tidak running atau URL salah

**Solusi:**
1. Pastikan WAMP icon hijau
2. Test akses: `http://localhost/` (harus muncul halaman WAMP)
3. Jika muncul, lanjut ke: `http://localhost/kuliah_ci4/public/`

### Error "404 Not Found"
**Penyebab:** Folder atau file tidak ditemukan

**Solusi:**
1. Cek folder ada di: `C:\wamp64\www\kuliah_ci4\`
2. Cek folder `public` ada di dalam folder project
3. Pastikan URL lengkap dengan `/public/`

### Error "Database connection failed"
**Penyebab:** MySQL tidak running atau konfigurasi salah

**Solusi:**
1. Pastikan MySQL service running di WAMP
2. Cek konfigurasi di file `.env`
3. Test koneksi dengan: `http://localhost/kuliah_ci4/test_koneksi.php`

### Halaman Blank/Putih
**Penyebab:** Error PHP atau permission

**Solusi:**
1. Cek error log di: `writable/logs/log-[tanggal].log`
2. Pastikan folder `writable` bisa di-write
3. Aktifkan error display di `.env`: `CI_ENVIRONMENT = development`

## 📱 Akses dari Device Lain (HP/Tablet)

### 1. Cari IP Komputer
Buka CMD, ketik:
```
ipconfig
```
Cari "IPv4 Address", contoh: `192.168.1.100`

### 2. Akses dari HP
Pastikan HP dan komputer dalam 1 jaringan WiFi yang sama, lalu buka:
```
http://192.168.1.100/kuliah_ci4/public/
```

## 🎯 Bookmark URL Penting

Simpan URL ini di bookmark browser:

1. **Login:** `http://localhost/kuliah_ci4/public/login`
2. **Dashboard:** `http://localhost/kuliah_ci4/public/dashboard`
3. **Test Koneksi:** `http://localhost/kuliah_ci4/test_koneksi.php`
4. **phpMyAdmin:** `http://localhost/phpmyadmin`

## 📝 Catatan Penting

1. **Selalu gunakan `/public/` di akhir URL**
   - Benar: `http://localhost/kuliah_ci4/public/`
   - Salah: `http://localhost/kuliah_ci4/`

2. **Port default WAMP adalah 80**
   - Tidak perlu tulis port: `http://localhost/` (bukan `http://localhost:80/`)
   - Kecuali WAMP dikonfigurasi pakai port lain

3. **Jangan akses file PHP langsung**
   - Salah: `http://localhost/kuliah_ci4/app/Controllers/Auth.php`
   - Benar: `http://localhost/kuliah_ci4/public/login`

4. **Gunakan route yang sudah didefinisikan**
   - `/login` - Halaman login
   - `/dashboard` - Dashboard (setelah login)
   - `/logout` - Logout
   - `/admin/mahasiswa` - Data mahasiswa (admin)
   - dll.

## ✅ Checklist Sebelum Akses

- [ ] WAMP icon hijau
- [ ] Apache service running
- [ ] MySQL service running
- [ ] Database `kuliah` sudah diimport
- [ ] File `.env` sudah dikonfigurasi
- [ ] URL menggunakan `/public/`

## 🚀 Quick Start

1. Start WAMP (icon hijau)
2. Buka: `http://localhost/kuliah_ci4/public/`
3. Login: `admin` / `password`
4. Selesai! ✅

---

**Jika masih ada masalah, screenshot error dan cek file log di `writable/logs/`**
