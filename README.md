<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# SIRS Poli Gizi PKU Muhammadiyah Gamping

SIRS (Sistem Informasi Rumah Sakit) Poli Gizi PKU Muhammadiyah Gamping adalah sebuah proyek sistem informasi yang bertujuan untuk memonitoring kasus gizi buruk di Poli Gizi RS PKU Muhammadiyah Gamping. Proyek ini dibuat sebagai bagian dari tugas besar dalam Mata Kuliah Sistem Informasi Rumah Sakit.

## Fitur Utama
- [x] Manajemen Skrining
- [x] Manajemen Dapur
- [x] Manajemen Distribusi

## Peran Pengguna
- [x] Ahligizi
- [x] Pramusaji
- [x] Distributor

## Persyaratan Sistem

- PHP versi 8.1 atau lebih tinggi
- Composer
- Node.js dan NPM
- MySQL atau database lainnya

## Instalasi

```bash
# Clone repositori
git clone https://github.com/Nasuco/poli-gizi-sirs.git

# Instal dependensi PHP menggunakan Composer
composer install

# Instal node modules menggunakan npm
npm install

# Salin berkas .env
cp .env.example .env

# Generate kunci aplikasi
php artisan key:generate

# Import database `SIRS_GIZI.sql` ke dalam sistem pengelola database

# Atur koneksi basis data pada berkas `.env`

# Jalankan server lokal
php artisan serve