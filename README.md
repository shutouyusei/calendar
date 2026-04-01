# Calendar App

A shared schedule calendar application built with Laravel. Multiple users can share schedules, check dates, add events, and view event details.

## Features

- **Shared Calendar** — View a monthly calendar with highlighted dates that have events
- **Event Management** — Create, view, edit, and delete events with title, date, and description
- **My Page** — View your own events in one place
- **Authentication** — User registration and login powered by Laravel Breeze
- **Month Navigation** — Browse calendars by month

## Tech Stack

- **Backend**: PHP 8.0+ / Laravel 9
- **Auth**: Laravel Breeze / Sanctum
- **Frontend**: Blade templates, Tailwind CSS, Vite
- **Database**: MySQL 8.0
- **Infrastructure**: Docker (Laravel Sail)

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

# Install dependencies
composer install
npm install

# Environment configuration
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then run migrations
php artisan migrate

# Build frontend assets
npm run build

# Start the development server
php artisan serve
```

### Docker (Laravel Sail)

```bash
# Clone the repository
git clone https://github.com/shutouyusei/calendar.git
cd calendar

# Install Composer dependencies (using a temporary container)
docker run --rm -v $(pwd):/app composer install

# Environment configuration
cp .env.example .env

# Start Sail
./vendor/bin/sail up -d

# Generate application key
./vendor/bin/sail artisan key:generate

# Run migrations
./vendor/bin/sail artisan migrate

# Install and build frontend assets
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

The application will be available at `http://localhost`.

## Usage

1. Register an account or log in
2. The dashboard displays a monthly calendar — dates with events are highlighted in red
3. Click a date to view all events scheduled for that day
4. Use the "Add Event" form to create new events with a date, title, and description
5. Click an event to view its details, edit, or delete it
6. Visit "My Page" to see all your events in one place

## Testing

```bash
# Local
php artisan test

# With Sail
./vendor/bin/sail test
```

## License

This project is open-sourced under the [MIT License](LICENSE).
