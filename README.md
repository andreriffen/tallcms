# TallCMS — Legacy WAMP Edition

This branch preserves the original local-development setup for TallCMS using PHP, MySQL, and WAMP/Herd. It is retained for reference and migration work; the Docker edition is the default branch for new development and deployment.

## Local setup

1. Copy the environment template:

   ```sh
   cp .env.example .env
   ```

2. Set the local MySQL connection and the required `TALLCMS_ADMIN_EMAIL` and `TALLCMS_ADMIN_PASSWORD` values in `.env`.

3. Install dependencies and generate an application key:

   ```sh
   composer install
   npm install
   php artisan key:generate
   npm run build
   ```

4. Create an empty MySQL database named `tallcms`, then initialize it:

   ```sh
   php artisan migrate --seed
   ```

5. Start Laravel or use your preferred local host:

   ```sh
   php artisan serve
   ```

   Open [http://localhost:8000/admin](http://localhost:8000/admin).

## Notes

- The initial administrator comes from `TALLCMS_ADMIN_*` in `.env`; no credentials are stored in source code.
- Keep `.env`, generated uploads, IDE files, and dependency folders out of Git.
- For Docker-based setup, uploads persistence, and deployment guidance, use the default Docker branch.

---

## 📜 License

TallCMS is released under the [MIT License](LICENSE).

---

### 🐘 Author

- 2026 ©️ **Andre Riffen** - [GitHub Profile](https://github.com/andreriffen)

<a href="https://instagram.com/andreriffen"><img src="https://img.shields.io/badge/-andreriffen-maroon?style=flat-square&logo=Instagram&logoColor=white"/></a> 
<a href="https://www.linkedin.com/in/andre-gbf"><img src="https://img.shields.io/badge/-Andre%20GB%20Farias-0077B5?style=flat-square&logo=Linkedin&logoColor=white"/></a> 
<a href="mailto:andreriffen6@gmail.com"><img src="https://img.shields.io/badge/-andreriffen6@gmail.com-D14836?style=flat-square&logo=Gmail&logoColor=white"/></a>
