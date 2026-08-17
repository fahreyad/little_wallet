# Income Tracker

A Laravel-based admin panel and REST API for tracking income sources, profit amounts, and monthly profit reports.

## Features

- **Admin Panel** (web)
  - Dashboard with monthly profit summary and charts
  - Income source management (CRUD)
  - Profit entry management with amount + total amount
  - Monthly reports by year
  - Detailed monthly breakdown
- **REST API** (JSON)
  - Authentication with Laravel Sanctum
  - Income source CRUD
  - Profit CRUD
  - Monthly and yearly report endpoints
- **Docker** ready for local development or shared hosting deployment

## Quick Start with Docker

### 1. Build and run

```bash
cd income-tracker
docker-compose up --build -d
```

### 2. Open the app

- Admin panel: http://localhost:8082
- API base URL: http://localhost:8082/api

### 3. Default login

- Email: `admin@example.com`
- Password: `password`

### 4. Stop

```bash
docker-compose down
```

## API Usage

### Register / Login

```bash
# Register
POST /api/register
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}

# Login
POST /api/login
{
  "email": "john@example.com",
  "password": "password"
}
```

Use the returned token as `Authorization: Bearer <token>`.

### Income Sources

```bash
GET    /api/income-sources
POST   /api/income-sources
GET    /api/income-sources/{id}
PUT    /api/income-sources/{id}
DELETE /api/income-sources/{id}
```

### Profits

```bash
GET    /api/profits
POST   /api/profits
GET    /api/profits/{id}
PUT    /api/profits/{id}
DELETE /api/profits/{id}
```

Example profit payload:

```json
{
  "income_source_id": 1,
  "amount": 15000,
  "total_amount": 15000,
  "date": "2026-02-15",
  "notes": "February garments"
}
```

### Reports

```bash
GET /api/reports/monthly?month=2026-02
GET /api/reports/monthly/2026-02
GET /api/reports/summary?year=2026
```

## Shared Hosting Deployment

1. Upload all project files to your hosting.
2. Ensure PHP 8.2+ with extensions: `pdo`, `pdo_sqlite`, `openssl`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`.
3. Copy `.env.example` to `.env` and update `APP_URL`.
4. Run `composer install --no-dev --optimize-autoloader` on the server.
5. Set permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache database
   touch database/database.sqlite
   chmod 664 database/database.sqlite
   ```
6. Generate app key:
   ```bash
   php artisan key:generate
   ```
7. Run migrations and seed:
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```
8. Point your web server document root to the `public/` directory.

## Technology Stack

- Laravel 11
- Laravel Sanctum (API auth)
- SQLite (default)
- Bootstrap 5 (admin UI)
- Docker + Docker Compose
- Nginx + PHP-FPM

## Development Notes

- The SQLite database file is located at `database/database.sqlite`.
- Storage and cache directories need write permissions.
- For MySQL, update `DB_*` variables in `.env` and run migrations.
