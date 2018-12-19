SELECT books_authors.authorId, COUNT(books_authors.bookId) AS BooksCount FROM books_authors
GROUP BY books_authors.authorId
HAVING BooksCount < 7;

Таблица 1 -  Авторы 
Колонки:
1)	Id
2)	Имя автора

Таблица 2 -  Книги
Колонки:
1)	Id
2)	Название книги

Таблица 3 -  Связи авторов и книг
Колонки:
1)	Id
2)	Id Автор
3)	Id Книга

