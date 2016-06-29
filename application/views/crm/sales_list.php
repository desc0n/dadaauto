<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Реализации</h1>
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
                            <th>№ реализации</th>
                            <th>Дата реализации</th>
                            <th>Сумма реализации</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($actionsList as $action) {?>
                            <tr>
                                <td class="text-center"><?=$action['id'];?></td>
                                <td class="text-center"><?=date('H:i d.m.Y', strtotime($action['date']));?></td>
                                <td><?=$action['sale_price'];?></td>
                                <td class="text-center">
                                    <a class="btn btn-default" href="/crm/sale/<?=$action['id'];?>"><i class="fa fa-search fa-fw"></i></a>
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