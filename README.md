# Virtual Kitchen

A dynamic database-driven website for food enthusiasts to explore and share recipes. Built with Laravel and MySQL.

## Features

- Browse, filter, and search recipes
- View detailed recipe information
- User registration and authentication
- Create and manage your own recipes
- Modern, responsive design
- Secure data handling

## Security Features

1. Authentication using Laravel's built-in authentication system
2. Form validation and sanitization
3. CSRF protection
4. Password hashing
5. Authorization for recipe management
6. SQL injection prevention through Laravel's query builder and Eloquent ORM
7. XSS protection through Laravel's automatic escaping

## Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js and NPM (for frontend assets)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd Virtual_Kitchen
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install and compile frontend assets:
```bash
npm install
npm run dev
```

4. Copy the example environment file and configure your database:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database connection in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=virtual_kitchen
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations and seed the database:
```bash
php artisan migrate:fresh --seed
```

8. Create a symbolic link for storage:
```bash
php artisan storage:link
```

## Test Account

You can use the following test account to log in:
- Email: test@example.com
- Password: password

## Development

To start the development server:
```bash
php artisan serve
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
