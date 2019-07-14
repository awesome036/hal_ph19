DROP DATABASE IF EXISTS ph22_kadai06_pw51a335_02;

SET character_set_client=sjis;
SET character_set_connection=utf8;
SET character_set_server=utf8;
SET character_set_results=sjis;

SET sql_mode='STRICT_ALL_TABLES';

CREATE DATABASE ph22_kadai06_pw51a335_02;
USE ph22_kadai06_pw51a335_02;

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts(
	id INT PRIMARY KEY AUTO_INCREMENT,
	login_id VARCHAR(10) NOT NULL UNIQUE,
	password VARCHAR(10) NOT NULL,
	name VARCHAR(20) NOT NULL
);

DELETE FROM accounts;
INSERT INTO accounts VALUES
	(NULL,'miyaren','B1203','宮内　れんげ')
	,(NULL,'ichijo','B0528','一条　蛍')
;