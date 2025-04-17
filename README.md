# [Link Penjelasan mengenai Aplikasi Buku Tamu Digital](https://youtu.be/CRmalhuUr5o)

# 📚 Buku Tamu Digital 📚 

Aplikasi ini merupakan implementasi sistem Buku Tamu Digital berbasis web menggunakan framework CodeIgniter 3. Aplikasi memungkinkan tamu untuk mengisi formulir data kunjungan dan admin untuk mencatat, melihat, mengedit, dan menghapus data tamu yang berkunjung.

---

## Fitur Utama

✅ **Formulir Buku Tamu**: Input data tamu seperti nama, instansi, tujuan, dan tanggal kunjungan.
✅ **CRUD (Create, Read, Update, Delete)**: Menyimpan, menampilkan, mengedit, dan menghapus data tamu.
✅ **Filter Data Berdasarkan Tanggal**: Admin dapat memfilter data tamu berdasarkan rentang tanggal kunjungan.
✅ **Validasi Manual**: Validasi form dilakukan secara manual di controller menggunakan form_validation bawaan CodeIgniter.
✅ **Flashdata untuk Notifikasi**: Terdapat notifikasi sukses saat data berhasil disimpan, diubah, atau dihapus.
✅ **Antarmuka Ringan & Responsive**: Desain bersih tanpa Bootstrap, menggunakan CSS buatan sendiri di folder `public/assets/`.
✅ **Tanpa Login**: Tidak memerlukan autentikasi login, langsung bisa diakses.
✅ **Konfirmasi Hapus**: Pop-up konfirmasi saat pengguna ingin menghapus data tamu.

---

### Struktur Folder Penting

application/
│
├── controllers/
│   └── Tamu.php
├── models/
│   └── Tamu_model.php
├── views/
│   ├── form_view.php
│   ├── admin_view.php
│   └── edit_view.php
├── config/
│   ├── config.php
│   └── database.php
public/
└── assets/
    └── style.css

---

### Menjalankan Aplikasi

- Jalankan XAMPP/Laragon dan aktifkan Apache & MySQL
- Akses aplikasi melalui browser:
[Localhost](http://localhost/buku-tamu/)
