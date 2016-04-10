<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-11-10 14:36:41 --- CRITICAL: Database_Exception [ 1146 ]: Table 'primtapki_balansir.actions__type' doesn't exist [ 
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
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-11-10 14:36:41 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(135): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Index.php(27): Model_Admin->findAllActions()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-11-10 14:40:02 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'cal.type' in 'on clause' [ 
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
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-11-10 14:40:02 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(135): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Index.php(27): Model_Admin->findAllActions()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251