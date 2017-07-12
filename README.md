### Домашнее задание: разработка REST API для сервиса аренды автомобилей.

#### Требования
Рализовать набор REST API сервисов используя фреймворк Laravel.

***

#### Установка

Установка показана в рабочем окружении OS Linux:

```bash
git clone https://binaryvo@bitbucket.org/binaryvo/bsa-2017-php-laravel-api.git
cd bsa-2017-php-laravel-api
composer install
```

Также рекомендуется использовать Homestead для поднятия приложения.

#### Задания

Для выполнения заданий необходимо заинжектить репозиторий App\Repositories\CarRepository.php в контроллер и все манипуляции с данными проводить с помощью него.


##### Задание 1

* Реализовать сервис получения списка всех доступных автомобилей 
* Route: /api/cars
* Тип HTTP запроса: только GET
* Формат возвращаемых данных: JSON
* Поля данных для каждого из автомобилей: id, model, year, color, price
* Пример возвращаемых данных: 
[{"id":1,"model":"Mercedes C-Classe","color":"White","registration_number":"MB1234","year":"2012","price":50},{"id":2,"model":"Hyundai Elantra","color":"Silver","registration_number":"HE3214","year":"2015","price":30}

##### Задание 2

* Реализовать сервис получения детальной информации об определенном автомобиле
* Route: /api/cars/{id}
* Тип HTTP запроса: только GET
* Формат возвращаемых данных: JSON
* Поля данных, которые необходимо вернуть: id, model, year, mileage, license_number, price
* Пример возвращаемых данных: 
{"id":1,"model":"Mercedes C-Classe","color":"White","registration_number":"MB1234","year":"2012","mileage":"86154","price":50}
* В случае запроса информации по авто с отсутствующим id необходимо вернуть error response с заголовком 404

##### Задание 3

* Реализовать REST API CRUD сервис администратора для управления базой автомобилей с помощью Resource Controller
* Route prefix: /api/admin/cars/
* Действия, которые может совершать администратор: просмотр всех авто, просмотр информации об определенном авто, добавление, обновление информации, удаление
* Формат входных и возвращаемых данных: JSON
* Поля данных, которые необходимо вернуть для списка авто: id, model, color, year, price
* Поля данных, которые необходимо вернуть для вывода информации определенного авто: id, model, year, color, mileage, registration_number, price