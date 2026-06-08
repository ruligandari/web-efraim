# Web Dashboard Efraim

## Deskripsi Proyek
Proyek ini adalah Backend API dan Dashboard Admin berbasis **CodeIgniter 4** untuk mendukung aplikasi mobile game deteksi pengucapan bahasa Inggris bagi anak bimbel.

Sistem ini memiliki dua peran utama:
1. **API untuk Mobile Game:** Menyediakan endpoint untuk mengambil soal (`soal` dan `level`) serta menerima hasil permainan (`nama`, `level`, dan `score`). **Tidak ada sistem login untuk siswa.**
2. **Dashboard Admin (Guru):** Panel kontrol bagi guru untuk mengelola data soal (CRUD) dan melihat rekapitulasi nilai/skor siswa yang masuk dari game. UI menggunakan Tailwind CSS.

## Panduan untuk AI Coding Assistant (PENTING!)

Proyek ini sedang dalam tahap refactoring besar-besaran. Agar tidak merusak sistem atau menulis kode yang tidak perlu, **AI yang mengerjakan proyek ini HARUS mengikuti aturan berikut:**

### 🟢 YANG HARUS DILAKUKAN (DOs):
1. **Ikuti Task List:** Baca dan kerjakan sesuai dengan instruksi yang ada di folder `docs/task/`. Jangan melompat atau mengerjakan sesuatu yang tidak ada di daftar tugas.
2. **Gunakan CodeIgniter 4 Best Practices:** Gunakan Migrations, Seeders, dan Query Builder bawaan CI4 untuk manajemen basis data.
3. **Database Laragon:** Konfigurasi koneksi harus merujuk ke database lokal (MySQL via Laragon) yang disetel melalui `.env`.
4. **Tailwind CSS untuk UI:** Semua antarmuka halaman admin yang dibuat atau dimodifikasi harus menggunakan Tailwind CSS (melalui CDN diperbolehkan untuk kecepatan).

### 🔴 YANG DILARANG (DON'Ts):
1. **JANGAN membuat fitur Login Siswa.** Konsep aplikasi telah berubah; data siswa (nama) hanya dikirim ketika mereka menyetor nilai dari game. Hanya guru/admin yang memiliki akses login.
2. **JANGAN tambahkan `waktu_pengerjaan`.** Kolom ini telah ditiadakan dari tabel nilai/siswa berdasarkan kesepakatan terbaru.
3. **JANGAN gunakan Bootstrap / SB Admin 2.** Semua template lama berbasis SB Admin 2 sedang dalam proses dihapus/dimigrasi ke Tailwind CSS. Jangan tambahkan class Bootstrap baru.
4. **JANGAN membuat tabel atau kolom yang tidak diminta.** Fokus pada `id`, `soal`, `level` untuk tabel soal, dan `id`, `nama`, `level`, `score` untuk tabel nilai/siswa.

---
*Dokumen ini dibuat agar agen eksekutor (AI) dapat langsung memahami konteks proyek secara utuh tanpa perlu melakukan analisis ulang.*
