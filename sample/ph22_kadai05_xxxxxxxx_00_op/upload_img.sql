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

DROP DATABASE ph22_kadai05_xxxxxxxx_00;
CREATE DATABASE ph22_kadai05_xxxxxxxx_00;
-- CREATE DATABASE ph22_kadai05_xxxxxxxx_00 CHARACTER SET utf8;

use ph22_kadai05_xxxxxxxx_00

DROP TABLE accounts;
CREATE TABLE accounts(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	login_id VARCHAR(10) NOT NULL UNIQUE,
	password_hash VARCHAR(255) NOT NULL,
	name VARCHAR(20) NOT NULL
);

DROP TABLE image_file;
CREATE TABLE image_file (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	account_id INTEGER NOT NULL,
	title VARCHAR(127) NOT NULL,
	filename VARCHAR(127) NOT NULL UNIQUE,
	publish INTEGER DEFAULT 0 NOT NULL
);

miyaren,B1203
oisoda,riddle
aaa,aaa
