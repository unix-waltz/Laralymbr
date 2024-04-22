![readmebox](https://github.com/porn-codex/Java79/assets/106463487/c7327c43-75d7-4e9b-b818-b96648559d97)
# Laralymbr
 
<img src="https://github.com/unix-waltz/Laralymbr/assets/106463487/ffe063a2-bf5d-42d7-9a12-02a0b2289032" alt="Screenshot" style="width:100%;">

Laralymbr adalah aplikasi peminjaman buku berbasis web yang dibangun dengan menggunakan framework Laravel. Aplikasi ini dirancang untuk membantu pengguna secara efisien.
# Preview
https://github.com/unix-waltz/Laralymbr/assets/106463487/0964f79f-526a-42a2-b41d-fc0960081647


## Utility & Framework

1. **Laravel**: Framework PHP yang kuat, menyatukan backend dan frontend secara sinergis.
2. **Tailwind CSS**: Kerangka kerja CSS yang memungkinkan desain responsif dan menarik.
3. **Flowbyte**: Platform aliran kerja yang memfasilitasi kolaborasi dan manajemen tugas.
4. **MySQL**: Database yang handal untuk menyimpan data dan mendukung fitur kolaborasi.
5. **Dan banyak lagi**: Termasuk alat dan kerangka kerja lainnya untuk mendukung pengembangan dan pengelolaan aplikasi dengan efisien.

## Fitur

1. **Manajemen Tugas**: Laralymbr memungkinkan pengguna untuk membuat, mengedit, dan menghapus tugas.
2. **Penugasan**: Pengguna dapat menugaskan tugas kepada pengguna lain.
3. **Prioritas**: Tugas dapat diberi prioritas untuk membantu pengguna dalam mengatur urutan pengerjaan.
4. **Komentar**: Fitur komentar memungkinkan pengguna untuk berkolaborasi dan berdiskusi tentang tugas.
5. **Notifikasi**: Pengguna akan menerima notifikasi untuk tugas yang ditugaskan atau komentar baru.

## Diagram ERD (Entity-Relationship Diagram)

**#Revisi Diagram ERD (Entity-Relationship Diagram)**

Setelah melakukan evaluasi mendalam terhadap kebutuhan aplikasi, ERD (Entity-Relationship Diagram) kami telah direvisi untuk meningkatkan efisiensi dan skalabilitas. Revisi ini mengintegrasikan peningkatan fungsionalitas dan memperbaiki struktur basis data untuk mendukung pertumbuhan masa depan. Berikut adalah penjelasan tentang perubahan yang telah dilakukan:

1. **Normalisasi Basis Data**

   Kami melakukan normalisasi basis data untuk mengurangi redundansi dan meningkatkan integritas data. Setiap tabel dirancang untuk menyimpan informasi yang berkaitan dengan entitas tunggal, memastikan struktur yang lebih bersih dan lebih efisien.

2. **Penyesuaian Relasi Antara Tabel**

   Kami menyempurnakan relasi antara tabel-tabel dalam basis data untuk memastikan keterkaitan yang tepat dan efektif antara entitas. Ini membantu mempermudah proses kueri dan manipulasi data, serta meningkatkan konsistensi dan keamanan.

3. **Pengenalan Indeks dan Kunci Asing**

   Untuk meningkatkan kinerja kueri dan menjaga konsistensi data, kami menambahkan indeks dan kunci asing yang sesuai. Ini mempercepat pencarian data dan memastikan integritas referensial antara entitas.

4. **Penambahan Entitas Tambahan**

   Sebagai tanggapan terhadap kebutuhan baru, kami memperkenalkan entitas tambahan untuk mendukung fungsionalitas yang lebih kompleks. Ini termasuk entitas untuk manajemen pengguna, hak akses, dan log aktivitas.

5. **Integrasi Fitur-fitur Baru**

   Dalam rangka meningkatkan kemampuan aplikasi, ERD telah diperluas untuk mencakup tabel-tabel yang mendukung fitur-fitur baru seperti notifikasi real-time, integrasi eksternal, dan analisis data.

Revisi ini bertujuan untuk menciptakan struktur basis data yang lebih fleksibel, skalabel, dan mudah dipelihara. Dengan demikian, kami berharap aplikasi dapat berkembang dengan baik seiring waktu dan memenuhi kebutuhan pengguna dengan lebih baik.

**Sebelum :**
##
![image](https://github.com/unix-waltz/Laralymbr/assets/106463487/a2ebde4b-fb3f-4244-b793-ff9cb9b805e8)

**Sesudah :**
##
![Screenshot from 2024-04-22 17-23-31](https://github.com/unix-waltz/Laralymbr/assets/106463487/024f1486-95b1-41f9-bd6c-d306b81ebfc6)


## Diagram UML (Unified Modeling Language)

![UML](https://github.com/unix-waltz/Laralymbr/assets/106463487/b1103390-0085-431e-9580-5b8d386eb378)

## DFD 

![DFD](https://github.com/unix-waltz/Laralymbr/assets/106463487/e91d122c-c464-4715-a247-c56061d48b4a)

## Instalasi

1. **Prasyarat**: Pastikan Anda memiliki PHP, Composer, dan MySQL terinstal di komputer Anda.
2. **Clone Repositori**: `git clone https://github.com/unix-waltz/Laralymbr.git`
3. **Install Dependencies**: `composer install`
4. **Setup Database**: 
    - Buat file `.env` dari file `.env.example` dan sesuaikan pengaturan database Anda.
    - Jalankan migrasi: `php artisan migrate`
5. **Mulai Server**: `php artisan serve`
6. **Akses Aplikasi**: Buka browser dan kunjungi `http://localhost:8000`.

## Lisensi

Laralymbr dilisensikan di bawah Lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
