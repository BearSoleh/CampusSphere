# Local setup for academic review

This guide describes a source-based reconstruction of CampusSphere. It is not a claim that a fresh installation or every workflow has been tested. Use a loopback-only environment and synthetic data.

## Prerequisites

- PHP **8.2 or 8.3**, selected from the locked package constraints. This is compatibility guidance for the legacy project, not a current production-platform recommendation.
- Composer and the extensions required by the lockfile. Ensure the MySQL PDO driver is enabled for the application.
- A local MySQL-compatible server. The original thesis describes XAMPP; the exact database server version is not established by the repository.
- Optionally Node.js/npm to rebuild the Laravel Mix assets. `package-lock.json` uses lockfile format 3; an exact supported Node version is not declared.
- Write access to `storage/`, `bootstrap/cache/`, `public/uploads/` and `public/payments/`.

Use `composer check-platform-reqs --lock` to check the lockfile against your PHP installation. See the [Composer command reference](https://getcomposer.org/doc/03-cli.md#check-platform-reqs).

## 1. Get the source

If you do not already have a local checkout:

```bash
git clone https://github.com/BearSoleh/CampusSphere.git
cd CampusSphere
```

These are instructions for the reader. No clone or dependency installation was performed as part of the documentation review.

## 2. Create the local environment file

The repository does not contain `.env.example`, so a standard `cp .env.example .env` command will not work. Create a plain text file named `.env` in the project root.

Create a **new, empty local database**, then use your own local database credentials in the following example:

```dotenv
APP_NAME=CampusSphere
APP_ENV=local
APP_KEY=
APP_DEBUG=false
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack
LOG_LEVEL=warning

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=campussphere_local
DB_USERNAME=replace_with_local_user
DB_PASSWORD=replace_with_local_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=log
```

These are placeholders, not working credentials. Keep `.env` private. The existing `.gitignore` excludes it.

The reviewed workflows do not invoke the Telegram notification class. No Telegram token or external mail service is required by this guide.

## 3. Install the locked PHP dependencies

```bash
composer install
composer check-platform-reqs --lock
php artisan key:generate
php artisan config:clear
```

Use `install` to respect `composer.lock`. Do not use `composer update` or ignore platform/security requirements merely to make an old project install. Investigate and report any dependency error.

`key:generate` fills `APP_KEY` in your local environment file. The configuration above uses file-backed cache/sessions and synchronous queues.

## 4. Create tables and seed lookup records

Run these commands only against the dedicated empty local database:

```bash
php artisan migrate
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=OrderStatusSeeder
php artisan db:seed --class=PaymentStatusSeeder
```

This deliberately seeds only the lookup records needed by the existing workflows. The default `DatabaseSeeder` creates a predictable sample login, and `ProductSeeder` assumes fixed IDs and image filenames. This guide does not use them.

Seed lookups once in a fresh database; the current seeders do not implement idempotent upserts.

Register a new synthetic account through `/register-form`. The users migration defaults `role_id` to 1. Registration does not provide a separate seller role or an administrator-provisioning flow. Treat any local admin-account preparation as a separate manual test fixture, not secure role management.

## 5. Start the local application

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000). Use the web root served by Laravel rather than exposing the entire project folder through an arbitrary web server.

Useful pages in `routes/web.php`:

| Path | Purpose |
|---|---|
| `/` | Public catalogue |
| `/register-form` | Registration |
| `/login-form` | Login |
| `/home` | Account dashboard |
| `/product` | Current seller's product list |
| `/addcart-view` | Active cart |
| `/order` | Buyer orders; the view also supports seller filtering |
| `/category` | Category-management page |
| `/user` | User-list page |

The route list is navigation guidance, not a statement that all access controls are correct.

## Optional asset rebuild

The main templates reference bundled files under `public/vendors/` and `public/src/`. Do not assume rebuilding the npm bundle regenerates those template assets.

To rebuild the configured `resources/js/app.js` and `resources/sass/app.scss` entry points:

```bash
npm ci
npm run dev
```

Other declared scripts are `npm run watch`, `npm run hot` and `npm run prod`. No Node version or successful current build was verified during this review.

Current upload views reference `public/uploads/` and `public/payments/` directly. The controller also writes through the public filesystem disk. Creating a storage symlink alone does not address the privacy or filename-collision issues in this implementation.

## Verification boundaries

During the documentation review:

- `composer validate --no-check-publish --no-check-all` passed on a copy of the dependency metadata.
- `composer check-platform-reqs --lock` passed on PHP **8.3.8**.
- No `vendor/` installation, database migration, seeding, HTTP workflow or asset build was executed.
- The default PHPUnit examples were inspected, not rerun.

The source has mixed framework-era scaffolding, incomplete authorization and known business-logic limitations. Review failures before attempting to use the application beyond isolated academic inspection.
