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
use app\models\CartItem;
use app\models\Record;

class OrdersController extends Controller
{
    public function orders()
    {
        return $this->render('orders');
    }

    public function checkoutConfirm()
    {
        $userId = Application::$app->user->id;
        $cart_id = Application::$app->cart->id;
        $cartItem = CartItem::getCartItem($cart_id);
        foreach($cartItem as $item) {
            $order = new Record(
                $userId,
                $item->product_id,
                $item->size,
                $item->quantity,
            );
            $order->save();
        }
        Application::$app->session->setFlash('success', 'Cảm ơn quý khách đã mua hàng');
        Application::$app->response->redirect('/');
        return 'Show success page';
    }
}