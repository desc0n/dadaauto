<h3>Запрос на запчасти с быстрой формы</h3>
<h4>№ заказа: <?=Arr::get($params, 'order_id');?></h4>
<strong>Марка авто:</strong> <?=Arr::get($params, 'brand');?><br>
<strong>Модель авто:</strong> <?=Arr::get($params, 'model');?><br>
<strong>Номер кузова или VIN:</strong> <?=Arr::get($params, 'vin');?><br>
<strong>Номер двигателя:</strong> <?=Arr::get($params, 'engine');?><br>
<strong>Запчасти:</strong> <?=Arr::get($params, 'part');?><br>
<strong>Имя заказчика:</strong> <?=Arr::get($params, 'name');?><br>
<strong>Город заказчика:</strong> <?=Arr::get($params, 'address');?><br>
<strong>E-mail заказчика:</strong> <?=Arr::get($params, 'email');?><br>
<strong>Телефон заказчика:</strong> <?=Arr::get($params, 'phone');?><br>