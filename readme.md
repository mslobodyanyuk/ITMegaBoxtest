Test
You need to list the goods with the last price for a certain date for a certain type of price. (Implement with one query).
Database structure:
Product - goods (name, description, status)
- id
- title
- description
- status
DocPrice - documents. Contains the document header. (document number, creation date, price type, status). Document status 0 - prices are not displayed, 1 - price is displayed
- Id
- datetime
- price_type (price type)
- status
DocPriceBody - the table of documents contains the list of goods and the price (goods, price).
- Id
- doc_id
- product_id
- price
Project Structure:

`controllers / controller.php` - In the file, a function is called from the model and the result is output in view.php

`config / conf.php` - contains the connection settings for the database.

`models / price.php` - the file contains functions

`views / view.php` - output file

`Index.php`

Note.
Create several documents with the same product and specify the date between the documents in the request. Also consider the product that has no price. those. not listed in the document, the list should also be displayed.



Install the project
-------------------
1. `git clone << project path >>`

2. `сomposer install`

3. `config/conf.php database configuration file.`
	
4. `configure the host.`

5. `testing (use the project)`


`database dump and technical task is in the public folder`

`app.php - the spl_autoload_register function takes the controller from route.yml`


`useful links:`

[PHP spl_autoload_register not working, controller connection](https://ru.stackoverflow.com/questions/638039/php-spl-autoload-register-%D0%BD%D0%B5-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0%D0%B5%D1%82)

`Frontend links:`

Setting datepicker - <https://jqueryui.com/datepicker/>

[Change the calendar language Datepicker](http://it-bloknot.ru/?q=book/%D0%BF%D1%80%D0%B8%D0%BC%D0%B5%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D1%8F%D0%B7%D1%8B%D0%BA%D0%B0-javascript-%D0%B8-%D0%B1%D0%B8%D0%B1%D0%BB%D0%B8%D0%BE%D1%82%D0%B5%D0%BA%D0%B8-jquery-%D0%BF%D1%80%D0%B8-%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D0%B8-%D0%B2%D0%B5%D0%B1-%D1%81%D0%B0%D0%B9%D1%82%D0%B0/62%D1%81%D0%BC%D0%B5%D0%BD%D0%B0-%D1%8F%D0%B7%D1%8B%D0%BA%D0%B0-%D0%BA%D0%B0%D0%BB%D0%B5%D0%BD%D0%B4%D0%B0%D1%80%D1%8F)

It is necessary that the previous dates were not active. Video -
[datepicker disable previousdate](https://www.youtube.com/watch?v=GYNtRphgzIw)

`SQL links:`

[The problem with the Russian when querying the database instead of letters questions (Encoding Utf-8)](https://ru.stackoverflow.com/questions/295847/%D0%9F%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC%D0%B0-%D1%81-%D1%80%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%BC-%D0%BF%D1%80%D0%B8-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81%D0%B0%D1%85-%D0%BA-%D0%B1%D0%B0%D0%B7%D0%B5-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D0%B2%D0%BC%D0%B5%D1%81%D1%82%D0%BE-%D0%B1%D1%83%D0%BA%D0%B2-%D0%B2%D0%BE%D0%BF%D1%80%D0%BE%D1%81%D1%8B-%D0%9A%D0%BE%D0%B4%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0-utf)

[Mysql Inner Join with WHERE clause](https://stackoverflow.com/questions/12364602/mysql-inner-join-with-where-clause)

[MySQL join with where clause](https://stackoverflow.com/questions/1219909/mysql-join-with-where-clause)

[MySQL is a little bit about JOINs](https://anton-pribora.ru/articles/mysql/mysql-join/)

[Selection from the database by the maximum date of ID](https://ru.stackoverflow.com/questions/616013/%D0%92%D1%8B%D0%B1%D0%BE%D1%80-%D0%B8%D0%B7-%D0%B1%D0%B0%D0%B7%D1%8B-%D0%BF%D0%BE-%D0%BC%D0%B0%D0%BA%D1%81%D0%B8%D0%BC%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B9-%D0%B4%D0%B0%D1%82%D0%B5-%D1%83-id/616042#616042)

[output of lines with the maximum value](https://ru.stackoverflow.com/questions/496515/%D0%B2%D1%8B%D0%B2%D0%BE%D0%B4-%D1%81%D1%82%D1%80%D0%BE%D0%BA-%D1%81-%D0%BC%D0%B0%D0%BA%D1%81%D0%B8%D0%BC%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%BC-%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5%D0%BC/496532#496532)

[Help me write a MySQL query to three tables, with a maximum date selection](https://ru.stackoverflow.com/questions/624551/%D0%9F%D0%BE%D0%BC%D0%BE%D0%B3%D0%B8%D1%82%D0%B5-%D0%BD%D0%B0%D0%BF%D0%B8%D1%81%D0%B0%D1%82%D1%8C-mysql-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81-%D0%BA-%D1%82%D1%80%D1%91%D0%BC-%D1%82%D0%B0%D0%B1%D0%BB%D0%B8%D1%86%D0%B0%D0%BC-%D1%81-%D0%B2%D1%8B%D0%B1%D0%BE%D1%80%D0%BA%D0%BE%D0%B9-%D0%BF%D0%BE-%D0%BC%D0%B0%D0%BA%D1%81%D0%B8%D0%BC%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B9-%D0%B4%D0%B0%D1%82%D0%B5)

[Explanation of SQL joins JOIN: LEFT / RIGHT / INNER / OUTER](http://www.skillz.ru/dev/php/article-Obyasnenie_SQL_obedinenii_JOIN_INNER_OUTER.html)

[Date and time functions](https://phpclub.ru/mysql/doc/date-and-time-functions.html)

[Convert php to the correct format?](https://ru.stackoverflow.com/questions/331120/%D0%9F%D1%80%D0%B5%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D1%8C-%D0%B4%D0%B0%D1%82%D1%83-php-%D0%B2-%D0%BD%D1%83%D0%B6%D0%BD%D1%8B%D0%B9-%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%82)

[MYSQL JOIN - fast, easy, easy](http://aktual.com.ua/all/mysql-join/)

[Selecting rows with the last date](https://ru.stackoverflow.com/questions/465571/%D0%92%D1%8B%D0%B1%D0%BE%D1%80%D0%BA%D0%B0-%D1%81%D1%82%D1%80%D0%BE%D0%BA-%D1%81-%D0%BF%D0%BE%D1%81%D0%BB%D0%B5%D0%B4%D0%BD%D0%B5%D0%B9-%D0%B4%D0%B0%D1%82%D0%BE%D0%B9)

[How do I convert a string to a php date?](https://ru.stackoverflow.com/questions/229226/%D0%9A%D0%B0%D0%BA-%D0%BF%D1%80%D0%B5%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D1%8C-%D1%81%D1%82%D1%80%D0%BE%D0%BA%D1%83-%D0%B2-%D0%B4%D0%B0%D1%82%D1%83-php)

[DATETIME select only by date (query)](https://ru.stackoverflow.com/questions/214836/datetime-%D0%B2%D1%8B%D0%B1%D1%80%D0%B0%D1%82%D1%8C-%D1%82%D0%BE%D0%BB%D1%8C%D0%BA%D0%BE-%D0%BF%D0%BE-%D0%B4%D0%B0%D1%82%D0%B5-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81)

[PHP HOW TO REALIZE THE STRUCTURE OF THE MVC SITE?](http://www.itmathrepetitor.ru/php-kak-realizovat-strukturu-sajjta-mvc/)
