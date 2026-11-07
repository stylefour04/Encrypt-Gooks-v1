 <div align="center">

💀 ENCRYPT GOOKS v1

PHP-Based Ransomware Simulator

Cybersecurity Research & Educational Proof of Concept

Understanding ransomware mechanisms through a controlled local environment.

</div>

⸻

📌 Tentang Proyek

Encrypt Gooks v1 merupakan sebuah Proof of Concept (PoC) Ransomware Simulator berbasis PHP yang dikembangkan untuk tujuan edukasi dan pembelajaran keamanan siber (Cybersecurity Education).

Proyek ini mendemonstrasikan mekanisme simulasi ransomware, mulai dari manipulasi nama file dan direktori, enkripsi data menggunakan algoritma AES-256-CBC, hingga proses pemulihan file melalui mekanisme dekripsi.

Melalui proyek ini, pengguna dapat memahami bagaimana ransomware bekerja secara teknis serta mempelajari pentingnya perlindungan data dan mekanisme pemulihan terhadap ancaman keamanan siber.

⚠️ DISCLAIMER — PERINGATAN KEAMANAN

PENTING: BACA SEBELUM MENJALANKAN PROGRAM

Proyek ini dibuat secara eksklusif untuk tujuan edukasi dan pengujian di lingkungan lokal (localhost).

DILARANG menggunakan skrip ini pada server publik, perangkat milik pihak lain, atau direktori yang menyimpan data penting tanpa izin.

Penulis tidak bertanggung jawab atas kehilangan data, kerusakan sistem, maupun penyalahgunaan yang terjadi akibat penggunaan proyek ini.

Gunakan hanya file dummy dan lingkungan pengujian yang terisolasi.

⸻

🚀 Fitur Utama

1. Random Filename Generator

Mengubah nama file dan folder menjadi rangkaian 64 karakter acak yang terdiri dari huruf besar, huruf kecil, dan angka, dengan ekstensi .goks.

2. AES-256-CBC Encryption

Menggunakan algoritma kriptografi AES-256-CBC untuk menyimulasikan proses penguncian isi file.

3. Self-Destruct Payload

File enkrip.php dirancang untuk menghapus dirinya sendiri setelah proses simulasi selesai.

4. Auto-Generated Decryptor

Menghasilkan file dekrip.php secara otomatis sebagai komponen untuk proses pemulihan data.

5. Failed Decryption Simulation

Menyediakan simulasi konsekuensi kesalahan autentikasi sebanyak tiga kali. Pada implementasi ini, file dengan ekstensi .goks dapat dihapus secara permanen.

6. Minimalist Dark Interface

Menggunakan tampilan antarmuka dark mode yang sederhana, minimalis, dan mendukung penggunaan logo kustom.

⸻

🛠️ Persyaratan Sistem

Pastikan lingkungan pengujian Anda memenuhi persyaratan berikut:

Komponen	Persyaratan
Web Server	Apache / Nginx
PHP	Versi 7.4 atau lebih baru
OpenSSL	Ekstensi PHP OpenSSL aktif
Local Server	XAMPP / Laragon
Browser	Chrome / Firefox / Browser modern

⸻

📖 Panduan Penggunaan

1. Persiapan Lingkungan

1. Jalankan web server melalui XAMPP atau Laragon.
2. Buat direktori pengujian baru di dalam folder htdocs.

Contoh direktori:

C:\xampp\htdocs\target-gooks

3. Siapkan file dummy yang tidak berisi data penting.
4. Pastikan seluruh pengujian dilakukan menggunakan salinan data dan lingkungan lokal yang terisolasi.

2. Menjalankan Simulasi Enkripsi

1. Tempatkan file enkrip.php pada direktori pengujian.
2. Buka browser dan akses:

http://localhost/target-gooks/enkrip.php

3. Tunggu hingga animasi terminal selesai.
4. Masukkan password simulasi.
5. Jalankan proses melalui tombol EXECUTE.

Hasil simulasi:

* Nama file dan folder berubah menjadi karakter acak.
* File mengalami proses enkripsi.
* File dekrip.php dibuat secara otomatis.
* File enkrip.php dihapus sesuai mekanisme PoC.

3. Proses Pemulihan Data

1. Akses halaman dekripsi melalui browser:

http://localhost/target-gooks/dekrip.php

2. Masukkan password yang digunakan sebelumnya.
3. Jalankan proses melalui tombol BUKA FILE.

Jika autentikasi berhasil, sistem akan menjalankan proses pemulihan nama file, folder, dan isi data.

4. Simulasi Kegagalan Autentikasi

Proyek ini juga menyediakan skenario simulasi kegagalan autentikasi.

Dalam implementasi awal, tiga kali kesalahan password akan memicu mekanisme penghapusan file .goks menggunakan fungsi unlink().

PERHATIAN: Skenario ini berpotensi menyebabkan kehilangan data permanen. Jangan mengujinya pada data asli.

⸻

🎯 Tujuan Pengembangan

Proyek Encrypt Gooks v1 dikembangkan untuk membantu memahami beberapa konsep keamanan siber, antara lain:

* Mekanisme kerja ransomware.
* Dasar implementasi kriptografi menggunakan PHP.
* Pengelolaan file dan direktori melalui PHP.
* Proses enkripsi dan dekripsi data.
* Pentingnya backup dan strategi pemulihan data.
* Risiko keamanan akibat eksekusi skrip yang tidak tepercaya.

⸻

🔐 Security Notes

Beberapa hal yang perlu diperhatikan sebelum melakukan pengujian:

* Gunakan lingkungan lokal (localhost).
* Hindari penggunaan data pribadi atau data produksi.
* Siapkan backup terpisah sebelum melakukan eksperimen.
* Jangan mengekspos skrip ke internet.
* Pastikan Anda memiliki izin terhadap sistem yang diuji.

⸻

👨‍💻 Author

<div align="center">

stylefour04

Initial Developer — Encrypt Gooks v1

</div>

⸻

<div align="center">

💀 ENCRYPT GOOKS v1

Cybersecurity Research & Educational Proof of Concept

Learn • Understand • Secure

</div>
