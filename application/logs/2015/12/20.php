<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-20 14:56:44 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2015-12-20 14:56:44 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(99): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_pay()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2015-12-20 14:57:26 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 40 ] in Z:\home\daauto.lan\www\application\views\template.php:40
2015-12-20 14:57:26 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 40, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(111): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_pay()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:40
2015-12-20 14:58:26 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: viewSuccess ~ APPPATH\views\pay.php [ 25 ] in Z:\home\daauto.lan\www\application\views\pay.php:25
2015-12-20 14:58:26 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\pay.php(25): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 25, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\application\views\template.php(58): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#6 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#7 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#9 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(111): Kohana_Response->body(Object(View))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_pay()
#11 [internal function]: Kohana_Controller->execute()
#12 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#13 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#16 {main} in Z:\home\daauto.lan\www\application\views\pay.php:25