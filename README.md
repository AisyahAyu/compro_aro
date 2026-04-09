# Company Profile ARO - Laravel Web Application

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![Vite](https://img.shields.io/badge/Vite-7.x-646CFF.svg)](https://vitejs.dev)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.x-38B2AC.svg)](https://tailwindcss.com)

A comprehensive and dynamic Company Profile (Compro) application built with Laravel 11. This platform features a sleek frontend for users and a robust admin dashboard for managing all content dynamically, including products, solutions, activities, and career opportunities.

---

## 🎨 Wireframe & UI Overview

The application is designed with a modern, responsive user interface focusing on clarity and professional aesthetics.

### Key Layouts:
- **Landing Page (Home)**: Features a dynamic banner, key business statistics, an overview of the company, and featured products/solutions.
- **About Us**: Segregated into dedicated sections for Visi-Misi, Team Members, Technology Partners, Brands, Legalities, and Work Processes.
- **Product Catalog**: Advanced catalog with search functionality and filtering by **Categories** and **Platforms**.
- **Solusi (Solutions)**: Detailed overview of business solutions provided by ARO.
- **Aktivitas (Activities)**: A news/blog section to keep users updated on company events and milestones.
- **Career Portal**: Integrated job vacancy listings with a direct application system including file uploads for CVs.
- **Admin Dashboard**: A secure, private interface for administrators to manage every piece of content on the site without touching the code.

---

## 🏗️ Folder Structure

The project follows the standard Laravel directory structure with specific organization for business logic and UI components:

```text
compro_aro/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/             # Controllers for administrative tasks (CRUD)
│   │   └── ...                # Frontend controllers (Home, Career, etc.)
│   ├── Models/                # Eloquent models (Product, Banner, Job, Aktivitas, etc.)
│   └── ...
├── database/
│   ├── migrations/            # Database schema definitions
│   └── seeders/               # Database seeders for initial data
├── docs/
│   └── prototypes/            # Design wireframes and UI prototypes
├── public/                    # Compiled assets and uploaded media
├── resources/
│   ├── css/                   # Tailwind CSS source files
│   ├── js/                    # JavaScript & Vite entry points
│   └── views/
│       ├── admin/             # Blade templates for back-office management
│       ├── layouts/           # Master layouts (frontend & admin)
│       ├── partials/          # Reusable UI components (Navbar, Footer, Sidebar)
│       └── ...                # Page-specific views (Solusi, Aktivitas, Karir)
├── routes/
│   └── web.php                # Definition of all frontend and admin routes
├── .env                       # Environment configuration
├── composer.json              # PHP dependencies
└── package.json               # Frontend dependencies & scripts
```

---

## ⚙️ Tech Stack

- **Framework**: [Laravel 11.x](https://laravel.com/)
- **Frontend Engine**: [Blade Templates](https://laravel.com/docs/11.x/blade)
- **Styling**: [Tailwind CSS 4.x](https://tailwindcss.com/)
- **Bundler**: [Vite 7.x](https://vitejs.dev/)
- **Database**: MySQL / MariaDB
- **State Management**: [Alpine.js](https://alpinejs.dev/) (typically paired with modern Laravel)

---

## 🚀 Getting Started

Follow these steps to set up the project locally:

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL / MariaDB

### Installation

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd compro_aro
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   Copy the `.env.example` to `.env` and configure your database settings.
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Database Migration**
   Run the migrations to create the necessary tables.
   ```bash
   php artisan migrate
   ```

7. **Compile Assets**
   Start the Vite development server.
   ```bash
   npm run dev
   ```

8. **Run the Application**
   ```bash
   php artisan serve
   ```
   The site will be accessible at `http://127.0.0.1:8000`.

---

## 🛡️ License

This project is proprietary software for **AisyahAyu / ARO**. All rights reserved.
