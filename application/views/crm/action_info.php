<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Информация о документе</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <form method="post">
                <button class="btn btn-primary">Сформировать реализацию <i class="fa fa-plus fa-fw"></i></button>
                <input type="hidden" name="newSale">
            </form>
        </div>
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
                            <strong>Имя: </strong> <?=Arr::get($actionData, 'name');?>
                            <br>
                        </p>
                        <p>
                            <strong>Адрес: </strong> <?=Arr::get($actionData, 'address');?>
                            <br>
                        </p>
                        <p>
                            <strong>ТК: </strong> <?=Arr::get($actionData, 'tk');?>
                            <br>
                        </p>
                        <p>
                            <strong>Телефон: </strong> +7 (<?=substr(Arr::get($actionData, 'phone'), 0, 3);?>) <?=substr(Arr::get($actionData, 'phone'), 3);?>
                        </p>
                    </address>
                    <h4>Интернет-контакты</h4>
                    <address>
                        <strong>E-mail</strong>
                            <a href="mailto:<?=Arr::get($actionData, 'email');?>"><?=Arr::get($actionData, 'email');?></a>
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
                            <th class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($actionProducts as $product) {?>
                            <tr id="rowProduct<?=$product['id'];?>">
                                <td class="product-name-cell"><?=$product['part'];?></td>
                                <td class="text-center product-quantity-cell"><?=$product['quantity'];?></td>
                                <td class="text-center product-price-cell"><?=$product['price'];?></td>
                                <td class="text-center">
                                    <button class="btn btn-default redactProductBtn" data-id="<?=$product['id'];?>" title="Редактировать"><i class="fa fa-pencil fa-fw"></i></button>
                                </td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-default" data-toggle="modal" data-target="#redactProductModal">Добавить товар <i class="fa fa-plus fa-fw"></i></button>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Редактирование данных клиента</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="redactActionClientForm" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Имя *</label>
                            <label class="control-label hide" for="redactName" id="redactNameError">Поле пустое</label>
                            <input class="form-control" name="name" id="redactName" value="<?=Arr::get($actionData, 'name');?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Город</label>
                            <textarea class="form-control" name="city"><?=Arr::get($actionData, 'address');?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Транспортная компания</label>
                            <input class="form-control" name="tk" value="<?=Arr::get($actionData, 'tk');?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Телефон</label>
                            <label class="control-label hide" for="redactPhone" id="redactPhoneError">Длина номера 10 цифр</label>
                            <div class="input-group">
                                <span class="input-group-addon">+7</span>
                                <input class="form-control" id="redactPhone" disabled value="<?=Arr::get($actionData, 'phone');?>">
                                <input type="hidden" name="phone" value="<?=Arr::get($actionData, 'phone');?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>E-mail</label>
                            <input class="form-control" name="email" value="<?=Arr::get($actionData, 'email');?>">
                        </div>
                    </div>
                    <input type="hidden" name="redactActionClient" value="<?=Arr::get($actionData, 'customers_id');?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="redactActionClient">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addProductModalLabel">Добавление товара</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="addProductForm">
                    <label for="newProductName">Товар</label>
                    <div class="form-group">
                        <input class="col-lg-7-important form-control" id="newProductName" name="newProductName" placeholder="Название" autocomplete="off">
                        <input class="col-lg-2-important form-control" id="newProductQuantity" name="newProductQuantity" placeholder="Кол-во" autocomplete="off">
                        <input class="col-lg-2-important form-control" id="newProductPrice" name="newProductPrice" placeholder="Цена" autocomplete="off">
                    </div>
                    <input type="hidden" name="newProduct">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onclick="addProductForm.submit();">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="redactProductModal" tabindex="-1" role="dialog" aria-labelledby="redactProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="redactProductModalLabel">Редактирование товара</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="redactProductForm">
                    <label>Товар</label>
                    <div class="form-group product-row" id="productRow1" data-row="1">
                        <input class="col-lg-6-important form-control" id="productName" name="productName[]" onkeyup="initTypeaheadProductName($(this));" onchange="getCurrentTypeahead($(this));" placeholder="Название" autocomplete="off">
                        <input class="col-lg-2-important form-control" id="productQuantity" name="productQuantity[]" placeholder="Кол-во" autocomplete="off">
                        <input class="col-lg-2-important form-control" id="productPrice" name="productPrice[]" placeholder="Цена" autocomplete="off">
                        <button class="btn btn-default col-lg-1-important" disabled><i class="fa fa-remove fa-fw"></i></button>
                        <input type="hidden" name="storeRemainId[]" id="storeRemainId">
                    </div>
                </form>
                <button type="button" class="btn btn-default" id="addProductRowBtn">Добавить позицию <i class="fa fa-plus fa-fw"></i></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onclick="redactProductForm.submit();">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<?if (Arr::get($get, 'quick_sale') === 'true') {?>
    <script>
        $(document).ready(function () {
            $('#redactProductModal').modal('toggle');
        });
    </script>
<?}?>