    CREATE DATABASE ProductDB;

USE ProductDB;

CREATE TABLE Products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    long_description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    purchase_date DATE NOT NULL,
    vendor ENUM('hp', 'dell', 'apple') NOT NULL
);
