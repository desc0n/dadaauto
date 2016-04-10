<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-10-13 14:01:04 --- CRITICAL: Database_Exception [ 1146 ]: Table 'primtapki_balansir.items_id' doesn't exist [ 
            select `ia`.`value` as `availibility`,
            `iab`.`value` as `about`,
            `icm`.`value` as `catalog_manufacturer`,
            `icat`.`value` as `category_id`,
            `icapacity`.`value` as `capacity`,
            `icharge`.`value` as `charge`,
            `c`.`name` as `category`,
            `iconstr`.`value` as `construction`,
            `ic`.`value` as `country`,
            `icompl`.`value` as `complect`,
            `icont`.`value` as `contact`,
            `id`.`value` as `diameter`,
            `idel`.`num` as `delivery_num`,
            `idel`.`cities` as `delivery_cities`,
            `idesc`.`value` as `discription`,
            `ifs`.`value` as `full_size`,
            `ii`.`item_id`,
            `iimg`.`img_1`,
            `iimg`.`img_2`,
            `iimg`.`img_3`,
            `iimg`.`img_4`,
            `iimg`.`img_5`,
            `iimg`.`img_6`,
            `il`.`value` as `link`,
            `ih`.`value` as `height`,
            `im`.`value` as `manufacturer`,
            `imod`.`value` as `model`,
            `ip`.`value` as `price`,
            `ipost`.`autor` as `post_autor`,
            `ipost`.`text` as `post_text`,
            `iseas`.`value` as `season`,
            `is`.`value` as `size`,
            `isp`.`value` as `speed`,
            `it`.`value` as `type`,
            `ititle`.`value` as `title`,
            `iu`.`value` as `usability`,
            `iweight`.`value` as `weight`,
            `iw`.`value` as `width`
            from `items_id` `ii`
            left join `items_about` `iab`
                on `iab`.`item` = `ii`.`id`
            left join `items_availability` `ia`
                on `ia`.`item` = `ii`.`id`
            left join `items_catalog_manufacturer` `icm`
                on `icm`.`item` = `ii`.`id`
            left join `items_category` `icat`
                on `icat`.`item` = `ii`.`id`
            left join `items_contact` `icont`
                on `icont`.`item` = `ii`.`id`
            left join `categories` `c`
                on `c`.`id` = `icat`.`value`
            left join `items_construction` `iconstr`
                on `iconstr`.`item` = `ii`.`id`
            left join `items_complect` `icompl`
                on `icompl`.`item` = `ii`.`id`
            left join `items_capacity` `icapacity`
                on `icapacity`.`item` = `ii`.`id`
            left join `items_charge` `icharge`
                on `icharge`.`item` = `ii`.`id`
            left join `items_country` `ic`
                on `ic`.`item` = `ii`.`id`
            left join `items_diameter` `id`
                on `id`.`item` = `ii`.`id`
            left join `items_delivery` `idel`
                on `idel`.`item` = `ii`.`id`
            left join `items_description` `idesc`
                on `idesc`.`item` = `ii`.`id`
            left join `items_full_size` `ifs`
                on `ifs`.`item` = `ii`.`id`
            left join `items_imgs` `iimg`
                on `iimg`.`item` = `ii`.`id`
            left join `items_manufacturer` `im`
                on `im`.`item` = `ii`.`id`
            left join `items_model` `imod`
                on `imod`.`item` = `ii`.`id`
            left join `items_height` `ih`
                on `ih`.`item` = `ii`.`id`
            left join `items_price` `ip`
                on `ip`.`item` = `ii`.`id`
            left join `items_post` `ipost`
                on `ipost`.`item` = `ii`.`id`
            left join `items_season` `iseas`
                on `iseas`.`item` = `ii`.`id`
            left join `items_size` `is`
                on `is`.`item` = `ii`.`id`
            left join `items_type` `it`
                on `it`.`item` = `ii`.`id`
            left join `items_title` `ititle`
                on `ititle`.`item` = `ii`.`id`
            left join `items_link` `il`
                on `il`.`item` = `ii`.`id`
            left join `items_usability` `iu`
                on `iu`.`item` = `ii`.`id`
            left join `items_weight` `iweight`
                on `iweight`.`item` = `ii`.`id`
            left join `items_width` `iw`
                on `iw`.`item` = `ii`.`id`
            left join `items_speed` `isp`
                on `isp`.`item` = `ii`.`id`
            limit 0,1
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 14:01:04 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            s...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(250): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Ajax.php(23): Model_Admin->findAllProduct()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_find_all_product()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 14:02:12 --- CRITICAL: Database_Exception [ 1146 ]: Table 'primtapki_balansir.categories' doesn't exist [ 
            select `ia`.`value` as `availibility`,
            `iab`.`value` as `about`,
            `icm`.`value` as `catalog_manufacturer`,
            `icat`.`value` as `category_id`,
            `icapacity`.`value` as `capacity`,
            `icharge`.`value` as `charge`,
            `c`.`name` as `category`,
            `iconstr`.`value` as `construction`,
            `ic`.`value` as `country`,
            `icompl`.`value` as `complect`,
            `icont`.`value` as `contact`,
            `id`.`value` as `diameter`,
            `idel`.`num` as `delivery_num`,
            `idel`.`cities` as `delivery_cities`,
            `idesc`.`value` as `discription`,
            `ifs`.`value` as `full_size`,
            `ii`.`item_id`,
            `iimg`.`img_1`,
            `iimg`.`img_2`,
            `iimg`.`img_3`,
            `iimg`.`img_4`,
            `iimg`.`img_5`,
            `iimg`.`img_6`,
            `il`.`value` as `link`,
            `ih`.`value` as `height`,
            `im`.`value` as `manufacturer`,
            `imod`.`value` as `model`,
            `ip`.`value` as `price`,
            `ipost`.`autor` as `post_autor`,
            `ipost`.`text` as `post_text`,
            `iseas`.`value` as `season`,
            `is`.`value` as `size`,
            `isp`.`value` as `speed`,
            `it`.`value` as `type`,
            `ititle`.`value` as `title`,
            `iu`.`value` as `usability`,
            `iweight`.`value` as `weight`,
            `iw`.`value` as `width`
            from `primtapki_vikamorgan`.`items_id` `ii`
            left join `primtapki_vikamorgan`.`items_about` `iab`
                on `iab`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_availability` `ia`
                on `ia`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_catalog_manufacturer` `icm`
                on `icm`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_category` `icat`
                on `icat`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_contact` `icont`
                on `icont`.`item` = `ii`.`id`
            left join `categories` `c`
                on `c`.`id` = `icat`.`value`
            left join `primtapki_vikamorgan`.`items_construction` `iconstr`
                on `iconstr`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_complect` `icompl`
                on `icompl`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_capacity` `icapacity`
                on `icapacity`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_charge` `icharge`
                on `icharge`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_country` `ic`
                on `ic`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_diameter` `id`
                on `id`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_delivery` `idel`
                on `idel`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_description` `idesc`
                on `idesc`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_full_size` `ifs`
                on `ifs`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_imgs` `iimg`
                on `iimg`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_manufacturer` `im`
                on `im`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_model` `imod`
                on `imod`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_height` `ih`
                on `ih`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_price` `ip`
                on `ip`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_post` `ipost`
                on `ipost`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_season` `iseas`
                on `iseas`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_size` `is`
                on `is`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_type` `it`
                on `it`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_title` `ititle`
                on `ititle`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_link` `il`
                on `il`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_usability` `iu`
                on `iu`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_weight` `iweight`
                on `iweight`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_width` `iw`
                on `iw`.`item` = `ii`.`id`
            left join `primtapki_vikamorgan`.`items_speed` `isp`
                on `isp`.`item` = `ii`.`id`
            limit 0,1
         ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 14:02:12 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            s...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(250): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Ajax.php(23): Model_Admin->findAllProduct()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Ajax->action_find_all_product()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 14:10:06 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Admin::findAllProduct() ~ APPPATH\classes\Controller\Ajax.php [ 23 ] in file:line
