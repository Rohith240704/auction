-- Create Database
CREATE DATABASE IF NOT EXISTS auction_db;
USE auction_db;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user'
);

-- Insert Users (passwords are plaintext here, later you can hash with PHP)
INSERT INTO users (username, password, role) VALUES
('admin', 'admin123', 'admin'),
('john', 'john123', 'user'),
('sarah', 'sarah123', 'user');

-- Items Table
CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    current_price DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Auction Items
INSERT INTO items (title, description, image, current_price) VALUES
('Apple iPhone 14 Pro', 'Latest iPhone model with 256GB storage.', 'iphone.jpg', 900.00),
('MacBook Pro 16"', 'Powerful Apple laptop for professionals.', 'macbook.jpg', 2100.00),
('Sony DSLR Camera', 'Professional 24MP DSLR with 18-55mm lens.', 'camera.jpg', 600.00);

-- Bids Table
CREATE TABLE bids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    item_id INT,
    amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (item_id) REFERENCES items(id)
);
