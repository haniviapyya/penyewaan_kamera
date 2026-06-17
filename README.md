# Sistem Penyewaan Kamera

## Deskripsi Proyek

Sistem Penyewaan Kamera adalah aplikasi berbasis web yang digunakan untuk mengelola proses penyewaan kamera, mulai dari data pelanggan, kategori kamera, data kamera, transaksi penyewaan, hingga pembayaran.

## Teknologi yang Digunakan

* PHP Native
* MySQL
* Bootstrap 5
* Laragon
* phpMyAdmin

## Struktur Database

Database menggunakan 6 tabel utama:

1. pelanggan
2. kategori_kamera
3. kamera
4. penyewaan
5. detail_penyewaan
6. pembayaran

## Fitur Aplikasi

### CRUD

* CRUD Pelanggan
* CRUD Kategori Kamera
* CRUD Kamera
* CRUD Penyewaan
* CRUD Pembayaran

### Dashboard

* Statistik jumlah pelanggan
* Statistik jumlah kamera
* Statistik jumlah penyewaan

### Laporan

* Laporan Penyewaan
* Laporan Pendapatan

## Implementasi Database

### Query Complex

1. JOIN beberapa tabel untuk menampilkan data penyewaan lengkap.
2. Subquery untuk mencari kamera dengan harga sewa tertinggi.
3. Aggregate Function dan GROUP BY untuk menghitung jumlah penyewaan pelanggan.

### View

1. view_data_penyewaan
2. view_laporan_pendapatan

### Function

1. hitung_lama_sewa()
2. hitung_total_biaya()

### Trigger

1. trg_kurangi_stok
2. trg_status_kamera

## Cara Menjalankan

1. Jalankan Laragon.
2. Import file penyewaan_kamera.sql ke phpMyAdmin.
3. Pastikan database bernama penyewaan_kamera.
4. Simpan project pada folder:
   C:\laragon\www\penyewaan_kamera
5. Akses melalui browser:

   http://localhost/penyewaan_kamera

## Author

Nama: Khadillaika Hanivia

NIM: 25/566994/SV/27138

Mata Kuliah: Praktikum Pemrograman Web 1 dan Praktikum Basis Data
