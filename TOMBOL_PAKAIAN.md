# Tombol Detail, Edit, Hapus Pakaian

Revisi ini memperbaiki tombol pada card pakaian agar bisa diklik dan route model binding pakaian lebih aman.

Yang diubah:
- `routes/web.php`: route resource clothes memakai parameter eksplisit `{clothes}`.
- `ClothesController`: method show/edit/update/destroy memakai parameter `Clothes $clothes`.
- `resources/views/layouts/app.blade.php`: tambahan CSS z-index dan pointer-events untuk action button.
- `resources/views/clothes/index.blade.php`: button group diberi class `clothes-actions`.

Setelah replace file, jalankan:

```bash
php artisan optimize:clear
php artisan route:clear
php artisan view:clear
php artisan serve
```
