## Тестовое задание Смышляева Алексея

Данное задание выполнялось и тестировалось на компьютере с установленной
операционно системой Ubuntu 20, php 8.0, БД PostgreSQL 12.
В качестве табличного редактора применялся Libre Office.

Установка скрипта:

*git clone git@github.com:smyshlyaev/mei.git*  
*composer install*  
*cp .env-example .env*  

Заполните в файле .env реквизиты для подключения к своей базе данных.

## Работа скрипта:

В качестве источника информации служит файл task.xlsx, который лежит в корне проекта.
В результатом выполнения скрипта будет файл result.xlsx, который тоже появится в корне и 
запись в базе данных.

