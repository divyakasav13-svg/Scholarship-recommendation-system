
CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100),
password VARCHAR(100),
course VARCHAR(100),
category VARCHAR(50),
income INT,
percentage FLOAT,
gender VARCHAR(10)
);

CREATE TABLE scholarships (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200),
course VARCHAR(100),
category VARCHAR(50),
min_percentage FLOAT,
income_limit INT,
gender VARCHAR(20),
deadline DATE
);

CREATE TABLE applications (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
scholarship_id INT,
status VARCHAR(50) DEFAULT 'Pending',
apply_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100),
password VARCHAR(100)
);

INSERT INTO admin(username,password)
VALUES('admin','admin123');