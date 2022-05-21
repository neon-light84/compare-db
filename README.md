# compare-db
## Архитектурные и программные решения
### Производительность
- Мы сравниваем скорость записи в БД. А это значит, что внутри цикла вставки данных не должно быть лишних действий,
  таких как, генерация, склейка. Даже лишний вызов функции. Все это задержки, не относящиеся к вставке данных.
- По этой же причине, цикл выбрал foreach. Предполагаю, что он быстрее в переборе, нежели обращение по
  индексу к массиву.
- Сами вставляемые данные, предварительно сгенерированы и находятся в памяти (в массиве). Это позволит
  минимизировать задержки получения данных.

### ООП
На практике, для такой задачи ООП, даже излишне. Использовал ООП просто для демонстрации знаний.

### Запуск и использование
Приложение рассчитано на запуск в консоле. Просто так удобнее показалось. И не надо заморачиваться с HTML.

### Маленькое отступление от ТЗ
Не проводя тестов, очевидно, что запись в Redis будет намного быстрее. А вот для MySql, расширил
задачу. Я тестирую две таблицы. В одной поле value типа varchar, в другой, типа text. Эти поля, в теории,
по разному хранятся и обрабатываются на уровне движка. И вот тут то и интересно сравнить скорость.

### Формат ключа
В Redis принято делить ключ символом ":". Таким образом, симулируется иерархичность данных. Симулировал такую
иерархию опираясь на номер по порядку, по 100 записей на группу. Что касается MySql, то в нем это просто
уникальный ключ и не более.

### Разделение логики и вывода
Максимально постарался вывод данных отделить от механизма получения этих данных.


## Результаты тестирования и скрины
Итоговые результаты:  
![](readme_files/res.png)
___
Таблицы в MySql:  
![](readme_files/my_all_tables.png)  
кол-во строк не правильное. Наверно потому что примерная оценка. Запрос на кол-во показыает 
правильное кол-во  
![](readme_files/count.png)  
А по размеру таблицы, не ожиданно. Varchar, по идее, хранит значения фиксированной длинны.
___
Вот так выглядят данные в MySql. Видно, значения имеют разную длину.   
![](readme_files/my1.png)  
![](readme_files/my2.png)  
___
Вот так выглядят данные в Redis.   
![](readme_files/redis.png)  



