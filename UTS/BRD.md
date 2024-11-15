# Dokumen Persyaratan Bisnis (BRD)
**Proyek**: Aplikasi Manajemen Menu Restoran

## 1. Tujuan Proyek

### Objektif
Aplikasi ini dirancang untuk memudahkan pengelolaan menu restoran, mulai dari pemilihan dan pemesanan produk oleh pelanggan, hingga pembayaran dan pengolahan pesanan di dapur. Aplikasi ini bertujuan untuk meningkatkan efisiensi operasional restoran serta memberikan pengalaman yang lebih baik bagi pelanggan dan staf.

### Latar Belakang
Restoran perlu memiliki sistem yang efektif untuk mengelola menu mereka, mencatat pesanan pelanggan, serta memproses transaksi pembayaran dengan cepat. Dengan meningkatnya permintaan pelanggan untuk akses yang mudah terhadap menu dan layanan restoran, sistem manajemen menu restoran ini akan mempermudah pengelolaan dan transaksi.

## 2. Fitur Utama

### Untuk Pelanggan
- **Melihat Menu**
  - Pelanggan dapat melihat daftar menu yang tersedia di restoran, termasuk:
    - Nama menu
    - Harga
    - Deskripsi produk
    - Ketersediaan stok
  - Menu dapat diperbarui secara berkala oleh admin.

- **Menambahkan Item ke Keranjang**
  - Pelanggan dapat menambahkan item yang mereka pilih ke dalam keranjang belanja untuk checkout.

- **Melakukan Checkout**
  - Pelanggan dapat memeriksa pesanan mereka, memperbarui jumlah item, dan melanjutkan untuk melakukan checkout.

- **Melakukan Pembayaran (Tunai)**
  - Pelanggan hanya dapat memilih metode pembayaran tunai.
  - Pembayaran diproses oleh kasir, yang kemudian akan mengonfirmasi pembayaran dan menandai pesanan sebagai selesai.

### Untuk Kasir
- **Memproses Pembayaran Tunai**
  - Kasir memproses pembayaran yang dilakukan oleh pelanggan dengan metode tunai.
  - Kasir akan mengonfirmasi pembayaran dan menandai pesanan sebagai selesai.

### Untuk Admin
- **Mengelola Menu**
  - Admin dapat menambah, mengubah, atau menghapus item dalam menu restoran, termasuk informasi seperti:
    - Nama menu
    - Harga menu
    - Deskripsi
    - Ketersediaan stok
  - Admin juga dapat mengelola kategori menu (misalnya: makanan, minuman, atau makanan penutup).

### Untuk Chef
- **Menerima Pesanan**
  - Chef menerima pesanan yang sudah dikonfirmasi dan diproses oleh kasir.

- **Memproses Pesanan**
  - Chef mempersiapkan makanan sesuai dengan pesanan yang diterima.

- **Memperbarui Status Pesanan**
  - Chef dapat memperbarui status pesanan (misalnya: dalam proses, siap diambil, atau selesai).

## 3. Persyaratan Fungsional

### Sistem Login
- **Akses Berdasarkan Peran**:
  - **Admin**: Dapat mengelola menu, mengubah harga, dan menambah/menyunting produk.
  - **Kasir**: Bertugas untuk memproses pembayaran.
  - **Chef**: Dapat menerima dan memproses pesanan yang sudah dibayar.
  - **Pelanggan**: Melihat menu, memesan makanan, dan melakukan pembayaran.

### Pengaturan & Tampilan Menu dan Pesanan
- **Admin**:
  - Dapat mengatur dan memperbarui menu yang tersedia untuk pelanggan.
- **Pelanggan**:
  - Dapat melihat menu, memilih item, dan melakukan pemesanan.
- **Kasir**:
  - Mengonfirmasi pembayaran dan mengelola transaksi.
- **Chef**:
  - Menerima pesanan dan memperbarui status pesanan.

### Pembayaran
- Pembayaran hanya dapat dilakukan dengan metode tunai oleh pelanggan.
- Kasir akan memproses pembayaran tunai dan mengonfirmasi transaksi setelah pembayaran selesai.

## 4. Persyaratan Non-Fungsional

### Kegunaan
- Antarmuka aplikasi harus sederhana dan mudah dipahami, memudahkan pengguna dari semua peran (admin, kasir, chef, pelanggan) dalam menggunakan aplikasi.

### Keamanan
- Semua data transaksi dan pesanan harus dilindungi dengan enkripsi untuk menjaga kerahasiaan pelanggan.
- Pengguna yang berbeda (admin, kasir, chef) hanya dapat mengakses fitur sesuai dengan peran mereka.

### Kinerja
- Aplikasi harus responsif dan dapat memproses pesanan serta pembayaran dengan cepat, bahkan ketika ada banyak transaksi yang diproses pada saat bersamaan.

## 5. Model, Migrasi, Resource, dan Data Awal yang Dibutuhkan

### Model Data

- **Products (Menu)**
  - Menyimpan informasi menu yang tersedia di restoran, termasuk harga, stok, dan deskripsi.
  
- **Orders (Pesanan)**
  - Menyimpan informasi pesanan yang dilakukan oleh pelanggan, termasuk produk yang dipesan, jumlah, dan total harga.

- **Transactions (Transaksi)**
  - Menyimpan informasi tentang transaksi pembayaran tunai, termasuk status pembayaran dan waktu transaksi.

### Struktur Tabel

#### Tabel Menu (Products Table)
| Kolom          | Tipe Data       | Keterangan                        |
|----------------|-----------------|-----------------------------------|
| id             | bigint UNSIGNED | Primary Key                       |
| name           | varchar(255)     | Nama menu                         |
| price          | decimal(10,2)    | Harga menu                        |
| stock          | int(11)          | Jumlah stok yang tersedia         |
| description    | text            | Deskripsi menu                    |
| created_at     | timestamp        | Waktu pembuatan                   |
| updated_at     | timestamp        | Waktu pembaruan                   |

#### Tabel Pesanan (Orders Table)
| Kolom          | Tipe Data       | Keterangan                        |
|----------------|-----------------|-----------------------------------|
| id             | bigint UNSIGNED | Primary Key                       |
| product_id     | bigint UNSIGNED | ID produk yang dipesan            |
| quantity       | int(11)          | Jumlah produk yang dipesan       |
| total_price    | decimal(10,2)    | Total harga pesanan               |
| order_date     | timestamp        | Waktu pesanan dibuat              |
| created_at     | timestamp        | Waktu pembuatan                   |
| updated_at     | timestamp        | Waktu pembaruan                   |

#### Tabel Transaksi (Transactions Table)
| Kolom          | Tipe Data       | Keterangan                        |
|----------------|-----------------|-----------------------------------|
| id             | bigint UNSIGNED | Primary Key                       |
| order_id       | bigint UNSIGNED | ID pesanan                        |
| payment_method | enum('cash')     | Metode pembayaran (Hanya tunai)   |
| transaction_date | timestamp      | Waktu transaksi                   |
| created_at     | timestamp        | Waktu pembuatan                   |
| updated_at     | timestamp        | Waktu pembaruan                   |
