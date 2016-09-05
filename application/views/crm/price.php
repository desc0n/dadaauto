<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Загрузка прайса</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Список позиций
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover price-data-table" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Марка авто</th>
                                <th>Модель авто</th>
                                <th>Кузов / шасси</th>
                                <th>Двигатель</th>
                                <th>Перед / Зад</th>
                                <th>Лево / Право</th>
                                <th>Верх / Низ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach ($priceData as $data) {?>
                            <tr>
                                <td><?=$data['product_name'];?></td>
                                <td><?=$data['car_mark_name'];?></td>
                                <td><?=$data['car_model_name'];?></td>
                                <td><?=$data['car_chassis_name'];?></td>
                                <td><?=$data['car_engine_name'];?></td>
                                <td><?=$data['front_rear'];?></td>
                                <td><?=$data['left_right'];?></td>
                                <td><?=$data['top_bottom'];?></td>
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
            <button class="btn btn-danger" onclick="zeroPrice();">Обнулить прайс <i class="fa fa-ban fa-fw"></i></button>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#uploadProductModal">Загрузить прайс <i class="fa fa-plus fa-fw"></i></button>
        </div>
        <div class="form-group">
            <form method="post">
                <button class="btn btn-warning" name="updateImg" value="1">Обновить картнки <i class="fa fa-refresh fa-fw"></i></button>
            </form>
        </div>
        <div class="form-group">
            <form method="post">
                <button class="btn btn-success" name="downloadPrice" value="1">Выгрузить прайс <i class="fa fa-download fa-fw"></i></button>
            </form>
        </div>
        <div class="form-group">
            Ссылка на прайс <a download href="http://<?=$_SERVER['HTTP_HOST'];?>/public/prices/download/price.csv">http://<?=$_SERVER['HTTP_HOST'];?>/public/prices/download/price.csv</a>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Настройка загрузки</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.panel -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Редактирование полей
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">Название поля</th>
                        <th class="text-center">Колонка прайса</th>
                        <th class="text-center">Действия</th>
                    </tr>
                    <?foreach ($priceFields as $field) {?>
                    <tr id="priceField<?=$field['id'];?>">
                        <td>
                            <input type="text" class="form-control price-field-name" value="<?=$field['name'];?>" <?=((int)$field['redact'] === 0 ? 'disabled' : null);?>>
                        </td>
                        <td>
                            <input type="text" class="form-control price-field-column" value="<?=$field['column'];?>">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success" onclick="redactPriceField(<?=$field['id'];?>);"><i class="fa fa-check fa-fw"></i></button>
                            <?if ((int)$field['redact'] === 1) {?>
                                <button class="btn btn-danger"><i class="fa fa-remove fa-fw"></i></button>
                            <?}?>
                        </td>
                    </tr>
                    <?}?>
                    <tr id="priceField0">
                        <td>
                            <input type="text" class="form-control price-field-name">
                        </td>
                        <td>
                            <input type="text" class="form-control price-field-column">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success" onclick="redactPriceField(0);"><i class="fa fa-check fa-fw"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<div class="modal fade" id="uploadProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Загрузка прайса</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="filename">Выбор файла</label>
                        <input type="file" id="filename" name="filename">
                    </div>
                    <input type="hidden" id="distributor" name="distributor">

                    <button type="button" id="uploadProductsBtn" class="btn btn-default">Загрузить</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>