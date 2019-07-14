DROP DATABASE IF EXISTS ph22_test;

SET character_set_client=sjis;
SET character_set_connection=utf8;
SET character_set_server=utf8;
SET character_set_results=sjis;

CREATE DATABASE ph22_test;

USE ph22_test

CREATE TABLE students(
	class VARCHAR(8)
	,no INT(2)
	,name VARCHAR(20)
	,PRIMARY KEY(class,no)
);