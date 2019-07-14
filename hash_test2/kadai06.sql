DROP DATABASE IF EXISTS hash_test2;

SET character_set_client=sjis;
SET character_set_connection=utf8;
SET character_set_server=utf8;
SET character_set_results=sjis;

SET sql_mode='STRICT_ALL_TABLES';

CREATE DATABASE hash_test2;
USE hash_test2;

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts(
	id INT PRIMARY KEY AUTO_INCREMENT,
	login_id VARCHAR(10) NOT NULL UNIQUE,
	password_hash VARCHAR(255) NOT NULL,
	name VARCHAR(20) NOT NULL
);

DELETE FROM accounts;