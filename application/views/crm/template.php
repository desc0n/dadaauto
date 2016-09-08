<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRM</title>
    <link href="/public/i/fav.png"  sizes="38x38" rel="shortcut icon" type="image/png" />
    <!-- Bootstrap Core CSS -->
    <link href="/public/crm/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/public/crm/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/public/crm/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="/public/crm/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/public/crm/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/public/crm/dist/css/sb-admin-2.css" rel="stylesheet">
    <!--Bootstrap Datepicker CSS-->
    <link href="/public/crm/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--Bootstrap Datepicker JavaScript-->
    <script src="/public/crm/js/moment-with-locales.js"></script>
    <script src="/public/crm/js/bootstrap-datetimepicker.js"></script>
    <!--Bootstrap Typeahead JavaScript-->
    <script src="/public/crm/js/bootstrap3-typeahead.min.js"></script>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/crm"><img class="logo" src="/public/i/nasait.png"></a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/crm/quick_sale"><i class="fa fa-file fa-fw"></i> Быстрая продажа</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list fa-fw"></i> Заказы<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/actions_list">Список</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> Реализации<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/sales_list">Список</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-archive fa-fw"></i> Склад<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/store_distributors">Поставщики</a>
                            </li>
                            <li>
                                <a href="/crm/store_remain">Остатки</a>
                            </li>
                            <li>
                                <a href="/crm/price">Загрузка прайса</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dollar fa-fw"></i> Касса<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/markups_list">Наценки</a>
                            </li>
                            <li>
                                <a href="/crm/payment_accept">Принять оплату</a>
                            </li>
                            <li>
                                <a href="/crm/payment_log">Отчет</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-truck fa-fw"></i> Доставка<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/deliveries_list">Список</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Настройки сайта<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/crm/site_reviews">Отзывы</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <?=$content;?>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="errorModalLabel">Ошибка</h4>
            </div>
            <div class="modal-body" id="errorModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- /#errorModal -->

<!-- Bootstrap Core JavaScript -->
<script src="/public/crm/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/public/crm/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/public/crm/dist/js/sb-admin-2.js?v=1"></script>
<!-- DataTables JavaScript -->
<script src="/public/crm/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/public/crm/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $('#start').datetimepicker({
            locale: 'ru',
            format: 'DD.MM.YYYY'
        });
        $('#end').datetimepicker({
            locale: 'ru',
            format: 'DD.MM.YYYY'
        });
    });
</script>
</body>

</html>
