CREATE DATABASE IF NOT EXISTS hotelinking_test;
USE hotelinking_test;

CREATE USER 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON hotelinking_test.* TO 'root'@'%';
FLUSH PRIVILEGES;