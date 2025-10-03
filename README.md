# hyper-hire-tinder-apps
Hyper Hire Assessment Tinder Apps

# Hyper Hire Soo Carrots - Laravel Backend
Backend service built with **Laravel 12** for a technical assessment.
This project provides API to manage `People`, handle **like/dislike interactions**, and notify when a person becomes **popular** >50 likes.
It also includes Swagger/OpenAPI documentation.

---

## Features
- **People Mangement**
    - List people with pagination
    - Like & dislike people
    - Get list of like people by an actor
- **Popular People Notifiation**
    - Scheduled artisan command to notify admin if someone has >50 likes
- **Swagger Documentation**
    - Auto generated API docs via annotations

---

## Requirements
- PHP 8.4+
- Composer
- Laravel 12
- MySQL / MariaDB
- Mail configuration

---

## Instalation

1. Clone repository
```bash
git clone https://github.com/fajarpostman/hyper-hire-tinder-apps.git
cd hyper-hire-tinder-apps/laravel/hyper-hire-soo-carrots-laravel
```

2. Install dependecies
```bash
composer install
```

3. Copy environment file & configure database/mail
```bash
cp .env.example .env
php artisan key:generate
```

.env values
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hyper_hire_soo_and_carrot
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="Laravel App"
```
4. Run migaration & seeders

```bash
php artisan migrate --seed
```

5. Run the development server

```bash
php artisan serve
```

6. Access Swagger API docs at:

```bash
php artisan l5-swagger:generate
http://127.0.0.1:8000/api/documentation
```

![swagger_documentation](image.png)

7. Check Popular People
```bash
php artisan check:popular
```

---

## API Endpoints

| Method | Endpoint | Description |
| :----- | :-------:| -----------:|
| GET | /api/v1/people | Get list of people |
| POST | /api/v1/people{id}/like | Like a person |
| POST | /api/v1/people{id}/dislike | Dislike a person |
| GET | /api/v1/people/liked?actor_id=1 | Get liked people by actor |

---

## Database Schema

- People Table
```sql
CREATE TABLE people (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age TINYINT UNSIGNED NOT NULL,
    pictures VARCHAR(255) NULL,
    latitude DECIMAL(10,7) NULL,
    longitude DECIMAL(10,7) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

- Likes Table
```sql
CREATE TABLE likes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person_id BIGINT UNSIGNED NOT NULL,
    actor_id BIGINT UNSIGNED NULL,
    type ENUM('like','dislike') NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    CONSTRAINT fk_likes_person FOREIGN KEY (person_id) REFERENCES people(id) ON DELETE CASCADE
);
```

---

## Author

Develop by **Fajar Postman**
**Email**: fajardwirianto3@gmail.com
**Linkedin**: [Fajar Dwi Rianto](https://www.linkedin.com/in/fajardwirianto/)
