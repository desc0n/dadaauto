<?
/** @var Model_Product $productModel */
$productModel = Model::factory('Product');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Поставщики</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Список поставщиков
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover actions-table" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Тип</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($distributorsData as $distributor) {?>
                        <tr>
                            <td><?=$distributor['name'];?></td>
                            <td><?=Arr::get($productModel->distributorsType, $distributor['type']);?></td>
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
            <button class="btn btn-success" data-toggle="modal" data-target="#addStoreDistributorModal">Добавить поставщика <i class="fa fa-plus fa-fw"></i></button>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="addStoreDistributorModal" tabindex="-1" role="dialog" aria-labelledby="addActionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="addActionLabel">Добавление поставщика</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="addActionForm" method="post">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Название *</label>
                            <label class="control-label hide" for="newStoreDistributorName" id="newStoreDistributorNameError">Не выбрано</label>
                            <input class="form-control" name="name" id="newName" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Тип *</label>
                            <label class="control-label hide" for="newType" id="newTypeError">Не указан тип</label>
                            <?=Form::select('type', $productModel->distributorsType, null, ['class' => 'form-control']);?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="addNewAction">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
