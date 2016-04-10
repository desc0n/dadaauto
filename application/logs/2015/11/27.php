<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-11-27 16:05:59 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect(): Access denied for user 'cb94560_main'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php:171
2015-11-27 16:05:59 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php(171): Kohana_Database_MySQL->connect()
#1 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(3, 'SET time_zone =...', false, Array)
#2 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(18): Kohana_Database_Query->execute()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Model.php(26): Model_Admin->__construct()
#4 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(17): Kohana_Model::factory('Admin')
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#11 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php:171
2015-11-27 16:07:16 --- CRITICAL: ErrorException [ 1 ]: Call to a member function as_array() on a non-object ~ APPPATH\classes\Model\Admin.php [ 610 ] in file:line
2015-11-27 16:07:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-11-27 16:07:37 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '1' for key 'order_id' [ INSERT INTO `orders__statuses` (`order_id`, `status`) VALUES ('1', 2) ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-11-27 16:07:37 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `or...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(602): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(30): Model_Admin->setOrderStatus(Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251