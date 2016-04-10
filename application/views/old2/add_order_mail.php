<h3>Запрос на запчасти с быстрой формы</h3>
<h4>№ заказа: <?=Arr::get($params, 'order_id');?></h4>
<strong>Марка авто:</strong> <?=Arr::get($params, 'brand');?><br>
<strong>Модель авто:</strong> Accord<?=Arr::get($params, 'model');?><br>
<strong>Номер кузова или VIN:</strong> Cf3-1104710<?=Arr::get($params, 'vin');?><br>
<strong>Номер двигателя:</strong> F18b2024647<?=Arr::get($params, 'engine');?><br>
<strong>Запчасти:</strong> Здравствуйте меня интересует датчик лямдазон/кислородный его цена и салон !спасибо !<?=Arr::get($params, 'part');?><br>
<strong>Имя заказчика:</strong> Артур<?=Arr::get($params, 'name');?><br>
<strong>Город заказчика:</strong> Белогорск<?=Arr::get($params, 'address');?><br>
<strong>E-mail заказчика:</strong> mr.bratva93@mail.ru<?=Arr::get($params, 'email');?><br>
<strong>Телефон заказчика:</strong> 89145608567<?=Arr::get($params, 'phone');?><br>