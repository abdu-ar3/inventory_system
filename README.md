# 🎓 Aplikasi Booking Climbing - Laravel 10

Sistem ini dikembangkan menggunakan **Laravel 10** sebagai backend dan **Sneat Bootstrap Template** sebagai frontend. Aplikasi ini membantu pengelolaan kegiatan belajar-mengajar, termasuk:

- Manajemen kelas
- Booking peserta
- Pengelolaan instruktur
- Feedback dan laporan
- Autentikasi multi-role (Admin, Instruktur, Customer)

---

## 🚀 Fitur Utama

- **Dashboard Admin**: Lihat ringkasan total kelas, peserta, dan pemesanan.
- **Manajemen Kelas**: CRUD paket kelas, kategori, dan pengajar.
- **Manajemen Peserta**: Kelola data user dan partisipasi kelas.
- **Manajemen Booking**: Konfirmasi, batalkan, atau lihat status pemesanan.
- **Manajemen Feedback**: Review umpan balik dari peserta kelas.
- **Autentikasi Role-Based**: Hak akses terpisah untuk Admin, Instruktur, dan Customer.
- **Laporan & Statistik**: Laporan transaksi dan aktivitas.


## 🛠️ Instalasi

1. Clone project ini:
   ```bash
   git clone https://github.com/username/project-laravel.git
   cd project-laravel


🔐 Akun Default
🛡️ Admin
Username/Email: abdhurohman7@gmail.com
Password: 12345678

👨‍🏫 Instruktur 1
Username/Email: aan@gmail.com
Password: 12345678

👨‍🏫 Customer
Username/Email: boy@gmail.com
Password: 12345678

## 🚀 Fitur Utama

- ✅ **Dashboard Admin**: Statistik kelas, booking, dan peserta
- 📚 **Manajemen Kelas**: CRUD paket kelas dan penjadwalan
- 🧑‍🏫 **Manajemen Instruktur**: Tambah dan atur pengajar
- 👥 **Manajemen Peserta**: Daftar peserta kelas
- 📝 **Manajemen Booking**: Konfirmasi, batalkan, atau pantau status pemesanan
- 🌟 **Feedback & Rating**: Tampilkan dan kelola umpan balik peserta
- 🔒 **Autentikasi Role-Based**: Hak akses khusus sesuai peran
- 🧾 **Laporan Transaksi**: Laporan pemesanan dan partisipasi

---

## 🧪 Register Otomatis Role Customer

Setiap pengguna yang melakukan **registrasi via form frontend** akan langsung diberikan role **Customer** (`role_id = 3`) secara otomatis melalui table `role_user`. Jadi, Anda tidak perlu menetapkan role secara manual setelah registrasi.

---
