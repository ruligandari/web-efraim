# Task 3: Backend Logic & Models Update

## Deskripsi
Pembaruan Model dan Controller di sisi backend Admin agar sesuai dengan struktur database baru.

## Checklist
- [ ] Perbarui `app/Models/SoalModel.php`: Sesuaikan `allowedFields` menjadi `['soal', 'level']`.
- [ ] Perbarui `app/Models/SiswaModel.php`: Sesuaikan `allowedFields` menjadi `['nama', 'level', 'score']`.
- [ ] Perbarui `app/Controllers/admin/SoalController.php`:
  - Sesuaikan fungsi `store` dan `update` untuk hanya memproses input `soal` dan `level`.
  - Hapus logika pemrosesan pilihan ganda dan kunci jawaban.
- [ ] Perbarui `app/Controllers/admin/SiswaController.php`:
  - Sesuaikan pengambilan data untuk menampilkan `nama`, `level`, dan `score`.
- [ ] Bersihkan logika role siswa di `app/Controllers/admin/AuthController.php` karena hanya guru/admin yang akan login.
