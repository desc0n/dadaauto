<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-06 14:37:32 --- CRITICAL: ErrorException [ 8 ]: Undefined index: phone ~ APPPATH\classes\Model\Admin.php [ 61 ] in Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php:61
2015-10-06 14:37:32 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(61): Kohana_Core::error_handler(8, 'Undefined index...', 'Z:\home\primtap...', 61, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(49): Model_Admin->setCustomer('3', Array)
#2 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_info()
#3 [internal function]: Kohana_Controller->execute()
#4 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#8 {main} in Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php:61
2015-10-06 14:38:57 --- CRITICAL: Database_Exception [ 1048 ]: Column 'phone' cannot be null [ INSERT INTO `customers__data`
            (`customers_id`, `name`, `postindex`, `region`, `city`, `street`, `house`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES ('3', 'Дмитрий Савельев', '690105', 'Приморский край', 'Владивосток', 'Снеговая', '4', NULL, '', 'customer@mail.ru', '', '1970-01-01')
            ON DUPLICATE KEY UPDATE `name` = 'Дмитрий Савельев', `postindex` = '690105', `region` = 'Приморский край', `city` = 'Владивосток',
            `street` = 'Снеговая', `house` = '4', `fax` = '', `site` = '', `email` = 'customer@mail.ru' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-06 14:38:57 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `cu...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(66): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(49): Model_Admin->setCustomer('3', Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-06 17:12:32 --- CRITICAL: ErrorException [ 8 ]: Undefined index: manager_name ~ APPPATH\views\customer_info.php [ 82 ] in Z:\home\primtapki.crm.lan\www\crm\application\views\customer_info.php:82
2015-10-06 17:12:32 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\application\views\customer_info.php(82): Kohana_Core::error_handler(8, 'Undefined index...', 'Z:\home\primtap...', 82, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(61): include('Z:\home\primtap...')
#2 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\primtap...', Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\primtapki.crm.lan\www\crm\application\views\template.php(97): Kohana_View->__toString()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(61): include('Z:\home\primtap...')
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\primtap...', Array)
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#9 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(64): Kohana_Response->body(Object(View))
#10 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_info()
#11 [internal function]: Kohana_Controller->execute()
#12 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#13 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#16 {main} in Z:\home\primtapki.crm.lan\www\crm\application\views\customer_info.php:82