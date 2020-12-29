CREATE TABLE store
(
    ID int not null auto_increment,
	CITY varchar(500) not null,
	PRIMARY KEY (ID)
);

CREATE TABLE book_store
(
	STORE_ID int not null default 1,
	BOOK_ID int not null,
	PRICE DECIMAL(10, 2),
	QUANTITY int unsigned default 0,
	PRIMARY KEY (BOOK_ID, STORE_ID),
	FOREIGN KEY FK_BOOK_STORE_BOOK (BOOK_ID) references book(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_BOOK_STORE_STORE (STORE_ID) references store(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);

INSERT INTO store (CITY)
VALUES  ('Калининград'),
		('Черняховск'),
        ('Советск');

INSERT INTO book_store (BOOK_ID, PRICE, QUANTITY)
SELECT ID, PRICE, QUANTITY FROM book;

ALTER TABLE book DROP PRICE;
ALTER TABLE book DROP QUANTITY;
