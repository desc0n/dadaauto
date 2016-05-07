<?php

/**
 * Class Model_Admin
 */
class Model_Admin extends Kohana_Model
{

	private $user_id;

	public function __construct()
	{
		if (Auth::instance()->logged_in()) {
			$this->user_id = Auth::instance()->get_user()->id;
		} else {
			$this->user_id = null;
		}
		DB::query(Database::UPDATE, "SET time_zone = '+10:00'")->execute();
	}

	public function findCustomerBy($params = [])
    {
        $where = '';

        if (Arr::get($params, 'phone') !== null) {
            $where .= sprintf('AND `phone` = %s', preg_replace('/[^0-9]+/i', '', Arr::get($params, 'phone')));
        }

        return DB::query(Database::SELECT, sprintf('SELECT * FROM `customers__data` WHERE 1 %s', $where))
            ->execute()
            ->as_array();
    }

    public function addCustomer($params)
    {
        $res = DB::insert('customers__list', ['manager_id'])
            ->values([$this->user_id])
            ->execute();

        $customerId = Arr::get($res, 0);

        $this->setCustomer($customerId, $params);

        return $customerId;
    }

    public function setCustomer($customerId, $params)
    {
        DB::query(Database::INSERT, 'INSERT INTO `customers__data`
            (`customers_id`, `type`, `name`, `address`, `phone`, `fax`, `email`, `site`, `date`)
            VALUES (:customer_id, :type, :name, :address, :phone, :fax, :email, :site, :date)
            ON DUPLICATE KEY UPDATE `name` = :name, `address` = :address, `fax` = :fax, `site` = :site, `email` = :email')
            ->param(':customer_id', $customerId)
            ->param(':type', Arr::get($params, 'type', 1))
            ->param(':name', Arr::get($params, 'name'))
            ->param(':address', Arr::get($params, 'address'))
            ->param(':phone', Arr::get($params, 'phone'))
            ->param(':fax', Arr::get($params, 'fax'))
            ->param(':site', Arr::get($params, 'site'))
            ->param(':email', Arr::get($params, 'email'))
            ->param(':date', date('Y-m-d', strtotime(Arr::get($params, 'date', '0000-00-00'))))
            ->execute();
    }

    public function findAllCustomer()
    {
        return DB::query(Database::SELECT, "
            SELECT `cd`.*,
            `ct`.`name` as `type_name`,
            `up`.`name` as `manager_name`
            FROM `customers__data` `cd`
            INNER JOIN `customers__list` `cl`
                ON `cl`.`id` = `cd`.`customers_id`
            INNER JOIN `customers__type` `ct`
                ON `ct`.`id` = `cd`.`type`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cl`.`manager_id`
        ")
            ->execute()
            ->as_array();
    }

    public function findCustomer($id)
    {
        $customers = $this->findAllCustomer();

        foreach ($customers as $customer) {
            if ($customer['customers_id'] == $id) {
                return $customer;
            }
        }

        return [];
    }

    /**
     * @param array $params
     */
    public function addAction($params = [])
    {
        DB::query(Database::INSERT, 'INSERT INTO `customers__actions_list`
                (`manager_id`, `customer_id`, `communication_method`, `type`, `text`, `date`)
            VALUES (:manager_id, :customer_id, :communication_method, :type, :text, now())')
            ->param(':manager_id', $this->user_id)
            ->param(':customer_id', Arr::get($params, 'customer_id'))
            ->param(':communication_method', Arr::get($params, 'newActionCommunicationMethod', 1))
            ->param(':type', Arr::get($params, 'newActionType', 1))
            ->param(':text', preg_replace('/[\'\"]+/', '', Arr::get($params, 'newActionText')))
            ->execute()
        ;
    }

    public function findAllActions($start = null, $end = null)
    {
        $startDate = DateTime::createFromFormat('d.m.Y', null != $start ? $start : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $end ? $end : date('d.m.Y'));

        return DB::query(Database::SELECT, "
            (
                SELECT `cal`.`id`,
                `cal`.`manager_id`,
                `cal`.`customer_id`,
                `cal`.`text`,
                `cal`.`date`,
                `cal`.`id` as `action_id`,
                NULL as `order_id`,
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
                WHERE `cal`.`date` BETWEEN :start AND :end
                ORDER BY `cal`.`date` DESC
            )
            UNION
            (
                SELECT `o`.`id`,
                NULL as `manager_id`,
                NULL as `customer_id`,
                'запрос с сайта' as `text`,
                `o`.`date`,
                NULL as `action_id`,
                `o`.`id` as `order_id`,
                'клиент'  as `manager_name`,
                (SELECT `name` FROM `actions__type` WHERE `id` = 1) as `communication_method_name`,
                (SELECT `name` FROM `actions__type` WHERE `id` = 1)  as `type_name`
                FROM `orders` `o`
                WHERE `o`.`date` BETWEEN :start AND :end
                ORDER BY `o`.`date` DESC
            )
            ")
                ->parameters([
                    ':start' => $startDate->format('Y-m-d 00:00:00'),
                    ':end' => $endDate->format('Y-m-d 23:59:59'),
                ])
                ->execute()
                ->as_array()
            ;
    }

    public function findActionBy($params = [])
    {
        $where = '';

        if (Arr::get($params, 'customer_id') !== null) {
            $where .= sprintf('AND `cal`.`customer_id` = %s', preg_replace('/[^0-9]+/i', '', Arr::get($params, 'customer_id')));
        }

        return DB::query(Database::SELECT, sprintf('
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
            WHERE 1 %s
            ORDER BY `cal`.`date` DESC
            ', $where))
                ->execute()
                ->as_array();
    }

    public function addCustomerProduct($params = [])
    {
        DB::query(Database::INSERT, 'INSERT INTO `customers__products`
                (`manager_id`, `customer_id`, `product_code`, `product_name`, `date`)
            VALUES (:manager_id, :customer_id, :product_code, :product_name, now())')
            ->param(':manager_id', $this->user_id)
            ->param(':customer_id', Arr::get($params, 'customer_id'))
            ->param(':product_code', preg_replace('/[\'\"]+/', '', Arr::get($params, 'newProductCode')))
            ->param(':product_name', preg_replace('/[\'\"]+/', '', Arr::get($params, 'newProductName')))
            ->execute();
    }

    public function findProductBy($params = [])
    {
        $where = '';

        if (Arr::get($params, 'customer_id') !== null) {
            $where .= sprintf('AND `cp`.`customer_id` = %s', preg_replace('/[^0-9]+/i', '', Arr::get($params, 'customer_id')));
        }

        return DB::query(Database::SELECT, sprintf('
            SELECT `cp`.*,
            `up`.`name` as `manager_name`
            FROM `customers__products` `cp`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `cp`.`manager_id`
            WHERE 1 %s
            ORDER BY `cp`.`date` DESC
            ', $where))
            ->execute()
            ->as_array();
    }

    public function findAllCommunicationMethods()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `actions__communication_method`")
            ->execute()
            ->as_array();
    }

    public function findAllCustomerTypes()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `customers__type`")
            ->execute()
            ->as_array();
    }

    public function findAllActionTypes()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `actions__type`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleDeliveries()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__delivery`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleDeliveryStatuses()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__delivery_status`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleMethods()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__method`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleReserves()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__reserve`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleStatuses()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__status`")
            ->execute()
            ->as_array();
    }

    public function findAllSaleTypes()
    {
        return DB::query(Database::SELECT, "SELECT * FROM `sales__type`")
            ->execute()
            ->as_array();
    }

    public function addCustomerSale($params = [])
    {
        $res = DB::query(Database::INSERT, 'INSERT INTO `customers__sales_list`
                (`manager_id`, `customer_id`, `method`, `reserve`, `type`, `delivery`, `date`)
            VALUES (:manager_id, :customer_id, :method, :reserve, :type, :delivery, now())')
            ->param(':manager_id', $this->user_id)
            ->param(':customer_id', Arr::get($params, 'customer_id'))
            ->param(':method', Arr::get($params, 'newSaleMethod'))
            ->param(':reserve', Arr::get($params, 'newSaleReserve'))
            ->param(':type', Arr::get($params, 'newSaleType'))
            ->param(':delivery', Arr::get($params, 'newSaleDelivery'))
            ->execute();

        $saleId = Arr::get($res, 0);

        foreach (Arr::get($params, 'newSaleProductCode', []) as $key => $code) {
            if (empty($code)) {
                continue;
            }

            DB::query(Database::INSERT, 'INSERT INTO `customers__sales_products`
                (`customer_id`, `sale_id`, `product_code`, `product_name`, `date`)
            VALUES (:customer_id, :sale_id, :product_code, :product_name, now())')
                ->param(':customer_id', Arr::get($params, 'customer_id'))
                ->param(':sale_id', $saleId)
                ->param(':product_code', $code)
                ->param(':product_name', $params['newSaleProductName'][$key])
                ->execute();
        }
    }

    public function findAllCustomersSales($params = [])
    {
        $where = '';

        if (Arr::get($params, 'customer_id') !== null) {
            $where .= sprintf('AND `csl`.`customer_id` = %s', preg_replace('/[^0-9]+/i', '', Arr::get($params, 'customer_id')));
        }

        return DB::query(Database::SELECT, "
            SELECT `csl`.*,
            `up`.`name` as `manager_name`,
            (
                SELECT GROUP_CONCAT(`csp`.`product_name` SEPARATOR '<br>')
                FROM `customers__sales_products` `csp`
                WHERE `csp`.`sale_id` = `csl`.`id`
            ) as `products`,
            `sp`.`name` as `reserve_name`,
            `sm`.`name` as `method_name`,
            `sd`.`name` as `delivery_name`
            FROM `customers__sales_list` `csl`
            INNER JOIN `users__profile` `up`
                ON `up`.`user_id` = `csl`.`manager_id`
            INNER JOIN `sales__reserve` `sp`
                ON `sp`.`id` = `csl`.`reserve`
            INNER JOIN `sales__method` `sm`
                ON `sm`.`id` = `csl`.`method`
            INNER JOIN `sales__delivery` `sd`
                ON `sd`.`id` = `csl`.`delivery`
            WHERE 1 $where")
            ->execute()
            ->as_array();
    }

    public function addOrder($params = [])
    {
        $params['order_id'] = $this->setOrder();

        $this->setOrderCar($params);
        $this->setOrderClient($params);
        $this->setOrderPart($params);
        $this->setOrderStatus($params);

        $view = View::factory('add_order_mail')
            ->set('params', $params);

        $this->sendMail('shop@dadaauto.ru', 'Запрос на запчасти с быстрой формы', $view, Arr::get($params, 'email'));

        return $params['order_id'];
    }

    public function setOrder()
    {
        $res = DB::query(Database::INSERT, 'INSERT INTO `orders` (`date`) VALUES (now())')
            ->execute();

        return Arr::get($res, 0);
    }

    public function setOrderCar($params = [])
    {
        $res = DB::query(Database::INSERT, 'INSERT INTO `orders__cars` (`order_id`, `brand`, `model`, `vin`) VALUES (:order_id, :brand, :model, :vin)')
            ->param(':order_id', Arr::get($params, 'order_id'))
            ->param(':brand', Arr::get($params, 'brand'))
            ->param(':model', Arr::get($params, 'model'))
            ->param(':vin', Arr::get($params, 'vin'))
            ->execute();
    }

    public function setOrderClient($params = [])
    {
        $phone = Arr::get($params, 'phone');
        $phone = str_replace('+7', '', $phone);
        $phone = substr($phone, 0, 1) == 8 ? substr($phone, 1) : $phone;

        DB::query(Database::INSERT, '
            INSERT INTO `orders__clients`
            (`order_id`, `name`, `address`, `email`, `phone`, `tk`)
            VALUES (:order_id, :name, :address, :email, :phone, :tk)
            ON DUPLICATE KEY UPDATE `name` = :name,
            `address` = :address,
            `email` = :email,
            `phone` = :phone,
            `tk` = :tk
        ')
            ->param(':order_id', Arr::get($params, 'order_id'))
            ->param(':name', Arr::get($params, 'name'))
            ->param(':address', Arr::get($params, 'address'))
            ->param(':email', Arr::get($params, 'email'))
            ->param(':tk', Arr::get($params, 'tk'))
            ->param(':phone', $phone)
            ->execute();
    }

    public function setOrderPart($params = [])
    {
        $res = DB::query(Database::INSERT, 'INSERT INTO `orders__parts` (`order_id`, `part`) VALUES (:order_id, :part)')
            ->param(':order_id', Arr::get($params, 'order_id'))
            ->param(':part', Arr::get($params, 'part'))
            ->execute();
    }

    public function setOrderStatus($params = [])
    {
        DB::query(Database::INSERT, '
            INSERT INTO `orders__statuses`
            (`order_id`, `status`)
            VALUES (:order_id, :status)
            ON DUPLICATE KEY UPDATE `status` = :status
        ')
            ->param(':order_id', Arr::get($params, 'order_id'))
            ->param(':status', Arr::get($params, 'status', 1))
            ->execute();
    }

    public function findOrderStatus($params = [])
    {
        $res = DB::query(Database::SELECT, 'SELECT * FROM `orders__statuses` WHERE `order_id` = :order_id LIMIT 0,1')
            ->param(':order_id', Arr::get($params, 'order_id'))
            ->execute()
            ->as_array();

        return Arr::get($res, 0, []);
    }

    public function sendMail($email, $subject, $view = null, $from = null)
    {
        $to = $email;
        $from = $from == null ? 'shop@dadaauto.ru' : $from;
        $message = $view !== null ? $view : '';
        $bound = "0";
        $header = "From: $from<$from>\r\n";
        $header .= "Subject: $subject\n";
        $header .= "Mime-Version: 1.0\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"$bound\"";
        $body = "\n\n--$bound\n";
        $body .= "Content-type: text/html; charset=\"utf-8\"\n";
        $body .= "Content-Transfer-Encoding: quoted-printable\n\n";
        $body .= "$message";

        if (mail($to, $subject, $body, $header)) {
            return 'ok';
        }
    }

    public function findReviews($params = [])
    {
        $idSql = Arr::get($params, 'id') != null ? ' and `id` = :id' : '';

        return DB::query(Database::SELECT, "SELECT * FROM `reviews` WHERE `status` = :status $idSql")
            ->param(':id', Arr::get($params, 'id'))
            ->param(':status', Arr::get($params, 'status', 1))
            ->execute()
            ->as_array();
    }

    public function addReview($params = [])
    {
        DB::query(Database::INSERT, "insert into `reviews`
            (`author`, `city`, `content`, `date`)
            values (:author, :city, :comment, now())
        ")
            ->param(':author', Arr::get($params, 'author'))
            ->param(':city', Arr::get($params, 'city'))
            ->param(':comment', Arr::get($params, 'comment'))
            ->execute();

        $this->sendMail('shop@dadaauto.ru', 'Новый отзыв на сайте');

        return 'ok';
    }

    public function setReview($params = [])
    {
        DB::query(Database::UPDATE, "update `reviews` set `status` = :status where `id` = :id")
            ->param(':status', Arr::get($params, 'status'))
            ->param(':id', Arr::get($params, 'id'))
            ->execute();
    }

    public function removeReview($params = [])
    {
        DB::query(Database::DELETE, "delete from `reviews` where `id` = :id")
            ->param(':id', Arr::get($params, 'id'))
            ->execute();
    }

    public function getPages()
    {
        return DB::query(Database::SELECT, "
            select `p`.*
            from `pages` `p`
        ")
            ->execute()
            ->as_array();
    }

    public function getPage($params = [])
    {
        $id = Arr::get($params, 'id', 0);
        $res = DB::query(Database::SELECT, "
            select `p`.*
            from `pages` `p`
            where `p`.`id` = :id
        ")
            ->param(':id', $id)
            ->execute()
            ->as_array();

        return !empty($res) ? $res[0] : [];
    }

    public function setPage($params = [])
    {
        $id = Arr::get($params, 'redactpage', 0);
        DB::query(Database::UPDATE, "update `pages` set `content` = :text where `id` = :id")
            ->param(':id', $id)
            ->param(':title', Arr::get($params, 'title'))
            ->param(':text', Arr::get($params, 'text'))
            ->execute();
    }

    /**
     * @param $orderId
     * @param string $part
     * @param int $quantity
     * @param int $price
     *
     * @return int
     * int
     * @throws Kohana_Exception
     */
    public function addOrderProduct($orderId, $part = '', $quantity = 1, $price = 0)
    {
        $res = DB::insert('orders__parts', ['order_id', 'part', 'quantity', 'price'])
            ->values([$orderId, $part, $quantity, $price])
            ->execute()
        ;

        return Arr::get($res, 0);
    }

    /**
     * @param int $orderId
     * @param array $productIdArr
     * @param array $partArr
     * @param array $quantityArr
     * @param array $priceArr
     *
     * @return void
     */
    public function setOrderProduct($orderId, $productIdArr, $partArr = [], $quantityArr = [], $priceArr = [])
    {
        foreach ($productIdArr as $i => $productId) {
            $check = DB::select()->from('orders__parts')->where('id', '=', $productId)->execute()->current();

            if ($check) {
                DB::update('orders__parts')
                    ->set(['part' => Arr::get($partArr, $i, ''), 'quantity' => Arr::get($quantityArr, $i, 1), 'price' => Arr::get($priceArr, $i, 0)])
                    ->where('id', '=', $productId)
                    ->execute();

                continue;
            }

            $this->addOrderProduct($orderId, Arr::get($partArr, $i, ''), Arr::get($quantityArr, $i, 1), Arr::get($priceArr, $i, 0));
        }
    }

    /**
     * @param null|int $id
     * 
     * @return array
     */
    public function findActionsType($id = null)
    {
        $query = DB::select()
            ->from('actions__type')
            ->where('', '', 1)
        ;

        $query = null !== $id ? $query->and_where('id', '=', $id) : $query;
        
        return $query
            ->execute()
            ->as_array()
        ;
    }
}
?>
