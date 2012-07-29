Smarty Wordform
===============

Wordform — это плагин для шаблонизатора [Smarty](http://www.smarty.net/), позволяющий писать в интерфейсе имена существительные во множественном числе русским языком. То есть, вместо позорного «Сообщений: 21» можно вывести «У вас 21 сообщение».

Это очень простой плагин, я написал его в 2006-м, сегодня ему исполнилось шесть лет. Наверняка за это время появились инструменты, позволяющие не изобретать велосипед. С другой стороны, интерфейсов, разговаривающих с пользователем языком роботов, как-то не становится меньше, так что идея кому-то наверняка пригодится.

Плагин нетрудно переписать на другом языке (программирования) или перевести на другой язык (общения). Для последнего рекомендую обратить внимание на эту страничку: [CLDR Language Plural Rules](http://unicode.org/repos/cldr-tmp/trunk/diff/supplemental/language_plural_rules.html). К сожалению, сам я шесть лет назад о её существовании не знал.

Требования
----------

*   PHP 4 или 5
*   Smarty 2 или 3

Установка
---------

Поместите файл `function.wordform.php` в директорию `plugins` библиотеки Smarty.

Использование
-------------

После установки плагина в шаблонах Smarty можно писать такие конструкции:

    {wordform n=$x one='запись' two='записи' many='записей'} 

И в зависимости от значений $x на выходе будет нужная форма слова. Например, вам нужно написать, сколько записей в блоге пользователя. В шаблоне пишем:

    В вашем блоге <b>{$n|number_format}</b> {wordform n=$x one='запись' two='записи' many='записей'}, вы просто графоман!

Вышеуказанный шаблон код при `$x = 32` выведет:

    В вашем блоге <b>32</b> записи, вы просто графоман!

Параметр `format` необязательный — это строка, в которой `n` заменится на значение числа, а `w` — на подходящий числу вариант слова (по умолчанию `format = 'w'`, то есть выводится только слово). Например:

    {wordform n=$x one='яблоко' two='яблока' many='яблок' format='w'}

    {wordform n=$y one='груша' two='груши' many='груш' format='n w'}

    {wordform n=$z one='персик' two='персика' many='персиков' format='w: n'}

При `$x = 113`, `$y = 9651` и `$z = 4` получится:
 
    яблок

    9651 груша

    персика: 4

Вот и всё.
