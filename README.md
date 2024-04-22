![readmebox](https://github.com/porn-codex/Java79/assets/106463487/c7327c43-75d7-4e9b-b818-b96648559d97)
# Laralymbr
Laralymbr adalah aplikasi peminjaman buku berbasis web yang dibangun dengan menggunakan framework Laravel. Aplikasi ini dirancang untuk membantu pengguna secara efisien.

## Fitur

1. **Manajemen Tugas**: Laralymbr memungkinkan pengguna untuk membuat, mengedit, dan menghapus tugas.
2. **Penugasan**: Pengguna dapat menugaskan tugas kepada pengguna lain.
3. **Prioritas**: Tugas dapat diberi prioritas untuk membantu pengguna dalam mengatur urutan pengerjaan.
4. **Komentar**: Fitur komentar memungkinkan pengguna untuk berkolaborasi dan berdiskusi tentang tugas.
5. **Notifikasi**: Pengguna akan menerima notifikasi untuk tugas yang ditugaskan atau komentar baru.

## Diagram ERD (Entity-Relationship Diagram)

![ERD Diagram](link_gambar_ERD)

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
