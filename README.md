# Library System

## Description
Library System.

## Requirements
- PHP
- Composer
- MySQL
- Laravel

## Installation
1. Clone this repository to your local machine:
   `git clone https://github.com/[username-anda]/library-system.git`
2. Navigate to the project directory:
   `cd library-system`
3. Install the PHP dependencies via Composer:
   `composer install`
4. Copy the example environment file and configure it:
   `cp .env.example .env`
5. Generate the application key:
   `php artisan key:generate`
6. Open the `.env` file and configure your database settings for XAMPP:
   - DB_DATABASE=library_system
   - DB_USERNAME=root
   - DB_PASSWORD= 
7. Run the database migrations to create the tables:
   `php artisan migrate`
8. Start the local development server:
   `php artisan serve`
9. Open `http://localhost:8000` in your browser.

## Author
Nisa Ainul Hakim - 2410631250026