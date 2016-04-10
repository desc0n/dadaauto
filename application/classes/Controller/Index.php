<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller
{
    public function getBaseTemplate()
    {
        return View::factory("template")
            ->set('get', $_GET)
            ->set('post', $_POST);
    }

	public function action_index()
	{
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $viewSuccess = false;

        $orderStatus = $adminModel->findOrderStatus([
            'order_id' => Arr::get($_GET, 'id'),
        ]);

        if (Arr::get($orderStatus, 'status') == 1) {
            $viewSuccess = true;
            $adminModel->setOrderStatus([
                'order_id' => Arr::get($_GET, 'id'),
                'status' => 2
            ]);
        }

		if (isset($_POST['neworder'])) {
          $order_id = $adminModel->addOrder($_POST);
          HTTP::redirect(sprintf('/?result=success&id=%d', $order_id));
		}

        /**
         * @var $template View
         */
        $template = $this->getBaseTemplate();

        $content = View::factory("index")
            ->set('viewSuccess', $viewSuccess);

        $template
            ->set('content', $content)
            ->set('page', 'index');
		$this->response->body($template);
	}

	public function action_about()
	{
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        /**
         * @var $template View
         */
        $template = $this->getBaseTemplate();

        $content = View::factory('about')
            ->set('pageData', $adminModel->getPage(['id' => 1]));

        $template
            ->set('content', $content)
            ->set('page', 'about');
		$this->response->body($template);
	}

	public function action_reviews()
	{
        /**
         * @var $template View
         */
        $template = $this->getBaseTemplate();

        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $content = View::factory('reviews')
            ->set('reviewsData', $adminModel->findReviews());

        $template
            ->set('content', $content)
            ->set('page', 'reviews');
		$this->response->body($template);
	}

	public function action_zakaz()
	{
        $template = $this->getBaseTemplate();

        $template->content = View::factory("zakaz");
		$this->response->body($template);
	}

	public function action_pay()
	{
        /**
         * @var $template View
         */
        $template = $this->getBaseTemplate();

        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $content = View::factory('pay');

        $template
            ->set('content', $content)
            ->set('page', 'pay');
        $this->response->body($template);
	}


    public function action_order()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $viewSuccess = false;

        $orderStatus = $adminModel->findOrderStatus([
            'order_id' => Arr::get($_GET, 'id'),
        ]);

        if (Arr::get($orderStatus, 'status') == 1) {
            $viewSuccess = true;
            $adminModel->setOrderStatus([
                'order_id' => Arr::get($_GET, 'id'),
                'status' => 2
            ]);
        }

        if (isset($_POST['neworder'])) {
            $order_id = $adminModel->addOrder($_POST);
            HTTP::redirect(sprintf('/order?result=success&id=%d', $order_id));
        }

        /**
         * @var $template View
         */
        $template = $this->getBaseTemplate();

        $content = View::factory("order")
            ->set('viewSuccess', $viewSuccess);

        $template
            ->set('content', $content)
            ->set('page', 'order');
        $this->response->body($template);
    }

}