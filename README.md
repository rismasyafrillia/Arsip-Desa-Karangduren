<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<h2 align="center">Sistem Informasi Arsip Surat</h2>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## Tentang Project
Sistem Informasi Arsip Surat ini dibuat menggunakan **Laravel** untuk membantu desa/kelurahan dalam mengelola arsip surat masuk dan surat keluar. Aplikasi ini memudahkan pencatatan, penyimpanan, pencarian, serta pengelompokan surat dalam kategori tertentu sehingga lebih efisien, aman, dan terstruktur.

---

## Tujuan
- Menyediakan sistem pencatatan arsip surat digital.  
- Mempermudah pencarian arsip dengan fitur filter dan kategori.  
- Mengurangi risiko kehilangan dokumen.  
- Memastikan surat tersimpan dalam format standar (PDF).  

---

## Fitur Utama
- CRUD Surat Masuk & Surat Keluar  
- Upload & Simpan Surat (PDF)  
- Kategori Surat (Penting, Biasa, Rahasia, dll)  
- Pencarian Arsip & Pagination  
- Tampilan sederhana dan mudah digunakan  

---

## Cara Menjalankan
- Clone repository ini  
   ```bash
   **[git clone](https://github.com/rismasyafrillia/Arsip-Desa-Karangduren)
   cd arsip-surat
- Install dependencies
    composer install
    npm install && npm run dev
- Salin file .env.example menjadi .env lalu atur koneksi database.
- Generate key aplikasi
    php artisan key:generate
- Jalankan migrasi database
    php artisan migrate
- Jalankan server Laravel
    php artisan serve

## 🖼 Screenshot

### Daftar Arsip
![Arsip](screenshots/arsip.png)

### Form Tambah Surat
![Form](screenshots/unggah.png)

### Daftar Kategori
![Kategori](screenshots/kategori.png)

### Form Tambah Kategori
![Form](tambahkategori.png)

### About
![About](screenshots/about.png)