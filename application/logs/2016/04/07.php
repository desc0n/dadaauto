<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-04-07 14:38:41 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cb94560_main.customers__data' doesn't exist [ 
            SELECT `cd`.*,
            IF (`cd`.`postindex` != '', CONCAT(`cd`.`postindex`, ' '), '') as `listview_postindex`,
            IF (`cd`.`region` != '', CONCAT(`cd`.`region`, ' '), '') as `listview_region`,
            IF (`cd`.`city` != '', CONCAT('г. ', `cd`.`city`, ' '), '') as `listview_city`,
            IF (`cd`.`street` != '', CONCAT('ул. ', `cd`.`street`, ' '), '') as `listview_street`,
            IF (`cd`.`house` != '', CONCAT('д. ', `cd`.`house`, ' '), '') as `listview_house`,
            `ct`.`name` as `type_name`,
            `up`.`name` as `manager_name`
            FROM `customers__data` `cd`
            INNER JOIN `customers__list` `cl`
                ON `cl`.`id` = `cd`.`customers_id`
            INNER JOIN `customers__type` `ct`
                ON `ct`.`id` = `cd`.`type`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cl`.`manager_id`
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-07 14:38:41 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(89): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(26): Model_Admin->findAllCustomer()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-07 14:54:08 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cb94560_main.users__profile' doesn't exist [ 
            SELECT `cd`.*,
            IF (`cd`.`postindex` != '', CONCAT(`cd`.`postindex`, ' '), '') as `listview_postindex`,
            IF (`cd`.`region` != '', CONCAT(`cd`.`region`, ' '), '') as `listview_region`,
            IF (`cd`.`city` != '', CONCAT('г. ', `cd`.`city`, ' '), '') as `listview_city`,
            IF (`cd`.`street` != '', CONCAT('ул. ', `cd`.`street`, ' '), '') as `listview_street`,
            IF (`cd`.`house` != '', CONCAT('д. ', `cd`.`house`, ' '), '') as `listview_house`,
            `ct`.`name` as `type_name`,
            `up`.`name` as `manager_name`
            FROM `customers__data` `cd`
            INNER JOIN `customers__list` `cl`
                ON `cl`.`id` = `cd`.`customers_id`
            INNER JOIN `customers__type` `ct`
                ON `ct`.`id` = `cd`.`type`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cl`.`manager_id`
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-07 14:54:08 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(89): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(26): Model_Admin->findAllCustomer()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-07 14:55:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:55:36 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:56:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:56:44 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:01 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:01 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:27 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:53 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:53 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 14:59:58 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:00:43 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:00:43 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:00:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:00:47 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(28): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:02:30 --- CRITICAL: View_Exception [ 0 ]: The requested view actions_list could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:02:30 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('actions_list')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('actions_list', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Actions.php(21): Kohana_View::factory('actions_list')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Actions->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Actions))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:03:07 --- CRITICAL: View_Exception [ 0 ]: The requested view customer_list could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:03:07 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('customer_list')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('customer_list', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Customer.php(26): Kohana_View::factory('customer_list')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:07:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:07:56 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(35): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2016-04-07 15:08:17 --- CRITICAL: View_Exception [ 0 ]: The requested view customer_list could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:08:17 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('customer_list')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('customer_list', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(66): Kohana_View::factory('customer_list')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_customer_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:12:38 --- CRITICAL: View_Exception [ 0 ]: The requested view customer_list could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-07 15:12:38 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('customer_list')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('customer_list', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(66): Kohana_View::factory('customer_list')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_customer_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137