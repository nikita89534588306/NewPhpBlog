CREATE DATABASE IF NOT EXISTS webPhp   							/*если БД не созданна то создать*/ 
	CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;			/*с кодировкой utf8mb4_general_ci*/ 
	
/*испольщуем БД webPhp*/
USE webPhp;	

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

--таблица с данными о пользователях
CREATE TABLE IF NOT EXISTS webPhp.users
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	username VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL,
	user_password VARCHAR(50) NOT NULL,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- INSERT INTO webPhp.users (username, email, user_password) 
-- VALUES 
-- ( 'Лёша', 'Alex@mail.ru', '1234'),
-- ( 'Андрей', 'XXX@mail.ru', '1234'),
-- ( 'Маша', 'assHole@mail.ru', '1234');
