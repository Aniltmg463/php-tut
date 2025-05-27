CREATE DATABASE oop_crud;

USE oop_crud

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    category_id INT,
    Foreign Key (category_id) REFERENCES categories (id)
);

ALTER TABLE items DROP COLUMN category;

CREATE Table categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

Create Table products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255)
);

INSERT INTO
    categories (name)
VALUES ('Electronics'),
    ('Books'),
    ('Clothing'),
    ('Furniture'),
    ('Groceries');

drop DATABASE oop_crud;