DROP DATABASE ph22_kadai01_pw51a335_02;

/* 文字コードセット */
SET character_set_client=sjis;
SET character_set_connection=utf8;
SET character_set_server=utf8;
SET character_set_results=sjis;

CREATE DATABASE ph22_kadai01_pw51a335_02;
USE ph22_kadai01_pw51a335_02;

DROP TABLE account;
CREATE TABLE account(
	id VARCHAR(5) PRIMARY KEY,
	password VARCHAR(8),
	name VARCHAR(10)
);

INSERT INTO account(id,password,name)VALUES('nade','B0304','各務原なでしこ');
INSERT INTO account(id,password,name)VALUES('rin','B1001','志摩リン');