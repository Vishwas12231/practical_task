# practical_task

## Setup Instructions

1. Clone or download the project
2. Run `composer install`
3. Run `npm install && npm run dev`
4. Copy `.env.example` to `.env` and update database + mail settings
5. Run `php artisan key:generate`
6. Run `php artisan migrate`
7. Start server with `php artisan serve`

## Features
- Separate Customer & Admin Registration
- Email verification with code
- Admin-only login
- Customers blocked from admin login
