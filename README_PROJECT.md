# 🎓 Sistem Informasi Perkuliahan

Sistem manajemen perkuliahan berbasis web menggunakan **CodeIgniter 4** dengan fitur lengkap untuk mengelola jadwal kelas, rencana studi, penilaian dan hasil studi.

## ✨ Fitur Utama

### 👨‍💼 Admin
- ✅ CRUD Data Mahasiswa
- ✅ CRUD Data Dosen  
- ✅ CRUD Data Ruangan
- ✅ CRUD Jadwal Kuliah

### 👨‍🎓 Mahasiswa
- ✅ Membuat Rencana Studi (KRS)
- ✅ Melihat Hasil Studi & IPK
- ✅ Perhitungan IPK Otomatis

### 👨‍🏫 Dosen
- ✅ Melihat Jadwal Mengajar
- ✅ Input & Update Nilai Mahasiswa

## 🎨 Teknologi

- **Framework:** CodeIgniter 4
- **Database:** MySQL
- **Frontend:** Bootstrap 5 + Bootstrap Icons
- **Design:** Modern gradient UI dengan responsive layout

## 📋 Persyaratan Sistem

- PHP 8.1 atau lebih tinggi
- MySQL/MariaDB
- WAMP/XAMPP Server
- Web Browser modern

## 🚀 Instalasi Cepat

### 1. Setup Database
1. Buka phpMyAdmin
2. Import file `database_lengkap.sql`
3. Database `kuliah` akan otomatis dibuat beserta data simulasi

### 2. Konfigurasi
File `.env` sudah dikonfigurasi. Jika password MySQL berbeda, edit:
```
database.default.password = [password-anda]
```

### 3. Jalankan Aplikasi
```
http://localhost/[nama-folder-project]/public
```

## 🔐 Akun Login Default

| Role | Username | Password |
|------|----------|----------|
| Admin | admin | password |
| Mahasiswa | 2101001 | password |
| Dosen | 0101018801 | password |

## 📚 Dokumentasi Lengkap

- **[PANDUAN_INSTALASI.md](PANDUAN_INSTALASI.md)** - Panduan instalasi detail
- **[CARA_PENGGUNAAN.md](CARA_PENGGUNAAN.md)** - Tutorial penggunaan untuk setiap role

## 🗄️ Struktur Database

### Tabel Utama:
- `user` - Data login semua pengguna
- `mahasiswa` - Data mahasiswa
- `dosen` - Data dosen
- `mata_kuliah` - Data mata kuliah
- `ruangan` - Data ruangan
- `jadwal` - Jadwal perkuliahan
- `rencana_studi` - KRS mahasiswa
- `nilai_mutu` - Konversi nilai huruf ke mutu

## 🎯 Fitur Unggulan

✨ **Multi-Role Authentication** - Login berbeda untuk Admin, Mahasiswa, dan Dosen  
✨ **Perhitungan IPK Otomatis** - IPK dihitung real-time berdasarkan nilai  
✨ **Modern UI/UX** - Desain gradient modern dengan animasi smooth  
✨ **Responsive Design** - Tampilan optimal di semua device  
✨ **Data Validation** - Validasi form untuk mencegah error  
✨ **Session Management** - Keamanan dengan session-based auth  

## 🛠️ Troubleshooting

### Database tidak terkoneksi
- Cek konfigurasi di `.env`
- Pastikan MySQL service running
- Jalankan `test_koneksi.php`

### Halaman blank
- Cek folder `writable` memiliki permission yang benar
- Lihat log error di `writable/logs/`

### Tidak bisa login
- Pastikan data user sudah ada di database
- Cek password sudah di-hash dengan benar

## 📝 Catatan Penting

1. Semua password default adalah `password` (sudah di-hash)
2. Data simulasi sudah termasuk dalam `database_lengkap.sql`
3. Hapus file `test_koneksi.php` setelah sistem berjalan
4. Backup database secara berkala

## 📂 File Penting

- `database_lengkap.sql` - Database lengkap dengan data simulasi
- `test_koneksi.php` - File untuk testing koneksi database
- `.env` - Konfigurasi database dan aplikasi
- `PANDUAN_INSTALASI.md` - Panduan instalasi lengkap
- `CARA_PENGGUNAAN.md` - Tutorial penggunaan sistem

## 👨‍💻 Struktur Project

```
project/
├── app/
│   ├── Controllers/
│   │   ├── Admin/          # Controller untuk Admin
│   │   ├── Mahasiswa/      # Controller untuk Mahasiswa
│   │   ├── Dosen/          # Controller untuk Dosen
│   │   ├── Auth.php        # Controller autentikasi
│   │   └── Dashboard.php   # Controller dashboard
│   ├── Models/             # Model untuk database
│   ├── Views/              # View untuk tampilan
│   │   ├── admin/
│   │   ├── mahasiswa/
│   │   ├── dosen/
│   │   ├── auth/
│   │   └── layout/
│   ├── Filters/            # Filter untuk autentikasi
│   └── Config/             # Konfigurasi aplikasi
├── public/                 # Folder public (entry point)
├── writable/               # Folder untuk log dan cache
└── database_lengkap.sql    # File SQL database
```

## 🔄 Cara Menggunakan

### Sebagai Admin:
1. Login dengan username `admin`
2. Kelola data mahasiswa, dosen, ruangan, dan jadwal
3. Buat jadwal kuliah untuk setiap mata kuliah

### Sebagai Mahasiswa:
1. Login dengan NIM (contoh: `2101001`)
2. Pilih mata kuliah di menu Rencana Studi
3. Lihat nilai dan IPK di menu Hasil Studi

### Sebagai Dosen:
1. Login dengan NIDN (contoh: `0101018801`)
2. Lihat jadwal mengajar
3. Input nilai mahasiswa untuk setiap kelas

## 📊 Data Simulasi

Database sudah terisi dengan:
- 1 Admin
- 8 Mahasiswa
- 5 Dosen
- 8 Mata Kuliah
- 8 Ruangan
- 10 Jadwal
- Data rencana studi dan nilai

## 🎓 Implementasi Tugas

Project ini mengimplementasikan:
- ✅ MVC Pattern (Model-View-Controller)
- ✅ CRUD Operations (Create, Read, Update, Delete)
- ✅ Fitur Login dengan Session
- ✅ Multi Role (Admin, Mahasiswa, Dosen)
- ✅ Relasi Data (Primary Key, Foreign Key)
- ✅ Perhitungan IPK otomatis
- ✅ Desain modern dan responsive

---

**Dibuat dengan ❤️ menggunakan CodeIgniter 4**

Untuk pertanyaan atau bantuan, silakan baca dokumentasi lengkap di file PANDUAN_INSTALASI.md dan CARA_PENGGUNAAN.md
