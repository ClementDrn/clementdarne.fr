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
    title VARCHAR(63) NOT NULL,
    directory VARCHAR(63) NOT NULL,
    visible BOOLEAN DEFAULT TRUE,
    released BOOLEAN DEFAULT TRUE,
    github_path VARCHAR(255) NOT NULL,
    summary TEXT NOT NULL,
    start_year INT NOT NULL,
    end_year INT
);
