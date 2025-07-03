CREATE DATABASE registration_db;
USE registration_db;

CREATE TABLE student_tb (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    mobile VARCHAR(10),
    gender VARCHAR(10),
    dob DATE,
    address TEXT,
    city VARCHAR(50),
    pin_code VARCHAR(6),
    state VARCHAR(50),
    country VARCHAR(50),
    hobbies TEXT,
    qualification TEXT,
    courses_applied TEXT
);
SELECT * FROM registrations;

