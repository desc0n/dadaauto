<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-01-08 12:57:32 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Notice' not found ~ SYSPATH\classes\Kohana\Model.php [ 26 ] in file:line
2016-01-08 12:57:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-08 13:02:08 --- CRITICAL: View_Exception [ 0 ]: The requested view admin_template could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-01-08 13:02:08 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('admin_template')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('admin_template', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Admin.php(37): Kohana_View::factory('admin_template')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Admin->action_control_panel()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-01-08 13:08:51 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cb94560_main.users' doesn't exist [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php:358
2016-01-08 13:08:51 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php(358): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#1 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\ORM.php(1665): Kohana_Database_MySQL->list_columns('users')
#2 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\ORM.php(441): Kohana_ORM->list_columns()
#3 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\ORM.php(386): Kohana_ORM->reload_columns()
#4 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 Z:\home\daauto.lan\www\modules\orm\classes\Kohana\Auth\ORM.php(75): Kohana_ORM::factory('User')
#7 Z:\home\daauto.lan\www\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login('admin@site.ru', 'kFK=fziWc~f0', true)
#8 Z:\home\daauto.lan\www\application\classes\Controller\Admin.php(33): Kohana_Auth->login('admin@site.ru', 'kFK=fziWc~f0', true)
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Admin->action_control_panel()
#10 [internal function]: Kohana_Controller->execute()
#11 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#12 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#14 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#15 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\MySQL.php:358
2016-01-08 13:11:30 --- CRITICAL: View_Exception [ 0 ]: The requested view reviews_moderation could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-01-08 13:11:30 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('reviews_moderat...')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('reviews_moderat...', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Admin.php(127): Kohana_View::factory('reviews_moderat...')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Admin->action_control_panel()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2016-01-08 13:12:16 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cb94560_main.pages' doesn't exist [ 
            select `p`.*
            from `pages` `p`
            inner join `menu` `m`
                on `m`.`page_id` = `p`.`id`
            where `m`.`status_id` = 1
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-01-08 13:12:16 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            s...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(699): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Admin.php(138): Model_Admin->getPages()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Admin->action_control_panel()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-01-08 13:14:27 --- CRITICAL: Database_Exception [ 1146 ]: Table 'cb94560_main.menu' doesn't exist [ 
            select `p`.*
            from `pages` `p`
            inner join `menu` `m`
                on `m`.`page_id` = `p`.`id`
            where `m`.`status_id` = 1
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2016-01-08 13:14:27 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            s...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(699): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Admin.php(138): Model_Admin->getPages()
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Admin->action_control_panel()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251