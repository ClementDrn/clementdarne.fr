-- Scripts that generate database for clementdarne.fr
-- Compatible with MariaDB

-- Create database
DROP DATABASE IF EXISTS clementdarne_fr;
CREATE DATABASE clementdarne_fr;

-- Use database
USE clementdarne_fr;

-- Create tables
CREATE TABLE IF NOT EXISTS Projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visible BOOLEAN DEFAULT TRUE,
    title VARCHAR(63) NOT NULL,
    released BOOLEAN DEFAULT TRUE,
    link VARCHAR(255) NOT NULL,
    thumbnail VARCHAR(127) NOT NULL,
    summary TEXT NOT NULL,
    start_year INT NOT NULL,
    end_year INT
);
