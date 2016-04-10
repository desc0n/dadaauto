<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-27 15:40:24 --- CRITICAL: Database_Exception [ 1048 ]: Column 'content' cannot be null [ insert into `reviews`
            (`author`, `city`, `content`, `date`)
            values ('cxvxcvcx', 'cxvcxv', NULL, now())
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:40:24 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'insert into `re...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(675): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Ajax.php(56): Model_Admin->addReview(Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_add_review()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:41:34 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':review, now())' at line 3 [ insert into `reviews`
            (`author`, `city`, `content`, `date`)
            values ('fdgfd', 'dfgfd', :review, now())
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:41:34 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'insert into `re...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(675): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Ajax.php(56): Model_Admin->addReview(Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_add_review()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:46:31 --- CRITICAL: Database_Exception [ 1048 ]: Column 'content' cannot be null [ insert into `reviews`
            (`author`, `city`, `content`, `date`)
            values ('fdgfd', 'dfgfd', NULL, now())
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:46:31 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'insert into `re...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(675): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Ajax.php(56): Model_Admin->addReview(Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_add_review()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:47:02 --- CRITICAL: Database_Exception [ 1048 ]: Column 'content' cannot be null [ insert into `reviews`
            (`author`, `city`, `content`, `date`)
            values ('dgf', 'fdgdf', NULL, now())
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251
2015-12-27 15:47:02 --- DEBUG: #0 Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'insert into `re...', false, Array)
#1 Z:\home\daauto.lan\www\application\classes\Model\Admin.php(675): Kohana_Database_Query->execute()
#2 Z:\home\daauto.lan\www\application\classes\Controller\Ajax.php(56): Model_Admin->addReview(Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_add_review()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\modules\database\classes\Kohana\Database\Query.php:251