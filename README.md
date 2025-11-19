# Simple Laravel Blog

<p align="center">
  <img src="screenshot.png" alt="Blog Screenshot" width="600">
</p>

## Overview

A small Laravel-powered blog application that allows creating, editing, and deleting comments. The project is built with a clean structure, follows Laravel best practices, and provides a simple interface for interacting with blog posts.

## Features

* Create, read, update, and delete comments
* Simple and clean UI
* Uses Laravel's routing, controllers, and Eloquent ORM
* CSRF-protected forms
* Validation for all comment actions

## Tech Stack

* Laravel Framework
* Blade Templates
* Eloquent ORM
* MySQL (or any Laravel-supported database)

## Installation

```bash
# Install dependencies
composer install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations\php artisan migrate

# Start development server
php artisan serve
```

## Project Structure

* **/app/Models/Comment.php** – Comment model
* **/app/Http/Controllers/CommentController.php** – Handles comment CRUD operations
* **/resources/views/** – Blade templates for posts and comments
* **/routes/web.php** – Routes for blog functionality

## Screenshot

Place your website screenshot in the project root with the name: `screenshot.png`.

---

## Contributing

Pull requests are welcome. For major changes, open an issue first to discuss what you’d like to change.

## License

This project is open-sourced and licensed under the MIT License.
