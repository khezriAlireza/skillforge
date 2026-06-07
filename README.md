# 🎮 KDA Market (SkillForge)

> A modern Persian RTL e-commerce platform for gaming products — gift cards, game accounts, subscriptions, and digital services. Built with Laravel 10 for a fast, secure, and scalable shopping experience.

---

## 🎬 Preview

<!-- Add your demo video or GIF here -->

> 🎥 **Demo video coming soon**

<!--
Example:
https://github.com/user-attachments/assets/your-video-id.mp4

Or embed:
![Demo](./docs/preview.gif)
-->

---

## ✨ Features

| Area | Description |
|------|-------------|
| 🏪 **Storefront** | Browse categories, subcategories, and products with a RTL gaming-themed UI |
| 🛒 **Shopping Cart** | Add, update, and remove items — login required |
| 💳 **Checkout** | Place orders directly from the cart |
| 👤 **Customer Panel** | Registration, login, profile management, and order history |
| 🛡️ **Admin Dashboard** | Full CRUD for categories, products, and blog posts |
| 📋 **Order Management** | View and track customer orders from the admin panel |
| 📰 **Blog & News** | Publish articles with featured posts on the homepage |
| 🔌 **REST API (v1)** | Register, login, and manage customers via Laravel Passport |

---

## 🔄 Process

<!-- Document your workflow, architecture, or business logic here -->

---

## 🚀 How to Run

### Prerequisites

- PHP 8.1+
- Composer
- MySQL / MariaDB
- XAMPP or similar local server

### Setup

**1. Clone the repository**

```bash
git clone https://github.com/your-username/kda.git
cd kda
```

**2. Install dependencies**

```bash
composer install
```

**3. Configure environment**

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database settings:

```env
DB_DATABASE=kda
DB_USERNAME=root
DB_PASSWORD=
```

**4. Prepare the database**

```bash
php artisan migrate --seed
php artisan storage:link
php artisan passport:install
```

**5. Start the server**

```bash
php artisan serve
```

Open **[http://localhost:8000](http://localhost:8000)** in your browser.

### 🔑 Default Admin Account

| Field    | Value       |
|----------|-------------|
| Username | `admin`     |
| Password | `password`  |

> ⚠️ Change the default password before deploying to production.

### 👥 Customer Access

Register at `/customer/register` using a username, password, and optional phone number (`09xxxxxxxxx`).

---

## 📡 API (Optional)

Base URL: `/api/v1`

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| POST | `/register` | — | Register a customer |
| POST | `/login` | — | Login and receive token |
| GET | `/customer/list` | Bearer | List customers (admin only) |

---

## 📄 License

MIT
