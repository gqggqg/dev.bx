# количество книг каждого автора
SELECT NAME, COUNT(BOOK_ID)
FROM author a
	     LEFT JOIN author_book ab on a.ID = ab.AUTHOR_ID
GROUP BY a.NAME;

# суммарный остаток книг каждого автора во всех магазинах
SELECT NAME, CITY, COUNT(*)
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
SELECT NAME as BOOK_TITLE,
       KGD_CHR.KGD_QUANTITY as NUMBER_OF_BOOKS_IN_KALININGRAD ,
       KGD_CHR.CHR_QUANTITY as NUMBER_OF_BOOKS_IN_CHERNYAKHOVSK,
       ABS(KGD_CHR.KGD_QUANTITY - KGD_CHR.CHR_QUANTITY) as DIFFERENCE_IN_QUANTITY
FROM book b
	     INNER JOIN
     (
	     SELECT BOOK_ID, CITY, IFNULL(QUANTITY, 0) as KGD_QUANTITY, CHR_C, IFNULL(CHR_Q, 0) as CHR_QUANTITY
	     FROM (
		          SELECT BOOK_ID, CITY, QUANTITY
		          FROM book_store bs
			               INNER JOIN store s ON bs.STORE_ID = s.ID
		          WHERE s.CITY = 'Калининград'
	          ) KGD_BOOKS
		          LEFT JOIN
	          (
		          SELECT BOOK_ID as CHR_B, CITY as CHR_C, QUANTITY as CHR_Q
		          FROM book_store bs
			               INNER JOIN store s ON bs.STORE_ID = s.ID
		          WHERE s.CITY = 'Черняховск'
	          ) CHR_BOOKS ON KGD_BOOKS.BOOK_ID = CHR_BOOKS.CHR_B
     ) KGD_CHR ON b.ID = KGD_CHR.BOOK_ID