# количество книг каждого автора
SELECT NAME, COUNT(BOOK_ID)
FROM author a
	     LEFT JOIN author_book ab on a.ID = ab.AUTHOR_ID
GROUP BY a.NAME;

# суммарный остаток книг каждого автора во всех магазинах
SELECT NAME, CITY, SUM(QUANTITY)
FROM book_store bs
	     INNER JOIN author_book ab on bs.BOOK_ID = ab.BOOK_ID
	     INNER JOIN author a on ab.AUTHOR_ID = a.ID
	     INNER JOIN store s on bs.STORE_ID = s.ID
GROUP BY NAME, CITY;

# средняя стоимость книг издательства «Азбука»
SELECT b.NAME, AVG(PRICE)
FROM book_store bs
	     INNER JOIN book b on bs.BOOK_ID = b.ID
	     INNER JOIN publisher p on b.PUBLISHER_ID = p.ID AND p.NAME = 'Азбука'
GROUP BY b.NAME;

# средняя стоимость книг издательства «Азбука» в каждом магазине
SELECT CITY, b.NAME, AVG(PRICE)
FROM book_store bs
	     INNER JOIN book b on bs.BOOK_ID = b.ID
	     INNER JOIN publisher p on b.PUBLISHER_ID = p.ID AND p.NAME = 'Азбука'
	     INNER JOIN store s on bs.STORE_ID = s.ID
GROUP BY CITY, b.NAME;

# разница между остатком книг в Калининграде и Черняховске
SELECT b.NAME,
		SUM(IF(STORE_ID = 1, QUANTITY, 0)) AS QUANTITY_IN_KALININGRAD,
        SUM(IF(STORE_ID = 2, QUANTITY, 0)) AS QUANTITY_IN_CHERNYAHOVSK,
        SUM(IF(STORE_ID = 1, QUANTITY, 0)) - SUM(IF(STORE_ID = 2, QUANTITY, 0)) AS DIFFERENCE
FROM book_store bs
		INNER JOIN book b on bs.BOOK_ID = b.ID
GROUP BY bs.BOOK_ID;