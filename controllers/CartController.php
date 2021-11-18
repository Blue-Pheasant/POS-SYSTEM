<?php
/*
    controllers/category/index.php
*/
namespace app\controllers;
namespace app\models;
use app\core\Controller;
use app\core\Input;
use app\core\Response;
use app\core\Session;
use app\models\Cart;
use app\core\Application;
use app\core\CartSession;
use app\core\Database;

class CartController extends Controller {
        public function __construct() {}

        public function index() 
        {
            $cart = Application::$app->session->get('cart');
            $model = $cart->products;
            $this->setLayout('main');
            return $this->render('cart', [
                'model' => $model
            ]);   
        }

        public function remove()
        {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $cart = Application::$app->session->get('cart');
            $records = $cart->records;
            for($i = 0; $i < count($records); $i++) {
                if($records[$i]->getProductId() === $productModel->getId()) {
                    unset($records[$i]);
                    if(count($records) > 0) {
                        Application::$app->response->redirect('cart');
                    } else {
                        Application::$app->response->redirect('menu');
                    } 
                }
            }
        }

        public function empty()
        {
            Application::$app->session->remove('cart');
        }

        public function checkout()
        {
            $cart = Application::$app->session->get('cart');
            $model = $cart->records;
            $this->setLayout('main');
            return $this->render('checkout', [
                'model' => $model
            ]);
        }

        public function ConfirmCheckout()
        {
            $cart = Application::$app->session->get('cart');
            if ($cart) {
                $cart->records;
                foreach ($cart->records as $record) {
                    if(!Application::$app->isGuest()) {
                        Application::$app->response->redirect('login');
                    }
                    foreach($cart->records as $record) {
                        $record->save();
                    }
                }
                $this->empty();
                Application::$app->response->redirect('menu'); 
            } else {
                Application::$app->response->redirect('menu');
            }
        }
    }


