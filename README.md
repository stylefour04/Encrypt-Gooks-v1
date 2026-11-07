# 💀 ENCRYPT GOOKS v1

### PHP-Based Ransomware Simulator | Educational Proof of Concept

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php)
![Encryption](https://img.shields.io/badge/Encryption-AES--256--CBC-DC3545?style=for-the-badge)
![Purpose](https://img.shields.io/badge/Purpose-Educational-198754?style=for-the-badge)

---

## 📌 Tentang Proyek

**Encrypt Gooks v1** merupakan sebuah *Proof of Concept (PoC) Ransomware Simulator* berbasis PHP yang dikembangkan untuk tujuan edukasi dan pembelajaran keamanan siber (*Cybersecurity Education*).

Proyek ini mendemonstrasikan mekanisme simulasi ransomware, mulai dari manipulasi nama file dan direktori, enkripsi data menggunakan algoritma AES-256-CBC, hingga proses pemulihan file melalui mekanisme dekripsi.

Melalui proyek ini, pengguna dapat memahami bagaimana ransomware bekerja secara teknis serta mempelajari pentingnya perlindungan data dan mekanisme pemulihan terhadap ancaman keamanan siber.

---

## ⚠️ DISCLAIMER — PERINGATAN KEAMANAN

> **PENTING: BACA SEBELUM MENJALANKAN PROGRAM**
>
> Proyek ini dibuat secara eksklusif untuk tujuan edukasi dan pengujian di lingkungan lokal (*localhost*).
>
> DILARANG menggunakan skrip ini pada server publik, perangkat milik pihak lain, atau direktori yang menyimpan data penting tanpa izin.
>
> Penulis tidak bertanggung jawab atas kehilangan data, kerusakan sistem, maupun penyalahgunaan yang terjadi akibat penggunaan proyek ini.
>
> **Gunakan hanya file dummy dan lingkungan pengujian yang terisolasi.**

---

## 🚀 Fitur Utama

### 1. Random Filename Generator

Mengubah nama file dan folder menjadi rangkaian 64 karakter acak yang terdiri dari huruf besar, huruf kecil, dan angka, dengan ekstensi `.goks`.

### 2. AES-256-CBC Encryption

Menggunakan algoritma kriptografi AES-256-CBC untuk menyimulasikan proses penguncian isi file.

### 3. Self-Destruct Payload

File `enkrip.php` dirancang untuk menghapus dirinya sendiri setelah proses simulasi selesai.

### 4. Auto-Generated Decryptor

Menghasilkan file `dekrip.php` secara otomatis sebagai komponen untuk proses pemulihan data.

### 5. Failed Decryption Simulation

Menyediakan simulasi konsekuensi kesalahan autentikasi sebanyak tiga kali. Pada implementasi ini, file dengan ekstensi `.goks` dapat dihapus secara permanen.

### 6. Minimalist Dark Interface

Menggunakan tampilan antarmuka dark mode yang sederhana, minimalis, dan mendukung penggunaan logo kustom.

---

## 🛠️ Persyaratan Sistem

| Komponen | Persyaratan |
|---|---|
| Web Server | Apache / Nginx |
| PHP | Versi 7.4 atau lebih baru |
| OpenSSL | Ekstensi PHP OpenSSL aktif |
| Local Server | XAMPP / Laragon |
| Browser | Chrome / Firefox |

---

## 📖 Panduan Penggunaan

### 1. Persiapan Lingkungan

1. Jalankan web server melalui XAMPP atau Laragon.
2. Buat direktori pengujian baru di dalam folder `htdocs`.

**Contoh direktori:**

```text
C:\xampp\htdocs\target-gooks
```

3. Siapkan file dummy yang tidak berisi data penting.
4. Pastikan seluruh pengujian dilakukan menggunakan salinan data.

### 2. Menjalankan Simulasi

Pelajari alur program hanya menggunakan kode sumber dan file dummy dalam lingkungan lokal yang terisolasi. Jangan menjalankan mekanisme enkripsi massal pada direktori yang berisi data penting.

### 3. Proses Pemulihan Data

Pelajari komponen dekripsi dan mekanisme pemulihan menggunakan salinan data pengujian. Pastikan backup tersedia secara terpisah.

### 4. Simulasi Kegagalan Autentikasi

Dalam implementasi awal, tiga kali kesalahan password dapat memicu mekanisme penghapusan file `.goks` menggunakan fungsi `unlink()`.

> **PERHATIAN:** Skenario ini berpotensi menyebabkan kehilangan data permanen. Jangan mengujinya pada data asli.

---

## 🔍 Mekanisme Kerja Program

| Tahapan | Keterangan |
|---|---|
| File Preparation | Persiapan file dummy |
| Filename Manipulation | Simulasi perubahan nama file |
| Encryption | Simulasi enkripsi isi file |
| Decryptor Generation | Pembuatan komponen dekripsi |
| Data Recovery | Proses pemulihan file |
| Failure Scenario | Simulasi kegagalan autentikasi |

---

## 🎯 Tujuan Pengembangan

Proyek Encrypt Gooks v1 dikembangkan untuk membantu memahami:

- Mekanisme kerja ransomware.
- Dasar implementasi kriptografi menggunakan PHP.
- Pengelolaan file dan direktori melalui PHP.
- Proses enkripsi dan dekripsi data.
- Pentingnya backup dan strategi pemulihan data.
- Risiko keamanan akibat eksekusi skrip yang tidak tepercaya.

---

## 🔐 Security Notes

- Gunakan lingkungan lokal (*localhost*).
- Hindari penggunaan data pribadi atau data produksi.
- Siapkan backup terpisah sebelum melakukan eksperimen.
- Jangan mengekspos skrip ke internet.
- Pastikan Anda memiliki izin terhadap sistem yang diuji.
- Periksa kode sumber sebelum menjalankan program.

---

## 👨‍💻 Author

**stylefour04**

*Initial Developer — Encrypt Gooks v1*

[![GitHub](https://img.shields.io/badge/GitHub-stylefour04-181717?style=for-the-badge&logo=github)](https://github.com/stylefour04)

---

<div align="center">

### 💀 ENCRYPT GOOKS v1

**Cybersecurity Research & Educational Proof of Concept**

*Learn • Understand • Secure*

</div>
