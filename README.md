# Laravel Filament Project

This README provides step-by-step instructions for setting up and running the project locally.

## Prerequisites
Make sure you have the following installed on your machine:

- PHP 8.3+
- Composer
- Node.js & npm
- MySQL or another supported database
- Laravel 10+

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-repo/your-project.git
   cd your-project
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Copy and configure the environment file:**
   ```bash
   cp .env.example .env
   ```
   Then, update `.env` with your database credentials.

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

## Running the Project

1. **Start the development server:**
   ```bash
   php artisan serve
   ```

2. **Compile front-end assets:**
   ```bash
   npm run dev
   ```

3. **Access the application in the browser:**
   ```
   http://127.0.0.1:8000
   ```

## Filament Admin Panel

1. **Access Filament:**
   ```
   http://127.0.0.1:8000/admin
   ```

## Additional Commands

- Clear cache:
  ```bash
  php artisan cache:clear
  ```
- Clear optimized files:
  ```bash
  php artisan optimize:clear
  ```
- View routes:
  ```bash
  php artisan route:list
  ```
