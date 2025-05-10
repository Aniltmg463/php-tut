
# Student Management System 📚

This is a simple PHP-based Student Management System project built with best coding practices, security considerations, and clear code structure. It is designed for educational purposes and intended to help students understand the basics of CRUD operations (Create, Read, Update, Delete) using PHP and MySQL.

---

## 🚀 Features

- Add new students
- View list of all students
- Edit student details
- View individual student details
- Delete a student
- Form validations and session-based flash messages
- Modular file structure (actions, views, and functions)
- Uses **MySQLi** with **prepared statements** for security

---

## 📂 Project Structure

student-management/

    ├── actions/ # Contains store, update, delete logic
    ├── config/
    │ └── database.php # Database connection file
    ├── functions/
    │ └── student.php # Reusable student-related functions
    ├── views/ # UI pages (create, edit, index, view)
    ├── index.php # Entry point and route dispatcher
    └── README.md # Project documentation


---

## 🛠️ Requirements

- PHP 7.4 or above
- MySQL
- Web server (Apache or Nginx)

---

## ⚙️ Setup Instructions

1. Create Database
2. Run migrations sql
3. Open config/database.php and update credentials.

>     $host = 'localhost';
>     $db = 'student_db';
>     $user = 'your_mysql_username';
>     $pass = 'your_mysql_password';


4. Run the application

# Author
Contact me @ rawbinnn@gmail.com
