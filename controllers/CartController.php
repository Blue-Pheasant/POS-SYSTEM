<?php
/*
    controllers/category/index.php
*/

namespace app\controllers;

use app\core\Controller;
use app\core\Input;
use app\core\Response;
use app\core\Session;
use app\core\Application;
use app\core\CartSession;
use app\core\Database;
use app\models\Cart;
use app\models\CartDetail;
use app\models\CartItem;

class CartController extends Controller
{
    public function cart()
    {
        $user = Application::$app->user;
        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);

        return $this->render('cart', [
            'items' => $items,
            'user' => $user
        ]);
    }

    public function placeOrder()
    {

        $body = Application::$app->request->getBody();
        echo '<pr>';
        echo var_dump($body);
        echo '</pr>';
        $user = Application::$app->user;
        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);

        return $this->render('cart', [
            'items' => $items,
            'user' => $user
        ]);
    }
}