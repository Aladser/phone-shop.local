# Магазин смартфонов (Laravel)

### Стек
* PHP 8, Laravel 10
* MySQL
* Javascript

### Диаграмма БД
![image](/storage/img/db.png)

Требуется сделать миграцию
``php artisan migrate --seed``

Есть пользователь aladser@mail.ru / 12345678

### Описание

#### Товар-смартфон: 
+ Название
+ Цена
+ Количество
+ Кнопка *Добавить в корзину*

#### Заказ:
+ Список товаров в корзине
+ Общая стоимость всех товаров в заказе
+ Кнопка *Оформить заказ*


Контроллеры созданы так, чтобы была возможность расширить их функциона в будущем.

#### Список контроллеров, созданных вручную:
* Телефоны ``PhoneController``
* Телефоны корзины ``BasketPhoneController``
* Заказы ``OrderController``

#### Список моделей:
* Телефон корзины ``BasketPhone``
* Заказ ``Order``
* Телефон заказа ``OrderPhone``
* Телефон ``Phone``

#### На главной странице показаны все телефоны-смартфоны.
![image](/storage/img/phone-list-noauth.png)

#### Если пользователь авторизован, можно добавить телефон в корзину
![image](/storage/img/phone-list-isauth.png)

#### Если телефон добавляется в корзину, появляется значок
![image](/storage/img/phone-list-ischoice.png)

#### Страница корзины
![image](/storage/img/basket-empty.png)
![image](/storage/img/basket.png)

### Страница заказов
![image](/storage/img/orders-empty.png)
![image](/storage/img/orders.png)

Страница заказов показывает список заказов и общую стоимость всех заказов. Можно удалить заказ.

Когда пользователь добавляет телефон в корзину, телефон добавляется в БД таблицу корзины. Телефон будет находиться в корзине, пока пользователь сам не удалит его (удаление в данный момент не реализовано). На странице корзины есть кнопки *Оформить заказ* и *Мои заказы*

При нажатии кнопки *Оформить заказ* создается заказ в БД таблице и выводится страница об успешности оформления заказа.
![image](/storage/img/store_order.png)