2015-10-13 14:10:06 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-10-13 15:48:56 --- CRITICAL: Database_Exception [ 1051 ]: Unknown table 'cal' [ 
            SELECT `cal`.*,
            `up`.`name` as `manager_name`
            FROM `customers__products` `cp`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cp`.`manager_id` WHERE 1 AND `cp`.`customer_id` = 3
             ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 15:48:56 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, '??            S...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(281): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(70): Model_Admin->findProductBy(Array)
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 16:41:39 --- CRITICAL: Database_Exception [ 1146 ]: Table 'primtapki_balansir.customer__type' doesn't exist [ SELECT * FROM `customer__type` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251
2015-10-13 16:41:39 --- DEBUG: #0 Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT * FROM `...', false, Array)
#1 Z:\home\primtapki.crm.lan\www\crm\application\classes\Model\Admin.php(416): Kohana_Database_Query->execute()
#2 Z:\home\primtapki.crm.lan\www\crm\application\classes\Controller\Customer.php(28): Model_Admin->findAllCustomerTypes()
#3 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Controller.php(84): Controller_Customer->action_list()
#4 [internal function]: Kohana_Controller->execute()
#5 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Customer))
#6 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 Z:\home\primtapki.crm.lan\www\crm\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 Z:\home\primtapki.crm.lan\www\crm\index.php(119): Kohana_Request->execute()
#9 {main} in Z:\home\primtapki.crm.lan\www\crm\modules\database\classes\Kohana\Database\Query.php:251