USE ph22_test

DROP TABLE IF EXISTS image_file;
CREATE TABLE image_file(
	id int AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(127) NOT NULL,
	filename VARCHAR(127) NOT NULL UNIQUE
);