# Calendar App

A shared schedule calendar application built with Laravel. Multiple users can share schedules, check dates, add events, and view event details.

## Screenshots

| Top Page | Calendar |
|:---:|:---:|
| ![Top Page](docs/screenshots/home.png) | ![Calendar](docs/screenshots/calendar.png) |

| Date View | Event List |
|:---:|:---:|
| ![Date View](docs/screenshots/calendar_date.png) | ![Event List](docs/screenshots/event_list.png) |

| Create Event | My Page |
|:---:|:---:|
| ![Create Event](docs/screenshots/event_create.png) | ![My Page](docs/screenshots/mypage.png) |

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

- Docker & Docker Compose

## Setup

```bash
# Clone the repository
git clone https://github.com/shutouyusei/calendar.git
cd calendar

# Install Composer dependencies (using a temporary container)
docker run --rm -v $(pwd):/app composer:2.5 install --ignore-platform-reqs

# Environment configuration
cp .env.example .env

# Build and start containers
./vendor/bin/sail build
./vendor/bin/sail up -d

# Generate application key
./vendor/bin/sail artisan key:generate

# Run migrations and seed demo data
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed

# Install and build frontend assets
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

The application will be available at `http://localhost`.

### Demo Accounts

| Name | Email | Password |
|------|-------|----------|
| Alice | alice@example.com | password |
| Bob | bob@example.com | password |
| Charlie | charlie@example.com | password |

## Usage

1. Log in with a demo account or register a new one
2. The dashboard displays a monthly calendar — dates with events are highlighted
3. Click a date to view all events scheduled for that day
4. Use "予定を追加" to create new events with a date, title, and description
5. Click an event to view its details, edit, or delete it
6. Visit "Mypage" to see only your own events

## Testing

```bash
./vendor/bin/sail test
```

## License

This project is open-sourced under the [MIT License](LICENSE).
