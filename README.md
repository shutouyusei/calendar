# Calendar App

A shared schedule calendar application built with Laravel. Multiple users can view, create, and share events — useful for coordinating group plans, shift scheduling, and more.

## Features

- **Shared Calendar View** — Interactive monthly calendar with visual indicators for days that have events
- **Event Management** — Create events with date, title, and description
- **Event Details** — Click any event to view its full details
- **My Page** — View all your own events in one place
- **Authentication** — User registration and login powered by Laravel Breeze

## Tech Stack

- **Backend**: PHP 8.0+ / Laravel 9
- **Authentication**: Laravel Breeze / Laravel Sanctum
- **Frontend**: Blade templates, Tailwind CSS, Alpine.js
- **Build**: Vite
- **Database**: MySQL 8.0
- **DevOps**: Docker (Laravel Sail)
- **Testing**: PHPUnit

## Prerequisites

- PHP 8.0.2+
- Composer
- Node.js & npm
- Docker & Docker Compose (for Docker setup)

## Setup

### Local Development

```bash
# Clone the repository
git clone https://github.com/shutouyusei/calendar.git
cd calendar

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Update .env with your database credentials, then run migrations
php artisan migrate

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

The app will be available at `http://localhost:8000`.

### Docker (Laravel Sail)

```bash
# Clone the repository
git clone https://github.com/shutouyusei/calendar.git
cd calendar

# Install PHP dependencies (using a temporary container)
docker run --rm -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs

# Configure environment
cp .env.example .env

# Start containers
./vendor/bin/sail up -d

# Generate application key
./vendor/bin/sail artisan key:generate

# Run database migrations
./vendor/bin/sail artisan migrate

# Install Node dependencies and build assets
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

The app will be available at `http://localhost`.

phpMyAdmin is available at `http://localhost:8080` for database management.

## Usage

1. Register an account or log in
2. The dashboard displays a monthly calendar — dates with events are highlighted in red
3. Click a date to see all events scheduled for that day
4. Use "Add Event" to create a new event with a date, title, and description
5. Visit "My Page" to see all events you have created

## Testing

```bash
# Local
php artisan test

# Docker
./vendor/bin/sail test
```

## License

This project uses the Laravel framework, which is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
