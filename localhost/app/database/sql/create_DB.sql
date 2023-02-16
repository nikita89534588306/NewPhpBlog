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
	email VARCHAR(100) UNIQUE NOT NULL,
	user_password VARCHAR(255) NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	
);
/*фейковые пользователи*/
INSERT INTO webPhp.users (username, email, user_password) 
VALUES 
( 'Лёша', 'ALEX007@mail.ru', '$2y$10$JhLnX.EhidrcFZjvktYGt.3jQrv94THERB3mGUChF2oLUH2g5Ors.'), /*assHole*/
( 'xxx', 'xxx@ass.com', '$2y$10$srZi7f3IkT.hnaIvBv9FK.N4QhlZxpXN3duPyK3GrzpsvZSvio4Hq'), /*qwerty*/
( 'Mary', 'bahama@mail.ru', '$2y$10$IjWowhPwd3lbjt5I/Ci.fee309ceM4IfEQPFiRmUF5q1KMn3X.OI6'); /*bagama*/

INSERT INTO webPhp.users (username, email, user_password) 
VALUES 
( 'god', 'god@heaven', '$2y$10$JhLnX.EhidrcFZjvktYGt.3jQrv94THERB3mGUChF2oLUH2g5Ors.');, /*assHole*/

/*создаем таблицу с ролями пользователей*/
CREATE TABLE IF NOT EXISTS webPhp.roleVariants(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_role VARCHAR(100) NOT NULL
)
/*добавляем роли пользователей*/
INSERT INTO webPhp.roleVariants (id, name_role) 
VALUES 
(1, 'user'),
(2, 'admin'); 

/*добавляем колонку с ролями пользователей (по умолчанию 1 - user)*/
ALTER TABLE users 
ADD user_role INT DEFAULT(1) REFERENCES roleVariants(id);

/*создаем катигории*/
CREATE TABLE IF NOT EXISTS webPhp.category_posts(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_category VARCHAR(120) UNIQUE NOT NULL,
	description_category TEXT NOT NULL
)
/*фейковые категории*/
INSERT INTO webPhp.category_posts (name_category, description_category) 
VALUES 
( 'БОЛЬШИЕ_ТАЧКИ', '');
('мамка стифлера', 'я просто обажаю милф');
