# Laravel Multi-Guard Authentication System

A custom role-based authentication system in Laravel with independent guards, middleware, routes, and controllers for Admin and Agent users.


## Requirements

- PHP 8.1+

## Installation

1. Clone the repository:

git clone https://github.com/yourusername/laravel-multi-auth.git
cd laravel-multi-auth



2. Install dependencies:

composer install


3. Create your environment file:

cp .env.example .env


4. Configure your database in the `.env` file

5. Generate application key:

php artisan key:generate


6. Run migrations and seeders:

php artisan migrate --seed


7. Start the development server:

php artisan serve


## Usage

### Admin Login
- URL: `/admin/login`
- Demo Credentials:
  - Email: admin@gmail.com
  - Password: password

### Agent Login
- URL: `/agent/login`
- Demo Credentials:
  - Email: agent@gmail.com
  - Password: password

## Structure

- **Guards**: Custom authentication guards for admin and agent users
- **Middleware**: Role-based access control middleware
- **Routes**: Separate route groups for each user type
- **Controllers**: Independent controllers for admin and agent functionality
- **Views**: Dedicated login forms and dashboards for each role

