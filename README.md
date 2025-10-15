# workspacesisaraya

Mirror of local Laravel project `ruangkerja-mvp` (partial backup). Repository ini berisi sumber aplikasi Laravel SISARAYA — sebuah aplikasi manajemen proyek/ruang kerja.

## Ringkasan

Proyek ini adalah aplikasi Laravel (PHP) dengan beberapa dependensi frontend (npm). Struktur proyek tipikal Laravel:

- `app/`, `config/`, `database/`, `public/`, `resources/`, `routes/`, `tests/` dan lain-lain.

## Prasyarat

- PHP 8.x
- Composer
- Node.js & npm/yarn (untuk asset)
- MySQL / PostgreSQL / SQLite untuk database

Pastikan juga `git` terpasang untuk bekerja dengan repo ini.

## Cara menjalankan (lokal)

1. Salin file example env dan atur konfigurasi:

```powershell
cp .env.example .env
# edit .env sesuai kebutuhan (DB, MAIL, APP_KEY)
```

2. Install dependensi PHP dan generate key:

```powershell
composer install --no-interaction --prefer-dist
php artisan key:generate
```

3. Install dependensi frontend dan build assets (dev):

```powershell
npm install
npm run dev
# atau untuk production
npm run build
```

4. Jalankan migrasi dan seeder (opsional):

```powershell
php artisan migrate --seed
```

5. Jalankan server lokal:

```powershell
php artisan serve
# buka http://127.0.0.1:8000
```

## Testing

Jalankan unit/feature tests dengan PHPUnit:

```powershell
./vendor/bin/phpunit
```

## Cara push dari workspace lokal ke GitHub

Jika Anda bekerja dari folder ini dan belum mengatur remote, tambahkan remote dan push:

```powershell
git remote add origin https://github.com/Bhimonw/workspacesisaraya.git
git branch -M main
git add .
git commit -m "Initial import"
git push -u origin main
```

> Catatan: jika remote sudah berisi commit, lakukan `git pull origin main --allow-unrelated-histories` lalu selesaikan konflik sebelum push.

## Keamanan

- Jangan commit file sensitif seperti `.env` atau kunci privat. Jika sudah terlanjur, segera rotasi kunci dan hapus file dari history (saya bisa membantu).
- Periksa file besar atau asset yang tidak perlu dimasukkan ke repo.

## Lisensi

Tambahkan file `LICENSE` jika Anda ingin menentukan lisensi proyek.

---

Jika mau, saya bisa menambahkan:

- GitHub Actions untuk menjalankan test otomatis.
- File `LICENSE` (MIT/Apache/BSD).
- Panduan deploy singkat.

Silakan beri tahu apa yang ingin Anda tambahkan selanjutnya.
