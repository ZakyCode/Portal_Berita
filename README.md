# 📰 Portal Berita - Laravel CRUD

Portal Berita adalah aplikasi sederhana berbasis web menggunakan **Laravel** untuk mengelola berita.  
Fitur utama:
- Tambah berita
- Lihat daftar berita
- Edit berita
- Hapus berita

---

## ⚙️ Teknologi
- PHP 8.x
- Laravel 11
- MySQL / MariaDB
- Bootstrap 5 (opsional untuk tampilan)

---

## 🚀 Tahapan Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/portal-berita.git
   cd portal-berita
   
2.    **Install Dependency**
   
    composer install

3.    **Buat File Environment**

    cp .env.example .env


4.    Atur Database

    Edit .env:

    DB_DATABASE=portal_berita
    DB_USERNAME=root
    DB_PASSWORD=

5.    Generate Key

    php artisan key:generate

6.    Migrate Database

    php artisan migrate

▶️ Cara Menjalankan

1.    Jalankan server Laravel:

    php artisan serve

2.    Akses aplikasi di browser:

    http://127.0.0.1:8000

3.    CRUD berita tersedia di menu /news.
