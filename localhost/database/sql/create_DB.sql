CREATE DATABASE IF NOT EXISTS webPhp   							/*если БД не созданна то создать*/ 
	CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;			/*с кодировкой utf8mb4_general_ci*/ 
	
/*испольщуем БД webPhp*/
USE webPhp;	
CREATE TABLE IF NOT EXISTS webPhp.testTable
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	txt CHAR(50) 
);
INSERT INTO testTable 
VALUES
(NULL,'Apple'),
(NULL,'Samsung'),
(NULL,'Xiaomi');