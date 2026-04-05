# Panduan Deployment Laravel `compro_aro` ke VPS Apache

Panduan ini berisi langkah-langkah detail untuk mendeploy aplikasi Laravel **compro_aro** di server VPS Ubuntu/Debian menggunakan Apache.

## 1. Persiapan Folder Proyek

Pastikan Anda sudah berada di direktori proyek:
```bash
cd /var/www/compro_aro
```

## 2. Instalasi Dependensi

Jalankan perintah berikut untuk menginstal dependensi PHP dan melakukan build asset frontend:

```bash
# Instal dependensi PHP (Composer)
composer install --no-dev --optimize-autoloader

# Instal dependensi Node.js dan build asset (Vite)
npm install
npm run build
```

## 3. Konfigurasi Environment (`.env`)

Salin template `.env.vps` yang telah disediakan menjadi `.env`:

```bash
cp .env.vps .env
```

**Penting:** Edit file `.env` untuk menyesuaikan kredensial database Anda:
```bash
nano .env
```
Sesuaikan bagian ini:
```env
DB_DATABASE=compro_aro
DB_USERNAME=root
DB_PASSWORD=ISI_PASSWORD_DATABASE_ANDA
```

Setelah itu, regenerasi key aplikasi:
```bash
php artisan key:generate
```

## 4. Setup Database

Jalankan migrasi database (pastikan database sudah dibuat di MySQL):

```bash
php artisan migrate --force
```

## 5. Pengaturan Folder Permissions

Apache (user `www-data`) harus memiliki akses tulis ke folder `storage` dan `bootstrap/cache`:

```bash
sudo chown -R www-data:www-data /var/www/compro_aro/storage /var/www/compro_aro/bootstrap/cache
sudo chmod -R 775 /var/www/compro_aro/storage /var/www/compro_aro/bootstrap/cache
```

## 6. Konfigurasi Apache VirtualHost

1. Salin file konfigurasi Apache ke folder `sites-available`:
   ```bash
   sudo cp /var/www/compro_aro/compro_aro.conf /etc/apache2/sites-available/compro_aro.conf
   ```

2. Aktifkan modul `rewrite` Apache:
   ```bash
   sudo a2enmod rewrite
   ```

3. Aktifkan konfigurasi site baru:
   ```bash
   sudo a2ensite compro_aro.conf
   ```

4. Nonaktifkan site default (opsional, jika mengganggu):
   ```bash
   sudo a2dissite 000-default.conf
   ```

5. Tes konfigurasi Apache dan restart:
   ```bash
   sudo apache2ctl configtest
   sudo systemctl restart apache2
   ```

## 7. Optimasi Laravel (Opsional tapi Direkomendasikan)

Untuk meningkatkan performa di server production:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 8. Persiapan SSL (HTTPS) dengan Certbot

Gunakan Certbot untuk mengamankan situs Anda dengan SSL gratis dari Let's Encrypt:

```bash
sudo apt update
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d arobaskaraesa.com -d www.arobaskaraesa.com -d abe-group.id -d www.abe-group.id
```
Ikuti instruksi di layar untuk menyelesaikan setup HTTPS.

---

### Informasi Penting
- **IP VPS:** `76.13.194.205`
- **Domain Utilitas:** `arobaskaraesa.com`, `abe-group.id`
- **Path Proyek:** `/var/www/compro_aro`
