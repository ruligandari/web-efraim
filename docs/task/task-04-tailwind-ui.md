# Task 4: UI Redesign & Adjustments

## Deskripsi
Pembaruan UI dashboard admin ke gaya Glassmorphism modern dengan Tailwind CSS, penyesuaian fungsi Edit/Delete soal, dan pengubahan identitas website.

## Checklist
- [ ] Ubah nama website di seluruh halaman (`title` dan *header*) menjadi: **"Website Kelola Nilai BIMBA AIUEO"**.
- [ ] Ubah teks *copyright* di footer menjadi: **"Copyright &copy; Efraim"**.
- [ ] Integrasikan Tailwind CSS (disarankan via CDN untuk kecepatan).
- [ ] Rombak halaman Login (`app/Views/admin/login.php`) menggunakan efek **Glassmorphism** (misalnya menggunakan class `backdrop-blur`, border semi-transparan, *background* yang modern dan menyatu dengan warna saat ini).
- [ ] Buat layout template baru (`app/Views/template_tailwind.php`) dengan desain Glassmorphism yang konsisten.
- [ ] Rombak halaman Data Soal (`app/Views/admin/soal.php`) menggunakan desain Tailwind Glassmorphism.
- [ ] **PASTIKAN** tombol/fungsi **Edit** dan **Delete** pada halaman Data Soal berfungsi dengan sempurna (terhubung dengan modal dan endpoint backend secara akurat).
- [ ] Rombak halaman Data Siswa (`app/Views/admin/siswa.php`) menggunakan desain Tailwind Glassmorphism.
- [ ] Hapus aset CSS/JS SB Admin 2 yang sudah tidak terpakai dari folder `public/asset/`.
