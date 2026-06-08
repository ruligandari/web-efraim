# Dokumentasi API — Mobile Game

**Base URL:** `https://efraim.cognidev.my.id/api`

---

## Pengertian

API (Application Programming Interface) adalah jembatan yang menghubungkan game mobile kamu dengan database server. Game cukup memanggil alamat-alamat di bawah ini untuk mengambil soal atau mengirim nilai.

---

## Cara Kirim Request

Ada 2 cara yang paling umum digunakan:

### A. Lewat Browser (hanya untuk `GET`)

Ketik alamatnya langsung di browser. Contoh:
```
https://efraim.cognidev.my.id/api/readsoal
```
Maka browser akan menampilkan data JSON.

### B. Lewat Kode Game (Construct 3 / Unity / dll)

Gunakan fungsi HTTP request bawaan engine game kamu. Cukup arahkan ke URL endpoint yang sesuai.

---

## 1. Ambil Semua Soal

**Gunanya:** Game mengambil daftar soal yang tersedia.

**Endpoint:** `GET /api/readsoal`

**Cara akses (browser):** Buka URL:

```
https://efraim.cognidev.my.id/api/readsoal
```

**Contoh response (JSON):**
```json
[
  {
    "id": 1,
    "soal": "APLLE",
    "level": 1
  }
]
```

**Penjelasan response:**

| Field  | Arti                                |
|--------|-------------------------------------|
| id     | Nomor unik soal (untuk referensi)   |
| soal   | Teks soal yang harus dijawab        |
| level  | Tingkat kesulitan (1 = mudah, dst.) |

---

## 2. Ambil Satu Soal Berdasarkan ID

**Gunanya:** Game mengambil satu soal tertentu saja.

**Endpoint:** `GET /api/readsoal-by-id/{id}`

Ganti `{id}` dengan nomor ID soal. Contoh:

```
https://efraim.cognidev.my.id/api/readsoal-by-id/1
```

**Contoh response:**
```json
{
  "id": 1,
  "soal": "APLLE",
  "level": 1
}
```

**Jika ID tidak ditemukan:**
```json
{
  "message": "Data tidak ditemukan"
}
```

---

## 3. Kirim Nilai (Submit Score)

```
https://efraim.cognidev.my.id/api/submit-score
```

**Gunanya:** Game mengirimkan nilai pemain ke database.

**Endpoint:** `POST /api/submit-score`

### Data yang harus dikirim (JSON):

Kirim data dalam format JSON di body request.

**Contoh JSON:**
```json
{
  "nama": "Efraim",
  "level": 1,
  "score": 100
}
```

| Field | Tipe Data | Wajib? | Contoh         |
|-------|-----------|--------|----------------|
| nama  | string    | Ya     | "Efraim"       |
| level | number    | Ya     | 1              |
| score | number    | Ya     | 100            |

### Cara kirim dari game (Construct 3 — Ajax):

Setel header `Content-Type: application/json` dan kirim JSON string.

```
URL:  https://efraim.cognidev.my.id/api/submit-score
Method: POST
Header: Content-Type: application/json
Body:   {"nama":"Efraim","level":1,"score":100}
```

> **Catatan:** API juga menerima format `application/x-www-form-urlencoded` biasa (key=value).

### Contoh response sukses:
```json
{
  "success": true,
  "message": "Data berhasil disimpan"
}
```

### Contoh response gagal (data kurang):
```json
{
  "success": false,
  "message": "Mohon lengkapi data: nama, level, score"
}
```

### Contoh response error server:
```json
{
  "success": false,
  "message": "<pesan_error>"
}
```

---

## Contoh dengan Tools Eksternal

### cURL (Command Line):
```bash
curl -X POST https://efraim.cognidev.my.id/api/submit-score \
  -d "nama=Efraim" \
  -d "level=1" \
  -d "score=100"
```

### Postman:
1. Method: **POST**
2. URL: `https://efraim.cognidev.my.id/api/submit-score`
3. Body → **x-www-form-urlencoded**
4. Isi key: `nama`, `level`, `score`

### PowerShell:
```powershell
$body = @{ nama = "Efraim"; level = "1"; score = "100" }
Invoke-RestMethod -Uri "https://efraim.cognidev.my.id/api/submit-score" -Method Post -Body $body
```

---

## Catatan Penting

- **Tidak perlu login.** Game langsung bisa memanggil API ini tanpa token atau password.
- **Format data:** JSON (response) dan form-urlencoded (request POST).
- **Port:** 443 (HTTPS) — sudah aman terenkripsi.
