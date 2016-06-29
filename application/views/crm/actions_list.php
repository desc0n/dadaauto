<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Заказы</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-container" method="get">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <div class='input-group date' id='start'>
                            <input type='text' class="form-control"  name="start" value="<?=$start;?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <div class='input-group date' id='end'>
                            <input type='text' class="form-control"  name="end" value="<?=$end;?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-2">
                    <button class="btn btn-default">Фильтровать</button>
                </div><!-- /.col-lg-2 -->
            </div><!-- /.row -->
        </form>
        <div class="panel panel-default">
            <div class="panel-heading">
                Список событий
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover actions-table" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Добавил</th>
                            <th>Дата добавления</th>
                            <th>Описание события</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($actionsList as $action) {?>
                            <tr>
                                <td class="text-center"><?=$action['manager_name'];?></td>
                                <td class="text-center"><?=date('H:i d.m.Y', strtotime($action['date']));?></td>
                                <td><?=$action['text'];?></td>
                                <td class="text-center">
                                    <a href="<?=(null === $action['order_id'] ? sprintf('/crm/action/%s', $action['action_id']) : sprintf('/crm/order/%s', $action['order_id']));?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Посмотреть</a>
                                </td>
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
            <button class="btn btn-success" data-toggle="modal" data-target="#addActionModal">Добавить событие <i class="fa fa-plus fa-fw"></i></button>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="addActionModal" tabindex="-1" role="dialog" aria-labelledby="addActionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addActionLabel">Добавление события</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="addActionForm" method="post">
                    <div class="form-group">
                        <legend>Тип события *</legend>
                        <div class="col-lg-12">
                            <label class="control-label hide" for="newAction" id="newActionError">Не выбрано</label>
                            <select class="form-control" name="type" id="newType">
                                <option value="0">не выбран</option>
                                <? foreach ($actions as $act) {?>
                                <option value="<?=$act['id'];?>"><?=$act['name'];?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                    <legend>Клиент</legend>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Имя *</label>
                            <label class="control-label hide" for="newName" id="newNameError">Поле пустое</label>
                            <input class="form-control" name="name" id="newName" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Телефон *</label>
                            <label class="control-label hide" for="newPhone" id="newPhoneError">Длина номера 10 цифр</label>
                            <div class="input-group">
                                <span class="input-group-addon">+7</span>
                                <input class="form-control" id="newPhone" name="phone" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>E-mail</label>
                            <input class="form-control" name="email" id="newEmail" value="">
                        </div>
                    </div>
                    <label>Товар</label>
                    <div id="redactProductForm">
                        <div class="form-group product-row" id="productRow1" data-row="1">
                            <input class="col-lg-6-important form-control" id="productName" name="productName[]" onkeyup="initTypeaheadProductName($(this));" onchange="getCurrentTypeahead($(this));" placeholder="Название" autocomplete="off">
                            <input class="col-lg-2-important form-control" id="productQuantity" name="productQuantity[]" placeholder="Кол-во" autocomplete="off">
                            <input class="col-lg-2-important form-control" id="productPrice" name="productPrice[]" placeholder="Цена" autocomplete="off">
                            <button class="btn btn-default col-lg-1-important" disabled><i class="fa fa-remove fa-fw"></i></button>
                            <input type="hidden" name="productId[]" id="productId">
                        </div>
                    </div>
                    <input type="hidden" id="customerId" name="customer">
                </form>
                <button type="button" class="btn btn-default" id="addProductRowBtn">Добавить позицию <i class="fa fa-plus fa-fw"></i></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="addNewAction">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#newDate').datetimepicker({
            locale: 'ru',
            format: 'DD.MM.YYYY'
        });
    });
</script>

