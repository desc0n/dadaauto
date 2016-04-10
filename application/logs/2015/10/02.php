<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-02 17:11:00 --- CRITICAL: ErrorException [ 8 ]: Undefined index: manager_name ~ APPPATH\views\customer_list.php [ 32 ] in Z:\home\primtapki.crm.lan\www\crm\application\views\customer_list.php:32
2015-10-02 17:11:00 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\application\views\customer_list.php(32): Kohana_Core::error_handler(8, 'Undefined index...', 'Z:\home\primtap...', 32, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(61): include('Z:\home\primtap...')
#2 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\primtap...', Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\primtapki.crm.lan\www\crm\application\views\template.php(108): Kohana_View->__toString()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(61): include('Z:\home\primtap...')
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\primtap...', Array)
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#9 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(23): Kohana_Response->body(Object(View))
#10 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#11 [internal function]: Kohana_Controller->execute()
#12 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#16 {main} in Z:\home\primtapki.crm.lan\www\crm\application\views\customer_list.php:32
2015-10-02 17:11:32 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'cd.customer_id' in 'on clause' [ 
            SELECT `cd`.*,
            `up`.`name` as `manager_name`
            FROM `customers__data` `cd`
            INNER JOIN `customers__list` `cl`
                ON `cl`.`id` = `cd`.`customer_id`
            INNER JOIN `users__profile` `up`
                ON `up`.`manager_id` = `cl`.`manager_id`
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-02 17:11:32 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(71): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(22): Model_Admin->findAllCustomer()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-02 17:11:55 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'up.manager_id' in 'on clause' [ 
            SELECT `cd`.*,
            `up`.`name` as `manager_name`
            FROM `customers__data` `cd`
            INNER JOIN `customers__list` `cl`
                ON `cl`.`id` = `cd`.`customers_id`
            INNER JOIN `users__profile` `up`
                ON `up`.`manager_id` = `cl`.`manager_id`
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-02 17:11:55 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(71): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(22): Model_Admin->findAllCustomer()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251