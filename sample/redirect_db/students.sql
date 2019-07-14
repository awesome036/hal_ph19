cd C:\xampp\mysql\bin
mysql -u root -h localhost

cd /Applications/MAMP/Library/bin
./mysql -u root -h localhost -proot

cd /Applications/XAMPP/xamppfiles/bin
./mysql -u root -h localhost

set character_set_client=sjis;
set character_set_connection=utf8;
set character_set_results=sjis;
set character_set_server=utf8;

DROP DATABASE ph22_test;
CREATE DATABASE ph22_test;
-- CREATE DATABASE ph22_test CHARACTER SET utf8;

USE ph22_test;

DROP TABLE students;
CREATE TABLE students(
	class CHAR(8),
	no INT,
	name VARCHAR(20),
	PRIMARY KEY(class, no)
);

DELETE FROM students;
INSERT INTO students VALUES ('IH12A335', '1', 'あんどう');
INSERT INTO students VALUES ('IH12A335', '2', 'いかり');
INSERT INTO students VALUES ('IH12B335', '1', 'いしい');

SELECT * FROM students;
