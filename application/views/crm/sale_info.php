<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Информация о реализации</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Основные данные
                    <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil fa-fw"></i></a>
                </div>
                <div class="panel-body">
                    <h4>Контактная информация</h4>
                    <address>
                        <p>
                            <strong>Имя: </strong> <?=Arr::get($saleData, 'name');?>
                            <br>
                        </p>
                        <p>
                            <strong>Адрес: </strong> <?=Arr::get($saleData, 'address');?>
                            <br>
                        </p>
                        <p>
                            <strong>ТК: </strong> <?=Arr::get($saleData, 'tk');?>
                            <br>
                        </p>
                        <p>
                            <strong>Телефон: </strong> +7 (<?=substr(Arr::get($saleData, 'phone'), 0, 3);?>) <?=substr(Arr::get($saleData, 'phone'), 3);?>
                        </p>
                    </address>
                    <h4>Интернет-контакты</h4>
                    <address>
                        <strong>E-mail</strong>
                            <a href="mailto:<?=Arr::get($saleData, 'email');?>"><?=Arr::get($saleData, 'email');?></a>
                        <br>
                    </address>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Список товаров
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bactioned table-hover">
                        <thead>
                        <tr>
                            <th>Название товара</th>
                            <th class="text-center">Кол-во</th>
                            <th class="text-center">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($saleProducts as $product) {?>
                            <tr id="rowProduct<?=$product['id'];?>">
                                <td class="product-name-cell"><?=$product['full_product_name'];?></td>
                                <td class="text-center product-quantity-cell"><?=$product['quantity'];?></td>
                                <td class="text-center product-price-cell"><?=$product['price'];?></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>