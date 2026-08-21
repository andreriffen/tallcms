# TallCMS

A self-hosted content management system for editorial content, banners, users, and roles. TallCMS is built on Laravel and Filament, with a Docker-first setup for a reproducible local and production environment.

> This is the Docker edition and intended default branch. The `legacy-wamp` branch preserves the original local WAMP workflow.

## Highlights

- Filament administrative panel with a responsive, configurable theme
- Blog posts, categories, banners, and banner categories
- Role-based access control powered by Filament Shield and Spatie Permission
- User profiles, email verification, password reset, activity logging, and media uploads
- Persistent public uploads and default branding assets in Docker

## Stack

| Layer | Technology |
| --- | --- |
| Application | Laravel 10, PHP 8.2 |
| Admin panel | Filament 3.2, Livewire, Tailwind CSS |
| Database | MySQL 8.0 |
| Runtime | Docker Compose, Apache |
| Front-end build | Node.js 20, Vite |

## Quick start with Docker

### Prerequisites

- Docker Engine with the Compose plugin
- Git

### 1. Configure the environment

```sh
git clone https://github.com/andreriffen/tallcms.git
cd tallcms
cp .env.example .env
```

Open `.env` and set unique values for `DB_PASSWORD`, `DB_ROOT_PASSWORD`, and `TALLCMS_ADMIN_PASSWORD`. The admin email and password are required only when the seed command is run.

Generate an application key, then copy the printed value into `APP_KEY` in `.env`:

```sh
docker compose run --rm app php artisan key:generate --show
```

### 2. Build and start the services

```sh
docker compose up -d --build
```

### 3. Create the schema and initial data

```sh
docker compose exec app php artisan migrate --force
docker compose exec app php artisan db:seed --force
```

The seeder creates the administrator from the `TALLCMS_ADMIN_*` variables and generates the Filament Shield permissions. Do not use placeholder credentials in a public environment.

### 4. Open the application

- Site: [http://localhost:8080](http://localhost:8080)
- Admin panel: [http://localhost:8080/admin](http://localhost:8080/admin)

Sign in with the administrator email and password you set in `.env`.

## Common commands

```sh
# Follow application logs
docker compose logs -f app

# Open a Laravel shell
docker compose exec app php artisan tinker

# Run pending migrations after an update
docker compose exec app php artisan migrate --force

# Stop the stack while preserving database and upload volumes
docker compose down
```

## Uploads and branding

The Docker stack persists Filament uploads in the `tallcms_storage_data` volume. At startup, the application recreates the public storage link and supplies the included default logo and favicon only when custom branding has not been uploaded.

Update the application name, logo, favicon, colours, and mail settings from **Admin → Settings**. Uploaded branding persists when the application container is rebuilt or recreated.

## Production notes

- Set `APP_ENV=production` and `APP_DEBUG=false`.
- Use strong, unique values for every password and `APP_KEY`.
- Keep `.env` outside Git. It is ignored by both Git and the Docker build context.
- Put the app behind a TLS-enabled reverse proxy before exposing it on the public internet.
- Back up the `tallcms_db_data` and `tallcms_storage_data` volumes before infrastructure changes.

## 📜 License

TallCMS is released under the [MIT License](LICENSE).

---

### 🐘 Author

- 2026 ©️ **Andre Riffen** - [GitHub Profile](https://github.com/andreriffen)

<a href="https://instagram.com/andreriffen"><img src="https://img.shields.io/badge/-andreriffen-maroon?style=flat-square&logo=Instagram&logoColor=white"/></a> 
<a href="https://www.linkedin.com/in/andre-gbf"><img src="https://img.shields.io/badge/-Andre%20GB%20Farias-0077B5?style=flat-square&logo=Linkedin&logoColor=white"/></a> 
<a href="mailto:andreriffen6@gmail.com"><img src="https://img.shields.io/badge/-andreriffen6@gmail.com-D14836?style=flat-square&logo=Gmail&logoColor=white"/></a>
