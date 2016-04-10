<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-11-19 17:13:53 --- CRITICAL: View_Exception [ 0 ]: The requested view index could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137
2015-11-19 17:13:53 --- DEBUG: #0 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(137): Kohana_View->set_filename('index')
#1 Z:\home\daauto.lan\www\system\classes\Kohana\View.php(30): Kohana_View->__construct('index', NULL)
#2 Z:\home\daauto.lan\www\application\classes\Controller\Index.php(16): Kohana_View::factory('index')
#3 Z:\home\daauto.lan\www\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#6 Z:\home\daauto.lan\www\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\daauto.lan\www\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\daauto.lan\www\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\daauto.lan\www\system\classes\Kohana\View.php:137