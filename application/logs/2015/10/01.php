<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-01 14:13:03 --- CRITICAL: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\Kohana\Session.php [ 324 ] in Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Session.php:125
2015-10-01 14:13:03 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Session.php(125): Kohana_Session->read(NULL)
#1 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 Z:\home\primtapki.crm.lan\www\crm\modules\auth\classes\Kohana\Auth.php(58): Kohana_Session::instance('native')
#3 Z:\home\primtapki.crm.lan\www\crm\modules\auth\classes\Kohana\Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Index.php(7): Kohana_Auth::instance()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#8 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#11 {main} in Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Session.php:125
2015-10-01 17:43:35 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ':email, '', '28.09.2015')' at line 3 [ INSERT INTO `customers__data`
            (`customer_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (1, 'Дмитрий Савельев', '690105', '', '', '', '', '9147300196', '', :email, '', '28.09.2015') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:43:35 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(56): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:44:38 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'customer_id' in 'field list' [ INSERT INTO `customers__data`
            (`customer_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (2, 'Дмитрий Савельев', '690105', '', '', '', '', '9147300196', '', '', '', '28.09.2015') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:44:38 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:46:22 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '9147300196' for key 'phone' [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (4, 'Дмитрий Савельев', '', '', '', '', '', '9147300196', '', '', '', '2015-10-01') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:46:22 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:48:32 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '9147300196' for key 'phone' [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (5, 'Дмитрий Савельев', '', '', '', '', '', '9147300196', '', '', '', '2015-10-01') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:48:32 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:49:30 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '9147300196' for key 'phone' [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (6, 'Дмитрий Савельев', '', '', '', '', '', '9147300196', '', '', '', '2015-10-01') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:49:30 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:49:37 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '9147300196' for key 'phone' [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (7, 'Дмитрий Савельев', '', '', '', '', '', '9147300196', '', '', '', '2015-10-01') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:49:37 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:50:29 --- CRITICAL: Database_Exception [ 1062 ]: Duplicate entry '9147300196' for key 'phone' [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (8, 'Дмитрий Савельев', '', '', '', '', '', '9147300196', '', '', '', '2015-10-01') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-01 17:50:29 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(57): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(13): Model_Admin->setCustomer(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251