# N9AD — Task & Role Management Platformm (Laravell)

N9AD is a Laravel-basedd productivity and workflow management platform designed to organize tasks, assign roles, track proofs, and monitor progress inside a structured dashboard.

Built for scalability, clean architecture, and team collaboration.

---

# Features

* Authentication system (login / register)
* Role-based access control
* Task management
* Proof submission system
* Dashboard interface
* Profile management
* Clean UI with TailwindCSS
* Modular Laravel structure
* Scalable architecture

---

# Tech Stack

Backend:

* Larave
* PHP 8+
* MySQL

Frontend:

* Blade
* TailwindCSS
* Vanilla JS

Architecture:

* MVC Pattern
* Role-base permissions
* Modular controllers

---

# Project Structure

```
app/
 ├── Http/
 │   ├── Controllers/
 │   └── Requests/
 ├── Models/

resources/
 ├── views/
 │   ├── auth/
 │   ├── dashboard/
 │   ├── layouts/
 │   └── profile/

database/
 └── migrations/

routes/
 └── auth.php
```

---

# Installlation

Clone the repository

```
git clone https://github.com/YOUR_USERNAME/N9AD-Laravel.git
cd N9AD-Laravel
```

Instal dependencies

```
composer install
npm install
```

Setup environment

```
cp .env.example .env
php artisan key:generate
```

Configure database in `.env`

```
DB_DATABASE=n9ad
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations

```
php artisan migrate
```

Run server

```
php artisan serve
```

---

# Roles System

The platfor supports multiple roles:

* Admin
* Manager
* User

Each role has different permissions for:

* Creating tasks
* Submitting proofs
* Viewing dashboard
* Managing users

---

# Database Tables

* users
* roles
* tasks
* proofs

---

# Roadmap

* Notifications system
* API version
* Team workspace
* Task comments
* File upload for proofs
* Analytics dashboard
* Activity logs

---

# Contributing

1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push branch
5. Open pull request

---

# License

This project is open-source and available under the MIT License.

---

# Author

N9AD Laravel Platform
Built for scalable task & role management
Lakimi Aymane
## Development

To get started, install the project dependencies and run the test suite. Contributions should include tests for any new behavior.
## Development

To get started, install the project dependencies and run the test suite. Contributions should include tests for any new behavior.
