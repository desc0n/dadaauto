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
                            <th class="text-center">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?foreach ($notPayedOrders as $orderData) {?>
                            <tr>
                                <td><?=$orderData['order_id'];?></td>
                                <td><?=Date::convertDateToFormat($orderData['date'], 'H:i d.m.Y');?></td>
                                <td class="text-center"><?=$orderData['order_price'];?></td>
                                <td class="text-center">
                                    <button class="btn btn-success" title="Принять оплату"><i class="fa fa-dollar fa-fw"></i></button>
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
