# Shared Hosting Deployment Guide

This guide is for deploying the **Income Tracker** Laravel application on a shared hosting server without SSH/terminal access.

---

## What is included

- `little_wallet_seed.sql` — ready-to-import MySQL database dump (tables + all data through August 2026)
- `vendor/` — Composer dependencies (included because most shared hosts do not have Composer CLI)
- `public/.htaccess` — Laravel rewrite rules
- Root `.htaccess` — redirects all traffic to `public/`

---

## Requirements

- PHP **8.4 or higher** (this application runs on Laravel 13)
- MySQL **5.7 or higher** (or MariaDB 10.3+)
- Apache with `mod_rewrite` enabled
- PHP extensions: `pdo`, `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `zip`, `gd`

---

## Step 1: Create the MySQL database

1. Log in to your hosting **cPanel**.
2. Go to **MySQL® Databases**.
3. Create a new database, e.g. `youruser_littlewallet`.
4. Create a new database user with a strong password.
5. Add the user to the database and grant **ALL PRIVILEGES**.

Write down:
- Database name
- Database username
- Database password
- Database host (usually `localhost` or `127.0.0.1`)

---

## Step 2: Import the database dump

1. In cPanel, open **phpMyAdmin**.
2. Select your new database from the left sidebar.
3. Click the **Import** tab.
4. Click **Choose File** and select `little_wallet_seed.sql`.
5. Click **Go** at the bottom.

You should see a success message. The database now contains:
- 1 admin user
- 14 income sources
- 133 profit records from February 2026 through August 2026

---

## Step 3: Upload the application files

Use **File Manager** in cPanel or an FTP client like FileZilla.

Upload **all files and folders** from this package to your domain root (usually `public_html/`).

### Folders you must upload

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
vendor/
```

### Important files to upload

```
.htaccess
.env
artisan
composer.json
composer.lock
little_wallet_seed.sql
```

> You do **not** need `Dockerfile`, `docker-compose.yml`, or the `docker/` folder. They are for local development only.

---

## Step 4: Edit the `.env` file

Open `.env` in cPanel File Manager or download, edit, and re-upload.

Update these values:

```env
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Other settings are already configured for shared hosting:

```env
APP_ENV=production
APP_DEBUG=false
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

> If you want a new `APP_KEY`, you can generate one locally with `php artisan key:generate` and paste it here. The current key will work, but it is safer to use a fresh key for production.

---

## Step 5: Create storage folders (important)

Laravel needs these folders to exist and be writable. If any are missing, create them in cPanel File Manager:

```
storage/logs/
storage/app/public/
storage/framework/sessions/
storage/framework/views/
storage/framework/cache/
storage/framework/logs/
bootstrap/cache/
```

To create a folder in cPanel File Manager:
1. Navigate to the parent folder.
2. Click **+ Folder** (top menu).
3. Enter the folder name and click **Create New Folder**.

## Step 6: Set folder permissions

In cPanel File Manager, right-click each folder and set permissions to **755**:

- `storage/`
- `storage/framework/`
- `storage/framework/sessions/`
- `storage/framework/views/`
- `storage/framework/cache/`
- `storage/framework/logs/`
- `storage/logs/`
- `bootstrap/cache/`

Files inside should be **644**.

> If your host uses a different PHP user, you may need **775** on these folders. Try 755 first; if you get permission errors, change to 775.

---

## Step 7: Test the application

Open your domain in a browser:

```
https://yourdomain.com
```

You should see the Income Tracker login page.

### Default login

- **Email:** `admin@example.com`
- **Password:** `password`

Change this password immediately after logging in.

---

## Troubleshooting

### 500 Server Error

1. Check that `storage/` and `bootstrap/cache/` are writable (755).
2. Make sure `.env` values are correct, especially database credentials.
3. Check `storage/logs/laravel.log` for details.

### Error: `file_put_contents(storage/framework/sessions/...): Failed to open stream: No such file or directory`

This means the `storage/framework/sessions/` folder is missing or not writable. Fix it:

1. In cPanel File Manager, make sure the folder exists:
   `storage/framework/sessions/`
2. Create it if it does not exist.
3. Set its permission to **755** (or **775** if 755 does not work).
4. Do the same for:
   - `storage/framework/views/`
   - `storage/framework/cache/`
   - `storage/framework/logs/`
   - `storage/logs/`
   - `bootstrap/cache/`

After fixing permissions, refresh your browser.

### "No input file specified" or routes not working

- Make sure `public/.htaccess` was uploaded.
- Make sure Apache `mod_rewrite` is enabled on your host.
- If your host supports setting the document root, point it to `public/`. Otherwise, the root `.htaccess` will handle the redirect.

### Database connection error

- Verify the database name, username, and password in `.env`.
- Try `DB_HOST=localhost` instead of `127.0.0.1` (some hosts require this).
- Confirm the database user has been added to the database with all privileges.

---

## Adding more data later

Since you do not have SSH, the easiest way to add more records is through the application itself after logging in. If you need to bulk-import data, you can:

1. Edit `database/seeders/IncomeTrackerSeeder.php` locally.
2. Run migrations and seeders on your local machine.
3. Export the database as a new `.sql` file.
4. Re-import it through phpMyAdmin.

---

## Security checklist

- [ ] Change the default admin password
- [ ] Use a strong database password
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Use `https://` in `APP_URL` if you have an SSL certificate
- [ ] Delete `little_wallet_seed.sql` from the server after import (optional but recommended)
