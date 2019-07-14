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

DROP DATABASE hash_test;
CREATE DATABASE hash_test;
-- CREATE DATABASE hash_test CHARACTER SET utf8;

USE hash_test;

DROP TABLE accounts;
CREATE TABLE accounts(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	login_id VARCHAR(10) NOT NULL UNIQUE,
	password_hash VARCHAR(255) NOT NULL,
	name VARCHAR(20) NOT NULL
);
