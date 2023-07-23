# Customer Info Hub

This project is about customer information management system.

## Prerequisites

Before you begin, make sure you have the following installed on your local machine:

- PHP 8.1
- Composer (https://getcomposer.org/)
- Node.js (https://nodejs.org/)
- npm (comes bundled with Node.js)

## Getting Started

Follow these steps to run the project on your local machine:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/your-project.git
   cd your-project

## Installation Steps

### 1. Require to install all package to local server
- open command prompt and install php dependencies
    ```bash
  composer install
  ```
- install javascript dependencies
  ```bash
  npm install
  ```

### 2. Add DB credentials & APP_URL
- Make sure to create new database and add your database credentials to your .env file.
    ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=customer-info-hub
  DB_USERNAME=root
  DB_PASSWORD=

- Add APP_URL
    ```bash
  APP_URL=http://customer-info-hub.local


-  If using virtual host, update the DocumentRoot and Directory directives to point to the "public" folder of your Laravel project at Apache Virtual Host
    ```bash
   DocumentRoot "C:/laragon/www/customer-info-hub/public"
   <Directory "C:/laragon/www/customer-info-hub/public">
    AllowOverride All
    Require all granted
   </Directory>
   ```
   
### 3. Run Migration
```bash
  php artisan migrate
  ```

### 4. Start Development server
```bash
php artisan serve
npm run dev
```
- The server will be running at `http://localhost:8000`






