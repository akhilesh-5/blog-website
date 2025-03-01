# Inkspire

![Inkspire Banner](assets/img/banner.png)

**Inkspire** is a Laravel-based blogging platform designed for writers, storytellers, and content creators. It provides an elegant and user-friendly interface for managing blog posts, user authentication, and media uploads.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Routes](#routes)
- [Security](#security)
- [Contribution](#contribution)
- [License](#license)

## Features

### Authentication & User Management
- Secure user authentication (Login/Register/Logout)
- Password reset and email verification
- User dashboard for managing posts

### Blog Management
- Create, edit, delete, and publish blog posts
- View post details with SEO-friendly URLs
- Markdown and rich text support

### Image Uploads
- Secure image and media upload handling
- File storage using Laravel's filesystem
- Automatic resizing and optimization

### Comments & Engagement
- Commenting system for blog posts
- Like and share functionality
- Email notifications for new comments

### Admin Panel
- Role-based access control (Admin/Author/Reader)
- Manage users, posts, and site settings

### Responsive Design
- Mobile-friendly UI using Bootstrap 5
- Dark mode support

## Installation

### Prerequisites
Ensure you have the following installed:
- PHP 8.0+
- Composer
- MySQL or SQLite
- Node.js & npm

### Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/inkspire.git
   cd inkspire
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Set up environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure the `.env` file with database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inkspire_db
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Access the site at `http://localhost:8000`
- Register or log in to access the dashboard
- Create, edit, or delete blog posts

## Routes

| Method | URI                | Action |
|--------|--------------------|--------|
| GET    | `/`                | Home Page |
| GET    | `/login`           | Show Login Form |
| POST   | `/post-login`      | Handle Login |
| GET    | `/registration`    | Show Register Form |
| POST   | `/post-registration` | Handle Registration |
| GET    | `/dashboard`       | User Dashboard |
| GET    | `/blogs`           | View All Blogs |
| GET    | `/blogs/{id}`      | View Blog Post |
| POST   | `/blogs`           | Create Blog Post |
| PUT    | `/blogs/{id}`      | Update Blog Post |
| DELETE | `/blogs/{id}`      | Delete Blog Post |

## Security
- CSRF protection enabled for all forms
- Authentication middleware for protected routes
- Password hashing using bcrypt

## Contribution
We welcome contributions! To contribute:
1. Fork the repository
2. Create a new branch (`feature/your-feature`)
3. Commit your changes (`git commit -m 'Add new feature'`)
4. Push to your fork (`git push origin feature/your-feature`)
5. Open a Pull Request

## License
Inkspire is open-source software licensed under the [MIT license](LICENSE).

