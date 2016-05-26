<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Товары на складе</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Список товаров
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover actions-table" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Бренд</th>
                                <th>Артикул</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Закупочная цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach ($storeRemain as $remain) {?>
                            <tr>
                                <td><?=$remain['brand_name'];?></td>
                                <td><?=$remain['article'];?></td>
                                <td><?=$remain['product_name'];?></td>
                                <td><?=$remain['quantity'];?></td>
                                <td><?=$remain['price'];?></td>
                                <td></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <div class="form-group">
            <button class="btn btn-success" data-toggle="modal" data-target="#addStoreProductModal">Добавить товар <i class="fa fa-plus fa-fw"></i></button>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="addStoreProductModal" tabindex="-1" role="dialog" aria-labelledby="addActionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addActionLabel">Добавление наличия</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="addStoreProductForm" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Название товара *</label>
                            <label class="control-label hide" for="newStoreProductName" id="newStoreProductNameError">Не выбрано</label>
                            <input class="form-control check-field" data-col-num="12" name="name" id="newStoreProductName" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Бренд *</label>
                            <label class="control-label hide" for="newStoreProductBrand" id="newStoreProductBrandError">Не указан бренд</label>
                            <input class="form-control check-field" data-col-num="6" id="newStoreProductBrand" name="brand" value="" autocomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label>Артикул *</label>
                            <label class="control-label hide" for="newArticle" id="newArticleError">Не указан артикул</label>
                            <input class="form-control check-field" data-col-num="6" id="newArticle" name="article" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Поставщик *</label>
                            <label class="control-label hide" for="newStoreProductDistributor" id="newStoreProductDistributorError">Не выбрано</label>
                            <select class="form-control check-field-select" data-col-num="12" name="distributor_id" id="newStoreProductDistributor">
                                <option value="">не выбран</option>
                                <?foreach ($distributorsData as $distributor) {?>
                                <option value="<?=$distributor['id'];?>"><?=$distributor['name'];?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Цена *</label>
                            <label class="control-label hide" for="newStoreProductPrice" id="newStoreProductPriceError">Не указан бренд</label>
                            <input class="form-control check-field" data-col-num="6" id="newStoreProductPrice" name="price" value="" autocomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label>Количество *</label>
                            <label class="control-label hide" for="newStoreProductQuantity" id="newStoreProductQuantityError">Не указан артикул</label>
                            <input class="form-control check-field" data-col-num="6" id="newStoreProductQuantity" name="quantity" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Тип</label>
                            <?=Form::select('product_type', $productsType, null, ['class' => 'form-control']);?>
                        </div>
                        <div class="col-lg-6">
                            <label>Место хранения</label>
                            <input class="form-control" name="place" value="" autocomplete="off">
                        </div>
                    </div>
                    <input type="hidden" id="customerId" name="customer">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="addNewStoreProduct">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
