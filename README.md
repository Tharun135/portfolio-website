# iGLOO Inc. — Official Website

A modern, premium marketing website built with **Laravel 10**, inspired by the aesthetic of [igloo.inc](https://www.igloo.inc/).

![Hero Section](public/images/hero_ice_crystal.png)

## ✨ Features

- 🌑 Dark, premium SaaS aesthetic with cool grey palette
- ⬡ HUD-style UI with monospace tech typography (`Space Grotesk` + `Space Mono`)
- 🎇 Animated particle canvas hero section
- 🃏 3D tilt-effect portfolio cards with metadata overlays
- 📱 Fully responsive & mobile-friendly layout
- 🌊 Scroll-based fade/slide animations via IntersectionObserver
- 🖱️ Custom cursor with magnetic hover effects
- 📬 Contact form with database persistence
- 📰 Newsletter subscription endpoint

## 🗂️ Pages

| Route | Page |
|-------|------|
| `/` | Home — Full 9-section landing page |
| `/about` | About — Team, story, values |
| `/portfolio` | Portfolio — Company grid |
| `/portfolio/{slug}` | Portfolio Item — Company detail |
| `/manifesto` | Manifesto — Brand philosophy |
| `/contact` | Contact — Form with validation |
| `/privacy` | Privacy Policy |
| `/terms` | Terms of Service |

## 🚀 Getting Started

### Requirements

- PHP 8.1+
- Composer
- MySQL

### Installation

```bash
# 1. Clone the repo
git clone https://github.com/YOUR_USERNAME/igloo-website.git
cd igloo-website

# 2. Install PHP dependencies
composer install

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
# DB_DATABASE=igloo_website
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Create the database
mysql -u root -e "CREATE DATABASE igloo_website;"

# 6. Run migrations
php artisan migrate

# 7. Start the dev server
php artisan serve
```

Open **http://localhost:8000** 🎉

### Quick Preview (No PHP needed)

Open `public/preview.html` directly in any browser.

## 🎨 Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | Laravel 10 (PHP 8.1+) |
| Frontend | Vanilla HTML, CSS, JavaScript |
| Database | MySQL |
| Fonts | Space Grotesk, Space Mono (Google Fonts) |
| Animations | CSS transitions + IntersectionObserver API |
| Canvas | HTML5 Canvas (particle system) |

## 🗃️ Project Structure

```
├── app/Http/Controllers/
│   ├── PageController.php
│   ├── ContactController.php
│   └── NewsletterController.php
├── public/
│   ├── css/app.css          ← Full design system
│   ├── js/app.js            ← Animations & interactions
│   └── images/              ← 3D generated assets
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── components/          ← navbar, footer
│   └── pages/               ← All page templates
└── routes/web.php
```

## 📄 License

MIT License © 2026 Igloo, Inc.
