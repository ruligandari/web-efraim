# Task 2: API Modifications

## Deskripsi
Penyesuaian endpoint API untuk frontend mobile game agar sesuai dengan skema database yang baru.

## Checklist
- [ ] Hapus endpoint dan logic login siswa di `app/Controllers/api/Auth.php` karena siswa tidak perlu login.
- [ ] Perbarui endpoint `/api/readsoal` di `app/Controllers/api/ApiController.php` agar mengembalikan data soal dengan format baru (`id`, `soal`, `level`).
- [ ] Perbarui endpoint `/api/readnilai` (atau buat endpoint baru `/api/submit-score`) untuk menerima payload:
  - `nama`
  - `level`
  - `score`
- [ ] Simpan data payload ke dalam tabel `siswa` (atau `nilai`).
- [ ] Hapus endpoint API lain yang sudah tidak relevan (misalnya terkait pengaturan jumlah soal jika sudah tidak digunakan, atau endpoint riwayat nilai siswa tertentu jika tidak diperlukan di frontend).
