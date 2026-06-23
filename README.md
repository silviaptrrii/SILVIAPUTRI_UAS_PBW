# Sistem Wardrobe & Outfit Planner

Aplikasi web Laravel untuk mengelola koleksi pakaian dan membuat kombinasi outfit. UI menggunakan tema **Soft Pink Elegant** dengan Blade + Bootstrap 5 CDN.

## Fitur

- Login, register, logout
- Role `user` dan `admin`
- Dashboard user
- Dashboard admin dengan query count
- CRUD kategori pakaian
- CRUD pakaian + upload foto
- Validasi input, gambar maksimal 2MB
- Outfit Planner dengan checkbox pakaian
- Riwayat dan detail outfit
- Relasi database: users, categories, clothes, outfits, outfit_details

## Cara Menjalankan

1. Ekstrak ZIP.
2. Buka folder project di VS Code atau terminal.
3. Install dependency:

```bash
composer install
```

4. Buat file `.env` dari `.env.example`:

```bash
cp .env.example .env
```

Di Windows, bisa copy manual file `.env.example`, lalu rename menjadi `.env`.

5. Generate key:

```bash
php artisan key:generate
```

6. Buat database MySQL dengan nama:

```text
wardrobe_planner
```

7. Jalankan migration dan seeder:

```bash
php artisan migrate:fresh --seed
```

8. Buat storage link untuk upload foto:

```bash
php artisan storage:link
```

9. Jalankan server:

```bash
php artisan serve
```

10. Buka:

```text
http://127.0.0.1:8000/login
```

## Akun Admin Default

```text
Email    : admin@wardrobe.test
Password : password
```

## Catatan Jika Muncul 419 Page Expired

- Pastikan form login punya `@csrf`.
- Pakai satu URL saja, misalnya selalu `http://127.0.0.1:8000`, jangan dicampur dengan `localhost`.
- Jalankan:

```bash
php artisan optimize:clear
```

- Hapus cookie browser untuk `127.0.0.1` atau coba Incognito.

## Pembagian Presentasi

Orang 1 menjelaskan konsep, database, dan relasi tabel. Orang 2 menjelaskan demo fitur: login, CRUD kategori, CRUD pakaian, upload foto, membuat outfit, riwayat outfit, dan dashboard admin.


## Catatan Fix Upload Foto

Pada versi ini foto pakaian disimpan ke folder `public/uploads/clothes`, jadi gambar langsung tampil tanpa bergantung pada `php artisan storage:link`. Tetap boleh menjalankan `php artisan storage:link`, tetapi fitur upload tidak bergantung pada command tersebut. Jika login memakai akun admin, fitur pakaian juga bisa dites agar demo lebih mudah.
