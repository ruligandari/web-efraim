# API Documentation — Mobile Game

Base URL: `http://localhost:8080/api`

## 1. Ambil Semua Soal

Mengambil daftar semua soal yang tersedia.

**Endpoint:** `GET /api/readsoal`

**Response (200):**
```json
[
  {
    "id": 1,
    "soal": "APLLE",
    "level": 1
  }
]
```

---

## 2. Ambil Soal by ID

Mengambil satu soal berdasarkan ID.

**Endpoint:** `GET /api/readsoal-by-id/{id}`

**Parameter:**

| Nama | Tipe | Contoh |
|------|------|--------|
| id   | int  | 1      |

**Response (200):**
```json
{
  "id": 1,
  "soal": "APLLE",
  "level": 1
}
```

**Response jika tidak ditemukan:**
```json
{
  "message": "Data tidak ditemukan"
}
```

---

## 3. Submit Score

Menyimpan nilai siswa dari game ke database.

**Endpoint:** `POST /api/submit-score`

**Request Body (form-urlencoded / JSON):**

| Nama   | Tipe   | Contoh          |
|--------|--------|-----------------|
| nama   | string | "Efraim"        |
| level  | int    | 1               |
| score  | int    | 100             |

**Response sukses (200):**
```json
{
  "success": true,
  "message": "Data berhasil disimpan"
}
```

**Response jika data tidak lengkap:**
```json
{
  "success": false,
  "message": "Mohon lengkapi data: nama, level, score"
}
```

**Response error:**
```json
{
  "success": false,
  "message": "<error_message>"
}
```

### Contoh (cURL):
```bash
curl -X POST http://localhost:8080/api/submit-score \
  -d "nama=Efraim" \
  -d "level=1" \
  -d "score=100"
```

### Contoh (PowerShell):
```powershell
$body = @{ nama = "Efraim"; level = "1"; score = "100" }
Invoke-RestMethod -Uri "http://localhost:8080/api/submit-score" -Method Post -Body $body
```
