<?php
/*
    controllers/product.php
*/

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\core\Input;
use app\core\Application;
use app\core\Request;
use app\core\Session;
use app\core\CartSession;
use app\models\Cart;
use app\models\Record;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $products = Product::getAllProducts();
        $this->setLayout('main');
        return $this->render('product', [
            'model' => $products
        ]);
    }

    public function create(Request $request)
    {
        $productModel = new Product();
        if ($request->getMethod() === 'post') {
            $productModel->loadData($request->getBody());
            $productModel->save();
            Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $products = Product::getAllProducts();
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $products
            ]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $productModel = Product::getProductDetail($id);
            $productModel->delete();
            return Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }


    public function update(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $productModel = Product::getProductDetail($id);
            $productModel->loadData($request->getBody());
            $productModel->update($productModel);
            Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    public function select(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $record = new Record(Application::$app->session->get('user'), $productModel->getId(), 1);
            $cart = null;
            if (Application::$app->session->exists('cart')) {
                $cart = Application::$app->session->get('cart');
                array_push($cart->records, $record);
            } else {
                $cart = new Cart();
                array_push($cart->records, $record);
            }
            Application::$app->session->set('cart', $cart);
        } else if ($request->getMethod() === 'get') {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    public function view(Request $request)
    {
        if ($request->getMethod() === 'get') {
            $id = $_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    // Của Quân, đã chạy được, xin đừng xóa
    public function product()
    {
        $id = Application::$app->request->getParam('id');
        $product = Product::getProductDetail($id);
        $data = array('product' => $product);
        return $this->render('product_detail', $data);
    }
}
