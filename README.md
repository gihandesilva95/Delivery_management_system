## Delivery Management System

A simple Delivery management application built with Laravel 12, Vue.js 3.5, and MySQL.

### **Prerequisites**
	- PHP version: 8.2 - 8.4
	- Composer installed
	- Laravel 12
    - Node.js (v20.18.1) & npm (v10.8.2)
    - MySQL

## 🚀 Setup Instructions

### 1. Clone the repository
    `git clone <repository_url>`
    cd Delivery_management_system

### 2. Backend Setup (Laravel 12)
    `cd dms-backend`

    ### Install dependencies
        `composer install`

    # Copy .env file
        `cp .env.example .env`

    # Set your database host & credentials in .env

    # Run migrations
        `php artisan migrate`

    # Serve the application
        `php artisan serve`


### 3. Frontend Setup (Vue.js 3.5)

    `cd dms-frontend`

    # Install dependencies
        `npm install`

    # Run the dev server
        `npm run dev`

    #The project will be available at `  http://localhost:5173/ ` by default.

        Make sure the Laravel backend is running (usually at http://127.0.0.1:8000) and the frontend can access it.
