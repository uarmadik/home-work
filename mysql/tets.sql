CREATE DATABASE library;

CREATE TABLE authors (
	id INT NOT NULL AUTO_INCREMENT,
	irst_name VARCHAR(50) NOT NULL,
	second_name VARCHAR(50) NOT NULL,
	PRIMARY KEY (id) 
	);
CREATE TABLE books (
	id INT NOT NULL AUTO_INCREMENT,
	book_name VARCHAR(200) NOT NULL,
	author_id INT NOT NULL, PRIMARY KEY (id),
	FOREIGN KEY (author_id) REFERENCES authors (id) 
	);
	
INSERT INTO authors VALUES(NULL, 'Еріх Марія', 'Ремарк');
INSERT INTO authors VALUES(NULL, 'Генрі', 'Форд');
INSERT INTO authors VALUES(NULL, 'Тарас', 'Шевченко');

INSERT INTO books VALUES(NULL, 'Кобзар', 3);
INSERT INTO books VALUES(NULL, 'На західному фронті без змін', 1);
INSERT INTO books VALUES(NULL, 'Моє життя та робота', 2);

SELECT book_name FROM books WHERE author_id=1;
