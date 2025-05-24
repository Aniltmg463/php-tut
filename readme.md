# PHP MVC Blog System

A simple blog application built using a custom PHP MVC (Model-View-Controller) framework.  
This project is beginner-friendly and ideal for learning PHP OOP, routing, authentication, and CRUD operations.

## 🚀 Features

- ✅ Custom MVC framework (no external dependencies)
- ✅ User registration and login
- ✅ Post CRUD (Create, Read, Update, Delete)
- ✅ Session-based authentication
- ✅ MySQL database integration
- ✅ Clean file structure for easy understanding

---

## 📁 Project Structure
```
project/
├── assets/ # For css/js/images
│ └── css
│   └── style.css
│ └── js
│ └── images
│
├── config/ # Database config
│ └── database.php
│
├── controllers/ # Controller classes
│ ├── AuthController.php
│ └── PostController.php
│
├── core/ # Core framework (MVC base)
│ ├── App.php
│ ├── Controller.php
│ └── Model.php
│
├── models/ # Model classes
│ ├── User.php
│ └── Post.php
│
├── views/ # View files (HTML/PHP)
│ ├── auth/
│ ├── post/
│ └── layouts/
│
└── index.php # Entry point
```

---

## 🧑‍💻 Requirements

- PHP 7.4 or higher
- MySQL or MariaDB
- Apache or Nginx

---

## ⚙️ Installation

1. **Clone the repo**

```bash
git clone https://github.com/rawbinn/basic-mvc-structure-using-php.git
cd basic-mvc-structure-using-php
```
2. **Create the database and tables**
You can find sql in migrations directory

3. **Configure database connection**

Edit config/database.php:

```
    <?php
    return [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '', // set your DB password
        'database' => 'your_database_name'
    ];
```

4. **Run the app**
Place the project in your web server’s root directory (e.g., htdocs for XAMPP)
Start Apache/MySQL

Visit:
http://localhost/basic-mvc-structure-using-php/index.php

🧪 Demo Routes
Feature	URL
```
Home	/index.php
Register	/index.php?url=auth/register
Login	/index.php?url=auth/login
Post List	/index.php?url=post/index
Create Post	/index.php?url=post/create
Edit Post /index.php?url=post/edit/1
```








