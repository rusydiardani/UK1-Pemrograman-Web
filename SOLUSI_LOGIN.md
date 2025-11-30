# 🔧 Solusi Masalah Login

## Masalah
Tidak bisa login dengan username/password yang sudah disediakan.

## Penyebab
Password hash di database tidak cocok dengan password yang digunakan.

## ✅ Solusi (Pilih salah satu)

### Solusi 1: Import Ulang Database (RECOMMENDED)

1. **Hapus database lama:**
   - Buka phpMyAdmin: `http://localhost/phpmyadmin`
   - Klik database `kuliah`
   - Klik tab "Operations"
   - Scroll ke bawah, klik "Drop the database (DROP)"
   - Konfirmasi

2. **Import database baru:**
   - Klik tab "Import"
   - Pilih file `database_lengkap.sql` (yang sudah diupdate)
   - Klik "Go"
   - Tunggu sampai selesai

3. **Test Login:**
   - Akses: `http://localhost/[folder]/public`
   - Login dengan:
     - Admin: `admin` / `password`
     - Mahasiswa: `2101001` / `password`
     - Dosen: `0101018801` / `password`

---

### Solusi 2: Update Password Manual

Jika tidak ingin import ulang, jalankan file SQL ini:

1. **Buka phpMyAdmin**
2. **Pilih database `kuliah`**
3. **Klik tab "SQL"**
4. **Import file `fix_password.sql`** atau copy-paste query berikut:

```sql
USE kuliah;

UPDATE user SET password = '$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC';

SELECT 'Password berhasil diupdate!' as Status;
```

5. **Klik "Go"**
6. **Test login**

---

### Solusi 3: Generate Password Baru

Jika ingin membuat password sendiri:

1. **Akses file generator:**
   ```
   http://localhost/[folder]/generate_password.php
   ```

2. **Copy hash yang dihasilkan**

3. **Update di database:**
   ```sql
   UPDATE user SET password = '[hash-yang-dicopy]' WHERE username = 'admin';
   ```

---

## 🧪 Cara Test Apakah Sudah Berhasil

### Test 1: Cek Password di Database
```sql
SELECT username, role, LEFT(password, 20) as password_hash FROM user;
```

Password hash harus dimulai dengan `$2y$10$`

### Test 2: Test Login
1. Buka halaman login
2. Coba login dengan `admin` / `password`
3. Jika berhasil, akan redirect ke dashboard

### Test 3: Test Semua Role
- Admin: `admin` / `password`
- Mahasiswa: `2101001` / `password`
- Dosen: `0101018801` / `password`

---

## 📝 Penjelasan Teknis

### Kenapa Terjadi?
Password di database harus di-hash menggunakan fungsi `password_hash()` PHP. Hash yang dihasilkan berbeda setiap kali dijalankan, tapi tetap bisa diverifikasi dengan `password_verify()`.

### Format Hash
```
$2y$10$Apa/BsY69kXZdvkDkAB.j.71hi/8otvhN4kPkjYbrR7oGCE.2yDWC
```
- `$2y$` = Algoritma bcrypt
- `10` = Cost factor
- Sisanya = Salt dan hash

### Proses Login
1. User input username & password
2. System cari user di database
3. Ambil password hash dari database
4. Verifikasi dengan `password_verify($input, $hash)`
5. Jika cocok, login berhasil

---

## ❓ FAQ

**Q: Kenapa tidak bisa pakai password biasa di database?**  
A: Untuk keamanan. Password harus di-hash agar tidak bisa dibaca langsung.

**Q: Apakah hash password selalu sama?**  
A: Tidak. Setiap kali generate hash baru, hasilnya berbeda. Tapi tetap bisa diverifikasi.

**Q: Bagaimana cara ganti password user?**  
A: 
1. Generate hash baru dengan `generate_password.php`
2. Update di database dengan query UPDATE

**Q: Bisa pakai password lain selain 'password'?**  
A: Bisa. Generate hash untuk password baru, lalu update di database.

---

## 🎯 Kesimpulan

**Solusi Tercepat:**
1. Import ulang `database_lengkap.sql` (yang sudah diupdate)
2. Login dengan `admin` / `password`
3. Selesai! ✅

Jika masih ada masalah, cek:
- Koneksi database di `.env`
- Error log di `writable/logs/`
- Jalankan `test_koneksi.php`

---

**Semoga berhasil! 🚀**
