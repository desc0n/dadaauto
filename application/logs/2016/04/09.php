<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-04-09 06:11:48 --- CRITICAL: View_Exception [ 0 ]: The requested view actions_list could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-09 06:11:48 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('actions_list')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('actions_list', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Actions.php(21): Kohana_View::factory('actions_list')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Actions->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Actions))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-04-09 06:17:46 --- CRITICAL: Database_Exception [ 1221 ]: Incorrect usage of UNION and ORDER BY [ 
            SELECT `cal`.*,
            `up`.`name` as `manager_name`,
            `acm`.`name` as `communication_method_name`,
            `at`.`name` as `type_name`
            FROM `customers__actions_list` `cal`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cal`.`manager_id`
            INNER JOIN `actions__communication_method` `acm`
                ON `acm`.`id` = `cal`.`communication_method`
            INNER JOIN `actions__type` `at`
                ON `at`.`id` = `cal`.`type`
            ORDER BY `cal`.`date` DESC
            UNION SELECT `o`
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:17:46 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(136): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(32): Model_Admin->findAllActions()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:22:42 --- CRITICAL: Database_Exception [ 1221 ]: Incorrect usage of UNION and ORDER BY [ 
            SELECT `cal`.*,
            `up`.`name` as `manager_name`,
            `acm`.`name` as `communication_method_name`,
            `at`.`name` as `type_name`
            FROM `customers__actions_list` `cal`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cal`.`manager_id`
            INNER JOIN `actions__communication_method` `acm`
                ON `acm`.`id` = `cal`.`communication_method`
            INNER JOIN `actions__type` `at`
                ON `at`.`id` = `cal`.`type`
            ORDER BY `cal`.`date` DESC
            UNION SELECT 'клиент'  as `manager_name`,
            `o`.`date`,
            `o`.`id`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1)  as `type_name`
            FROM `orders` `o`
            ORDER BY `o`.`date` DESC
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:22:42 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(141): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(32): Model_Admin->findAllActions()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:23:18 --- CRITICAL: Database_Exception [ 1222 ]: The used SELECT statements have a different number of columns [ 
            SELECT `cal`.*,
            `up`.`name` as `manager_name`,
            `acm`.`name` as `communication_method_name`,
            `at`.`name` as `type_name`
            FROM `customers__actions_list` `cal`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cal`.`manager_id`
            INNER JOIN `actions__communication_method` `acm`
                ON `acm`.`id` = `cal`.`communication_method`
            INNER JOIN `actions__type` `at`
                ON `at`.`id` = `cal`.`type`
            UNION SELECT 'клиент'  as `manager_name`,
            `o`.`date`,
            `o`.`id`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1)  as `type_name`
            FROM `orders` `o`
            ORDER BY `cal`.`date` DESC, `o`.`date` DESC
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:23:18 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(140): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(32): Model_Admin->findAllActions()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:25:40 --- CRITICAL: Database_Exception [ 1222 ]: The used SELECT statements have a different number of columns [ 
            SELECT `cal`.*,
            `up`.`name` as `manager_name`,
            `acm`.`name` as `communication_method_name`,
            `at`.`name` as `type_name`
            FROM `customers__actions_list` `cal`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cal`.`manager_id`
            INNER JOIN `actions__communication_method` `acm`
                ON `acm`.`id` = `cal`.`communication_method`
            INNER JOIN `actions__type` `at`
                ON `at`.`id` = `cal`.`type`
            UNION SELECT 'запрос с сайта' as `text`,
            NULL as `manager_id`,
            NULL as `customer_id`,
            `o`.`date`,
            `o`.`id`,
            'клиент'  as `manager_name`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1) as `communication_method_name`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1)  as `type_name`
            FROM `orders` `o`
            ORDER BY `cal`.`date` DESC, `o`.`date` DESC
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:25:40 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(144): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(32): Model_Admin->findAllActions()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:28:31 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'cal.date' in 'order clause' [ 
            SELECT `cal`.`id`,
            `cal`.`manager_id`,
            `cal`.`customer_id`,
            `cal`.`text`,
            `cal`.`date`,
            `up`.`name` as `manager_name`,
            `acm`.`name` as `communication_method_name`,
            `at`.`name` as `type_name`
            FROM `customers__actions_list` `cal`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cal`.`manager_id`
            INNER JOIN `actions__communication_method` `acm`
                ON `acm`.`id` = `cal`.`communication_method`
            INNER JOIN `actions__type` `at`
                ON `at`.`id` = `cal`.`type`
            UNION SELECT `o`.`id`,
            NULL as `manager_id`,
            NULL as `customer_id`,
            'запрос с сайта' as `text`,
            `o`.`date`,
            'клиент'  as `manager_name`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1) as `communication_method_name`,
            (SELECT `name` FROM `actions__type` WHERE `id` = 1)  as `type_name`
            FROM `orders` `o`
            ORDER BY `cal`.`date` DESC, `o`.`date` DESC
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-04-09 06:28:31 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(148): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Crm.php(32): Model_Admin->findAllActions()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Crm->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Crm))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251