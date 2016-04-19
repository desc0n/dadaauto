<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRM</title>
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

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Войти</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Логин" name="username" type="text" value="" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Пароль" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" name="login">Войти</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Core JavaScript -->
<script src="/public/crm/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/public/crm/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/public/crm/dist/js/sb-admin-2.js"></script>
<!-- DataTables JavaScript -->
<script src="/public/crm/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/public/crm/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
</body>
</html>
