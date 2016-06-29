<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Неоплаченные заказы</h1>
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
                Список заказов
            </div>
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover actions-table" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>№ заказа</th>
                            <th>Дата создания</th>
                            <th class="text-center">Цена</th>
                            <th class="text-center">Оплачено</th>
                            <th class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?foreach ($notPayedOrders as $orderData) {?>
                            <tr>
                                <td><?=$orderData['action_id'];?></td>
                                <td><?=Date::convertDateToFormat($orderData['date'], 'H:i d.m.Y');?></td>
                                <td class="text-center"><?=$orderData['action_price'];?></td>
                                <td class="text-center"><?=$orderData['payed_price'];?></td>
                                <td class="text-center">
                                    <button class="btn btn-success" title="Принять оплату" onclick="$('#paymentAction').val(<?=$orderData['action_id'];?>);$('#addPaymentModal').modal('toggle');">
                                        <i class="fa fa-dollar fa-fw"></i>
                                    </button>
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
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addPaymentModalLabel">Добавление оплаты</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="addPaymentForm">
                    <div class="radio">
                        <label>
                            <input type="radio" name="type" value="cash" checked>
                            Наличными
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="type" value="cashless">
                            Безналом
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="paymentPrice">Сумма</label>
                        <input type="text" class="form-control" id="paymentPrice" name="price" placeholder="Сумма">
                    </div>
                    <input type="hidden" name="paymentAction" id="paymentAction">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onclick="if($('#paymentPrice').val() == '') {alert('Укажите сумму!'); return false;} addPaymentForm.submit();">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>