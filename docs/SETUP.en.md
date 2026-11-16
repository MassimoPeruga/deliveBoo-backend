# Running locally — DeliveBoo

[Project overview](../README.en.md) · [Italiano](SETUP.it.md)

These instructions cover the backend and its restaurant dashboard. The complete customer journey also requires the separate frontend shown in the video.

## Prerequisites

- PHP 8.1–8.3, with Laravel’s required extensions and the PDO MySQL driver. The historical lockfile includes dependencies that restrict later PHP versions.
- Composer 2.
- Node.js 22 and npm, used for verification. Vite 5 declares support for `^18.0.0 || >=20.0.0`.
- A running MySQL server and a dedicated local database for the project.

## Preparing the database

Using a MySQL account allowed to create databases, prepare a dedicated database:

```sql
CREATE DATABASE deliveboo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Set `DB_DATABASE` to `deliveboo` and use local credentials with access to this database.

## Installation and database

```sh
git clone https://github.com/MassimoPeruga/deliveBoo-backend.git
cd deliveBoo-backend
composer install
npm ci
cp .env.example .env
php artisan key:generate
```

In `.env`, set `APP_URL=http://localhost:8000`, `FILESYSTEM_DISK=public` and your local database values for `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`. The public disk makes uploaded images available through the `storage` link.

```sh
php artisan migrate
php artisan storage:link
php artisan db:seed --class=TypeSeeder
```

The main seeder is empty: `migrate --seed` alone does not load the sample data. `TypeSeeder` prepares the cuisine types needed to register a restaurant. Seeders empty their target tables; run them only against the dedicated local database.

## Starting the servers

Start the asset server in one terminal:

```sh
npm run dev
```

In another terminal, from the same directory:

```sh
php artisan serve --host=localhost --port=8000
```

Open [registration](http://localhost:8000/register) to create a restaurant or [sign-in](http://localhost:8000/login) to access the dashboard. This backend does not define a `/` route. The `localhost:8000` host also matches the image URLs constructed by the original APIs.

## Sandbox payments

To try the payment endpoints, add your own **Braintree sandbox** credentials to `.env` using these names:

```dotenv
MERCHANT_ID=
PUBLIC_KEY=
PRIVATE_KEY=
```

The [checkout controller](../app/Http/Controllers/Api/CheckoutController.php) reads these variables; they are not included in `.env.example`. Keep their values in the local, Git-ignored file. You can explore the other backend features without configuring Braintree.

<details>
<summary>Additional sample data</summary>

On a newly created local database, after `TypeSeeder`, you can run these seeders in order:

```sh
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=RestaurantSeeder
php artisan db:seed --class=DishSeeder
php artisan db:seed --class=OrderSeeder
```

These seeders replace data in the affected tables. Orders are generated with Faker; the initial image paths refer to storage files that are not included in the repository.

</details>


## Startup verification

Startup was checked on **16 November 2026** in temporary containers with PHP 8.3.36, Composer 2.11.2, Node.js 22.23.5 and MySQL 8.0.46, using the repository’s lockfiles without updating them.

Checks covered Composer/npm installation, application key generation, migrations, the storage link, all seeders in the documented order, the asset build and a response from the Vite development server. The `/login` and `/register` pages and restaurant and cuisine type APIs responded successfully; registration with synthetic data provided access to the dashboard, order list and restaurant profile.

Database and server hosts were adapted to the container network for HTTP verification. Braintree transactions were not executed: they require personal sandbox credentials. This verifies startup and the listed paths, rather than every application feature.
