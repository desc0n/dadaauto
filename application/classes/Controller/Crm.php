<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crm extends Controller
{
    public function getBaseTemplate()
    {
        return View::factory('crm/template')
            ->set('get', $_GET)
            ->set('post', $_POST)
        ;
    }

	public function action_index()
	{
        if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('/crm/login');
        }

        if (Auth::instance()->logged_in() && isset($_POST['logout'])) {
            Auth::instance()->logout();
            HTTP::redirect('/');
        }

        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

		$template = $this->getBaseTemplate();

		$template->content = View::factory('crm/index')
            ->set('customerList', $adminModel->findAllCustomer())
            ->set('actionsList', $adminModel->findAllActions())
        ;

		$this->response->body($template);
	}

    public function action_login()
	{
        if (!Auth::instance()->logged_in() && isset($_POST['login'])) {
            Auth::instance()->login($_POST['username'], $_POST['password'],true);
            HTTP::redirect('/crm');
        }

		$template = View::factory('crm/login')
			->set('post', $_POST)
        ;

		$this->response->body($template);
	}

    public function action_customer_list()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        if (Arr::get($_POST, 'name') !== null && Arr::get($_POST, 'phone') !== null) {
            $customerId = $adminModel->addCustomer($_POST);
            HTTP::redirect(sprintf('/customer/info/%d', $customerId));
        }

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/customer_list')
            ->set('customerList', $adminModel->findAllCustomer())
            ->set('customerTypes', $adminModel->findAllCustomerTypes());
        $this->response->body($template);
    }

    public function action_customer_sending()
    {
        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/customer_sending');
        $this->response->body($template);
    }

    public function action_customer_info()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $id = $this->request->param('id');

        if (Arr::get($_POST, 'name') !== null && Arr::get($_POST, 'phone') !== null) {
            $adminModel->setCustomer($id, $_POST);
            HTTP::redirect(sprintf('/customer/info/%d', $id));
        }

        if (Arr::get($_POST, 'newActionText') !== null) {
            $_POST['customer_id'] = $id;
            $adminModel->addAction($_POST);
            HTTP::redirect(sprintf('/customer/info/%d', $id));
        }

        if (Arr::get($_POST, 'newProductCode') !== null) {
            $_POST['customer_id'] = $id;
            $adminModel->addCustomerProduct($_POST);
            HTTP::redirect(sprintf('/customer/info/%d', $id));
        }

        if (!empty(Arr::get($_POST, 'newSaleProductCode', []))) {
            $_POST['customer_id'] = $id;
            $adminModel->addCustomerSale($_POST);
            HTTP::redirect(sprintf('/customer/info/%d', $id));
        }

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/customer_info')
            ->set('customerData', $adminModel->findCustomer($id))
            ->set('customerActions', $adminModel->findActionBy(['customer_id' => $id]))
            ->set('customerProducts', $adminModel->findProductBy(['customer_id' => $id]))
            ->set('customerSales', $adminModel->findAllCustomersSales(['customer_id' => $id]))
            ->set('communicationMethods', $adminModel->findAllCommunicationMethods())
            ->set('saleMethods', $adminModel->findAllSaleMethods())
            ->set('saleTypes', $adminModel->findAllSaleTypes())
            ->set('saleDeliveries', $adminModel->findAllSaleDeliveries())
            ->set('saleReserves', $adminModel->findAllSaleReserves())
            ->set('actionTypes', $adminModel->findAllActionTypes())
        ;
        $this->response->body($template);
    }

    public function action_actions_list()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        if (null !== $this->request->post('type')) {
            $customerId = !empty($this->request->post('customer')) ? $this->request->post('customer') : $adminModel->addCustomer($_POST);

            $adminModel->addAction([
                'customer_id' => $customerId,
                'newActionType' => $this->request->post('type'),
            ]);

            HTTP::redirect($this->request->referrer());
        }
        
        $template = $this->getBaseTemplate();

        $startDate = DateTime::createFromFormat('d.m.Y', null != $this->request->query('start') ? $this->request->query('start') : date('d.m.Y'));
        $endDate = DateTime::createFromFormat('d.m.Y', null != $this->request->query('end') ? $this->request->query('end') : date('d.m.Y'));

        $start = null != $this->request->query('start') ? $startDate->format('d.m.Y') : $startDate->modify('- 1 week')->format('d.m.Y');
        $end = $endDate->format('d.m.Y');

        $template->content = View::factory('crm/actions_list')
            ->set('actionsList', $adminModel->findAllActions($start, $end))
            ->set('get', $_GET)
            ->set('start', $start)
            ->set('end', $end)
            ->set('actions', $adminModel->findActionsType())
        ;

        $this->response->body($template);
    }

    public function action_order()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        /** @var $orderModel Model_Order */
        $orderModel = Model::factory('Order');

        $orderId = $this->request->param('id');

        if ($this->request->post('redactOrderClient') !== null) {
            $adminModel->setOrderClient($_POST);

            HTTP::redirect($this->request->referrer());
        }

        if (Arr::get($_POST, 'newProduct') !== null) {
            $adminModel->addOrderProduct(
                $orderId,
                $this->request->post('newProductName'),
                $this->request->post('newProductQuantity'),
                $this->request->post('newProductPrice')
            );

            HTTP::redirect($this->request->referrer());
        }

        if (Arr::get($_POST, 'productId') !== null) {
            $adminModel->setOrderProduct(
                $orderId,
                $this->request->post('productId'),
                $this->request->post('productName'),
                $this->request->post('productQuantity'),
                $this->request->post('productPrice')
            );

            HTTP::redirect($this->request->referrer());
        }

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/order_info')
            ->set('orderData', $orderModel->getOrderData($orderId))
            ->set('orderProducts', $orderModel->getOrderProductsData($orderId))
            ->set('communicationMethods', $adminModel->findAllCommunicationMethods())
            ->set('saleMethods', $adminModel->findAllSaleMethods())
            ->set('saleTypes', $adminModel->findAllSaleTypes())
            ->set('saleDeliveries', $adminModel->findAllSaleDeliveries())
            ->set('saleReserves', $adminModel->findAllSaleReserves())
            ->set('actionTypes', $adminModel->findAllActionTypes())
        ;

        $this->response->body($template);
    }

    public function action_action()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        /** @var $actionModel Model_Action */
        $actionModel = Model::factory('Action');

        $actionId = $this->request->param('id');

        if ($this->request->post('redactActionClient') !== null) {
            $actionModel->setActionCustomer(
                $this->request->post('redactActionClient'),
                $this->request->post('name'),
                $this->request->post('address'),
                $this->request->post('tk'),
                $this->request->post('phone'),
                $this->request->post('email')
            );

            HTTP::redirect($this->request->referrer());
        }

        if (Arr::get($_POST, 'newProduct') !== null) {
            $actionModel->addActionProduct(
                $actionId,
                $this->request->post('newProductName'),
                $this->request->post('newProductQuantity'),
                $this->request->post('newProductPrice')
            );

            HTTP::redirect($this->request->referrer());
        }

        if (Arr::get($_POST, 'productId') !== null) {
            $actionModel->setActionProduct(
                $actionId,
                $this->request->post('productId'),
                $this->request->post('productName'),
                $this->request->post('productQuantity'),
                $this->request->post('productPrice')
            );

            HTTP::redirect($this->request->referrer());
        }

        $template = $this->getBaseTemplate();

        $template->content = View::factory('crm/action_info')
            ->set('actionData', $actionModel->getActionData($actionId))
            ->set('actionProducts', $actionModel->getActionProductsData($actionId))
            ->set('communicationMethods', $adminModel->findAllCommunicationMethods())
            ->set('saleMethods', $adminModel->findAllSaleMethods())
            ->set('saleTypes', $adminModel->findAllSaleTypes())
            ->set('saleDeliveries', $adminModel->findAllSaleDeliveries())
            ->set('saleReserves', $adminModel->findAllSaleReserves())
            ->set('actionTypes', $adminModel->findAllActionTypes())
        ;

        $this->response->body($template);
    }
}