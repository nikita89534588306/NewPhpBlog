CREATE DATABASE IF NOT EXISTS webPhp   							/*если БД не созданна то создать*/ 
	CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;			/*с кодировкой utf8mb4_general_ci*/ 
	
/*испольщуем БД webPhp*/
USE webPhp;	
/*
-- тестовая бд
-- CREATE TABLE IF NOT EXISTS webPhp.testTable
-- (
-- 	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
-- 	txt CHAR(50) 
-- );
-- INSERT INTO testTable 
-- VALUES
-- (NULL,'Apple'),
-- (NULL,'Samsung'),
-- (NULL,'Xiaomi');
*/
/*таблица с данными о пользователях*/
CREATE TABLE IF NOT EXISTS webPhp.users
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	username VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL,
	user_password VARCHAR(255) NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
/*фейковые пользователи*/
INSERT INTO webPhp.users (username, email, user_password) 
VALUES 
( 'Лёша', 'ALEX007@mail.ru', '$2y$10$JhLnX.EhidrcFZjvktYGt.3jQrv94THERB3mGUChF2oLUH2g5Ors.'), /*assHole*/
( 'xxx', 'xxx@ass.com', '$2y$10$srZi7f3IkT.hnaIvBv9FK.N4QhlZxpXN3duPyK3GrzpsvZSvio4Hq'), /*qwerty*/
( 'Mary', 'bahama@mail.ru', '$2y$10$IjWowhPwd3lbjt5I/Ci.fee309ceM4IfEQPFiRmUF5q1KMn3X.OI6'); /*bagama*/
