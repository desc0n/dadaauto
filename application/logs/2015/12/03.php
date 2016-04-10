<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-03 13:48:48 --- CRITICAL: View_Exception [ 0 ]: The requested view index could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2015-12-03 13:48:48 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('index')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('index', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(44): Kohana_View::factory('index')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2015-12-03 14:39:54 --- CRITICAL: View_Exception [ 0 ]: The requested view about could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2015-12-03 14:39:54 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('about')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('about', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(53): Kohana_View::factory('about')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_about()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2015-12-03 15:10:02 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page ~ APPPATH\views\template.php [ 32 ] in Z:\home\daauto.lan\www\application\views\template.php:32
2015-12-03 15:10:02 --- DEBUG: #0 Z:\home\daauto.lan\www\application\views\template.php(32): Kohana_Core::error_handler(8, 'Undefined varia...', 'Z:\home\daauto....', 32, Array)
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(61): include('Z:\home\daauto....')
#2 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(348): Kohana_View::capture('Z:\home\daauto....', Array)
#3 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 Z:\home\daauto.lan\www\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(56): Kohana_Response->body(Object(View))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_about()
#7 [internal function]: Kohana_Controller->execute()
#8 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#9 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#12 {main} in Z:\home\daauto.lan\www\application\views\template.php:32