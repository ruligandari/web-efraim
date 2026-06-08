# Task 1: Database Schema Update

## Deskripsi
Pembaruan skema database untuk menyesuaikan dengan kebutuhan baru (game deteksi pengucapan bahasa inggris) dan menghapus fitur login siswa.

## Checklist
- [ ] Buat file `.env` dan konfigurasikan koneksi ke database Laragon (MySQL).
- [ ] Buat database baru di Laragon (misal: `db_efraim`).
- [ ] Buat CodeIgniter Migration untuk tabel `admin` (hanya untuk guru/admin).
- [ ] Buat CodeIgniter Migration untuk tabel `soal`:
  - `id` (INT, Primary Key, Auto Increment)
  - `soal` (VARCHAR/TEXT)
  - `level` (INT/VARCHAR)
- [ ] Buat CodeIgniter Migration untuk tabel `siswa` (atau `nilai`):
  - `id` (INT, Primary Key, Auto Increment)
  - `nama` (VARCHAR)
  - `level` (INT/VARCHAR)
  - `score` (INT)
- [ ] Buat Seeder untuk membuat akun admin default (username: admin, password: password).
- [ ] Jalankan `php spark migrate` dan `php spark db:seed`.
