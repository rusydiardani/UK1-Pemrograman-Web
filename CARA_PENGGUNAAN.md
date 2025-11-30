# Cara Penggunaan Sistem Perkuliahan

## Akses Sistem

Buka browser dan akses:
```
http://localhost/[nama-folder-project]/public
```

## Login ke Sistem

### Sebagai Admin
1. Username: `admin`
2. Password: `password`
3. Klik tombol Login

### Sebagai Mahasiswa
1. Username: NIM mahasiswa (contoh: `2101001`)
2. Password: `password`
3. Klik tombol Login

### Sebagai Dosen
1. Username: NIDN dosen (contoh: `0101018801`)
2. Password: `password`
3. Klik tombol Login

---

## Panduan untuk ADMIN

### 1. Mengelola Data Mahasiswa

#### Menambah Mahasiswa Baru
1. Klik menu "Data Mahasiswa" di sidebar
2. Klik tombol "Tambah Mahasiswa"
3. Isi form:
   - NIM (akan digunakan sebagai username)
   - Nama
   - Password (untuk login mahasiswa)
4. Klik "Simpan"

#### Mengedit Data Mahasiswa
1. Klik menu "Data Mahasiswa"
2. Klik tombol "Edit" pada mahasiswa yang ingin diubah
3. Ubah nama mahasiswa
4. Klik "Update"

#### Menghapus Mahasiswa
1. Klik menu "Data Mahasiswa"
2. Klik tombol "Hapus" pada mahasiswa yang ingin dihapus
3. Konfirmasi penghapusan

### 2. Mengelola Data Dosen

Cara yang sama dengan mengelola mahasiswa:
- Tambah: Isi NIDN, Nama, dan Password
- Edit: Ubah nama dosen
- Hapus: Konfirmasi penghapusan

### 3. Mengelola Data Ruangan

#### Menambah Ruangan
1. Klik menu "Data Ruangan"
2. Klik "Tambah Ruangan"
3. Isi nama ruangan (contoh: R.101, Lab Komputer 1)
4. Klik "Simpan"

### 4. Mengelola Jadwal Kuliah

#### Membuat Jadwal Baru
1. Klik menu "Data Jadwal"
2. Klik "Tambah Jadwal"
3. Isi form:
   - Nama Kelas (A, B, C, dll)
   - Pilih Mata Kuliah
   - Pilih Dosen Pengampu
   - Pilih Ruangan
   - Pilih Hari
   - Isi Jam (format: 08:00-10:30)
4. Klik "Simpan"

#### Mengedit Jadwal
1. Klik menu "Data Jadwal"
2. Klik tombol "Edit" pada jadwal yang ingin diubah
3. Ubah data yang diperlukan
4. Klik "Update"

---

## Panduan untuk MAHASISWA

### 1. Membuat Rencana Studi (Mengambil Mata Kuliah)

1. Login sebagai mahasiswa
2. Klik menu "Rencana Studi"
3. Klik tombol "Tambah Mata Kuliah"
4. Pilih jadwal mata kuliah yang ingin diambil
5. Klik "Simpan"

**Catatan:** 
- Anda hanya bisa mengambil mata kuliah yang belum diambil
- Perhatikan jadwal agar tidak bentrok

### 2. Melihat Rencana Studi

1. Klik menu "Rencana Studi"
2. Akan tampil daftar mata kuliah yang sudah diambil
3. Informasi yang ditampilkan:
   - Kode dan Nama Mata Kuliah
   - SKS
   - Kelas
   - Dosen Pengampu
   - Ruangan
   - Jadwal (Hari dan Jam)
   - Total SKS yang diambil

### 3. Menghapus Mata Kuliah dari Rencana Studi

1. Klik menu "Rencana Studi"
2. Klik tombol "Hapus" pada mata kuliah yang ingin dibatalkan
3. Konfirmasi penghapusan

### 4. Melihat Hasil Studi dan IPK

1. Klik menu "Hasil Studi"
2. Akan tampil:
   - **IPK (Indeks Prestasi Kumulatif)** - Dihitung otomatis
   - **Total SKS** yang sudah diambil
   - Detail nilai setiap mata kuliah:
     - Nilai Angka (0-100)
     - Nilai Huruf (A, B+, B, dll)
     - Nilai Mutu (untuk perhitungan IPK)

**Rumus IPK:**
```
IPK = Total (Nilai Mutu × SKS) / Total SKS
```

**Contoh:**
- Mata Kuliah 1: Nilai A (4.0) × 3 SKS = 12
- Mata Kuliah 2: Nilai B+ (3.3) × 3 SKS = 9.9
- Total: 21.9 / 6 SKS = **IPK 3.65**

---

## Panduan untuk DOSEN

### 1. Melihat Jadwal Mengajar

1. Login sebagai dosen
2. Klik menu "Jadwal Mengajar"
3. Akan tampil semua jadwal mengajar Anda:
   - Kode dan Nama Mata Kuliah
   - SKS
   - Kelas
   - Ruangan
   - Jadwal (Hari dan Jam)

### 2. Mengisi Nilai Mahasiswa

1. Klik menu "Jadwal Mengajar"
2. Klik tombol "Input Nilai" pada jadwal yang ingin dinilai
3. Akan tampil:
   - Informasi mata kuliah
   - Daftar mahasiswa yang mengambil mata kuliah tersebut
4. Isi nilai untuk setiap mahasiswa:
   - **Nilai Angka:** Isi dengan angka 0-100
   - **Nilai Huruf:** Pilih dari dropdown (A, A-, B+, B, B-, C+, C, D, E)
5. Klik "Simpan Nilai"

**Konversi Nilai:**
- A = 4.0
- A- = 3.7
- B+ = 3.3
- B = 3.0
- B- = 2.7
- C+ = 2.3
- C = 2.0
- D = 1.0
- E = 0.0

### 3. Mengupdate Nilai

1. Klik menu "Jadwal Mengajar"
2. Klik "Input Nilai" pada jadwal yang ingin diupdate
3. Ubah nilai yang sudah ada
4. Klik "Simpan Nilai"

---

## Tips dan Trik

### Untuk Admin
- Buat jadwal terlebih dahulu sebelum mahasiswa melakukan rencana studi
- Pastikan tidak ada jadwal yang bentrok untuk dosen yang sama
- Backup data secara berkala

### Untuk Mahasiswa
- Perhatikan total SKS yang diambil (biasanya maksimal 24 SKS per semester)
- Cek jadwal agar tidak bentrok
- Pantau hasil studi secara berkala

### Untuk Dosen
- Input nilai segera setelah ujian selesai
- Pastikan semua mahasiswa sudah dinilai
- Nilai yang sudah diinput bisa diupdate jika ada kesalahan

---

## Logout

Untuk keluar dari sistem:
1. Klik menu "Logout" di bagian bawah sidebar
2. Anda akan diarahkan kembali ke halaman login

---

## Troubleshooting

### Lupa Password
Hubungi administrator untuk reset password

### Tidak Bisa Login
- Pastikan username dan password benar
- Pastikan database sudah terisi dengan benar
- Cek koneksi database di file `.env`

### Jadwal Tidak Muncul
- Pastikan admin sudah membuat jadwal
- Refresh halaman browser

### IPK Tidak Muncul
- Pastikan dosen sudah mengisi nilai
- IPK hanya dihitung dari mata kuliah yang sudah dinilai

---

## Kontak Support

Jika mengalami masalah teknis, hubungi administrator sistem.

---

**Selamat menggunakan Sistem Perkuliahan!** 🎓
