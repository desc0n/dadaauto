<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
    public function action_check_user_phone()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $check = count($adminModel->findCustomerBy($_POST));
        $this->response->body($check === 0 ? 0 : 1);
    }

    public function action_find_product_by_item()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $result = json_encode($adminModel->findProductByItem(Arr::get($_POST, 'item')));
        $this->response->body($result);
    }

    public function action_find_product_by_name()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $result = json_encode($adminModel->findProductByName(Arr::get($_POST, 'name')));
        $this->response->body($result);
    }

    public function action_ask_requisites()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $result = json_encode($adminModel->sendMail('shop@dadaauto.ru', 'Запрос на реквизиты', sprintf('Запрос реквизитов для почты %s', Arr::get($_POST, 'email'))));
        $this->response->body($result);
    }

    public function action_add_review()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        $this->response->body($adminModel->addReview($_POST));
    }

    public function action_find_customer_by_phone()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        $result = json_encode($adminModel->findCustomerBy($_POST));
        $this->response->body($result);
    }

    public function action_find_brand_by_subbrand()
    {
        /** @var Model_Product $productModel */
        $productModel = Model::factory('Product');

        $result = json_encode($productModel->findBrands(null, null, strtoupper($this->request->post('brand'))));
        $this->response->body($result);
    }

    public function action_find_productname_by_subproductname()
    {
        /** @var Model_Product $productModel */
        $productModel = Model::factory('Product');

        $result = json_encode($productModel->findProduct(null, null, null, null, $this->request->post('name')));
        $this->response->body($result);
    }

    public function action_set_markup()
    {
        /** @var Model_Product $productModel */
        $productModel = Model::factory('Product');

        $result = json_encode(
            $productModel->setMarkup(
                $this->request->post('distributor_id'),
                $this->request->post('type'),
                $this->request->post('markup')
            )
        );
        $this->response->body($result);
    }
}