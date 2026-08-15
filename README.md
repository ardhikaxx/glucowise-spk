<div align="center">
  <h1 align="center">GlucoWise ML Screening</h1>
  
  <p align="center">
    <strong>Sistem Pakar Cerdas Deteksi Dini Risiko Diabetes Berbasis Machine Learning</strong>
  </p>
  
  <p align="center">
    <a href="https://laravel.com/"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"></a>
    <a href="https://php.net/"><img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"></a>
    <a href="https://getbootstrap.com/"><img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap"></a>
    <a href="https://mysql.com/"><img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"></a>
  </p>
</div>

<hr>

## 📖 Tentang Aplikasi
**GlucoWise SPK** adalah aplikasi Sistem Pendukung Keputusan (SPK) berbasis *web* modern yang dirancang untuk melakukan **skrining dini risiko penyakit diabetes** secara cerdas. Aplikasi ini dibangun menggunakan kerangka kerja Laravel dan mengadopsi antarmuka kelas premium (Premium UI/UX) dengan perpaduan warna Teal (`#1B9C85`) yang modern, bersih, dan memanjakan mata.

Sistem ini memiliki ruang **Laboratorium Machine Learning (ML)** bagi *Administrator* untuk menyimulasikan pemrosesan (*preprocessing*), validasi silang (*K-Fold / Holdout*), dan evaluasi performa model menggunakan *ROC Curve* interaktif (melalui *Chart.js*).

Sistem dikembangkan dan didesain secara penuh oleh **Yanuar Ardhika R.U**.

## ✨ Fitur Utama
Aplikasi ini membagi hak akses ke dalam dua pilar utama (melalui *Spatie Permission*), yakni **Administrator** dan **Pengguna Umum (Pasien)**.

### 👑 Administrator (Dasbor Manajemen & Lab ML)
*   **Dasbor Analitik Interaktif**: Visualisasi *Chart.js* penuh menampilkan statistik skrining harian/bulanan, matriks kebingungan (*confusion matrix*), distribusi risiko pasien, serta metrik akurasi (*Accuracy & F1-Score*).
*   **Laboratorium ML Terpadu**: Modul simulasi khusus untuk algoritma deteksi diabetes yang mencakup:
    *   **Preprocessing Data**: Pembersihan *null values*, duplikasi data, dan fitur normalisasi *Z-Score*.
    *   **Validasi & Evaluasi Engine**: Simulasi perhitungan rasio akurasi *K-Fold Cross Validation* dan *Holdout*, lengkap dengan render *ROC Curve* secara dinamis.
*   **Manajemen Data Latih (Dataset)**: Mengelola tabel *dataset* kesehatan secara dinamis (didukung *DataTables*).
*   **Manajemen Sistem Terpusat**: Termasuk pengelolaan Pengguna (Hak Akses), pembuatan Artikel Edukasi, Pengaturan Aplikasi, dan pemantauan aktivitas (*Audit Logs*).

### 👤 Pengguna Umum / Pasien
*   **Formulir Skrining Cerdas**: Deteksi risiko diabetes berdasarkan rekam medis singkat (Usia, Riwayat Hipertensi, BMI, Gula Darah, dll.).
*   **Hasil Instan & Unduh PDF**: Hasil prediksi algoritma keluar secara seketika (*real-time*) beserta rekomendasi medis. Pasien dapat mengunduh dokumen laporan medis berekstensi `.pdf`.
*   **Akses Edukasi Kesehatan**: Membaca artikel literasi seputar kesehatan dan gaya hidup sehat pencegah diabetes.
*   **Antarmuka Responsif (Mobile-First)**: Halaman pasien menggunakan sistem *Bottom Navigation* yang sangat mudah diakses melalui ponsel cerdas.

## 🚀 Teknologi yang Digunakan
*   **Framework Back-End**: [Laravel 11.x](https://laravel.com)
*   **Bahasa Pemrograman**: PHP 8.4
*   **Basis Data**: MySQL (via Eloquent ORM)
*   **Front-End UI**: Vanilla CSS, Bootstrap 5 (Premium Customization)
*   **Visualisasi Data**: Chart.js 
*   **Interaksi UX**: SweetAlert2 (Notifikasi interaktif dan konfirmasi *CRUD*)
*   **Manajemen Peran**: Spatie Laravel Permission
*   **Pembuatan Dokumen**: Barryvdh DomPDF

## ⚙️ Panduan Instalasi (Local Development)
Ikuti panduan berikut untuk menjalankan GlucoWise secara lokal di komputer Anda:

### Persyaratan Sistem
Pastikan Anda sudah memasang hal-hal berikut:
- **XAMPP / Laragon** (mendukung PHP 8.2 atau lebih tinggi)
- **Composer**
- **Git**

### Langkah-langkah Menjalankan Sistem
1. **Kloning Repositori ini:**
   ```bash
   git clone https://github.com/ardhikaxx/glucowise-spk.git
   cd glucowise-spk
   ```

2. **Instalasi Dependencies (Pustaka PHP):**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment:**
   Gandakan berkas `.env.example` dan ubah namanya menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Buka berkas `.env` dan atur konfigurasi *database* MySQL Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=glucowise_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Pembuatan Kunci Aplikasi (App Key):**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi dan *Seeding* Database:**
   Buat *database* di phpMyAdmin (dengan nama sesuai konfigurasi `DB_DATABASE`). Lalu jalankan perintah berikut untuk mengisi tabel dasar (Peran, Admin Utama):
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Aplikasi kini dapat diakses melalui peramban pada alamat: **`http://localhost:8000`**

## 🔐 Kredensial Uji Coba Default
Jika Anda menggunakan *Database Seeder*, gunakan akun berikut untuk mencoba aplikasinya:

| Peran | Email | Kata Sandi |
| :--- | :--- | :--- |
| **Administrator** | `admin@glucowise.com` | `password` (atau lihat seeder) |
| **Pengguna Umum** | Daftar mandiri via fitur registrasi web | - |

## 🎨 Kebijakan Desain (Design Language)
Semua perancangan visual dalam sistem ini diformulasikan berdasarkan konsep **"Premium-UI & Accessible Design"**:
*   Tidak menggunakan *Template Admin* usang berbayar/gratis. Layout diukir dari dasar (secara *custom*).
*   *Font* utama menggunakan tipografi murni nan tegas **"Inter"** dengan sedikit modifikasi _kerning/tracking_ (-0.03em) agar terlihat rapi dan kelas atas layaknya *startup* modern.
*   Radius lengkungan *container/button* (`8px` hingga `12px`), batas elemen setebal rambut (`1px solid #e4e4e7`), dan efek bayang bayang presisi tinggi alih-alih bayang standar generik.

## 📄 Lisensi Sistem
Dikembangkan eksklusif oleh **Yanuar Ardhika R.U**. 
Aplikasi ini dilindungi oleh hak cipta dan dapat digunakan sebagai referensi proyek sistem informasi medis, SPK (Sistem Pendukung Keputusan), atau Sistem Pakar.

---
> *"Good design makes a product useful."* - GlucoWise 2026.
