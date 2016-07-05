<?
/** @var $actionModel Model_Action */
$actionModel = Model::factory('Action');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Доставки</h1>
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
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover actions-table" id="dataTables-example">
                <thead>
                <tr>
                    <th class="text-center">№ реализации</th>
                    <th class="text-center">Телефон клиента</th>
                    <th class="text-center">Имя клиента</th>
                    <th class="text-center">Адрес доставки</th>
                    <th class="text-center">ТК</th>
                    <th class="text-center">Статус</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?foreach ($deliveriesList as $delivery) {?>
                    <tr>
                        <td class="text-center"><?=$delivery['action_id'];?></td>
                        <td class="text-center"><?=$delivery['customer_phone'];?></td>
                        <td class="text-center"><?=$delivery['customer_name'];?></td>
                        <td class="text-center"><?=$delivery['customer_address'];?></td>
                        <td class="text-center"><?=$delivery['customer_tk'];?></td>
                        <td class="text-center"><?=Arr::get($actionModel->deliveryStatus, $delivery['status']);?></td>
                        <td class="text-center">
                            <?if ($delivery['status'] !== 'success') {?>
                                <form method="post">
                                    <button class="btn btn-success" name="successDelivery" value="<?=$delivery['id'];?>" title="Подтвердить доставку"><i class="fa fa-car fa-fw"></i></button>
                                </form>
                            <?}?>
                        </td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
    </div>
</div>