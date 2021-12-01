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
use app\core\Request;
use app\models\Cart;
use app\models\CartDetail;
use app\models\CartItem;
use app\models\Order;
use app\models\OrderItem;
use app\models\OrderDetail;

class CartController extends Controller
{

    public function deleteItem($cart_id, $id)
    {
        CartItem::deleteItem($id, $cart_id);
    }

    public function cart()
    {
        $cart_id = Application::$app->cart->id;
        $deletedItem = false;
        $updatedItem = false;

        if (isset($_GET['action'])) {
            $id = Application::$app->request->getParam('id');
            if ($_GET['action'] == 'delete') {
                $this->deleteItem($cart_id, $id);
                $deletedItem = true;
            }
        }

        $user = Application::$app->user;

        $items = CartItem::getCartItem($cart_id);

        return $this->render('cart', [
            'items' => $items,
            'user' => $user,
            'deletedItem' => $deletedItem,
            'updatedItem' => $updatedItem
        ]);
    }

    public function update()
    {
        $cart_id = Application::$app->cart->id;
        $user = Application::$app->user;

        $id = Application::$app->request->getParam('order_detail_id');
        $newNote = Application::$app->request->getBody()['note'];
        $newQuantity = Application::$app->request->getBody()['quantity'];


        CartItem::update($id, $newNote, $newQuantity);

        $items = CartItem::getCartItem($cart_id);

        return $this->render('cart', [
            'items' => $items,
            'user' => $user,
        ]);
    }

    public function placeOrder()
    {
        $placedOrder = false;
        $updatedItem = false;

        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);

        $user_id = Application::$app->user->id;
        $delivery_name = Application::$app->request->getBody()['name'];
        $delivery_phone = Application::$app->request->getBody()['phone_number'];
        $delivery_address = Application::$app->request->getBody()['address'];
        $payment_method = Application::$app->request->getBody()['payment_method'];
        $order = new Order(uniqid(), $user_id, $payment_method, 'processing', $delivery_name, $delivery_phone, $delivery_address);
        $order->save();

        foreach ($items as $item) {
            $orderDetail = new OrderDetail(
                uniqid(),
                $item->product_id,
                $order->id,
                $item->quantity,
                $item->note,
                $item->size
            );
            $orderDetail->save();
        }

        foreach ($items as $item) {
            $this->deleteItem($cart_id, $item->order_detail_id);
        }

        Cart::checkoutCart($cart_id);

        $user = Application::$app->user;
        $items = CartItem::getCartItem($cart_id);

        $placedOrder = true;

        return $this->render('cart', [
            'items' => $items,
            'user' => $user,
            'placedOrder' => $placedOrder
        ]);
    }

    // public function remove(Request $request)
    // {
    //     $itemId = Application::$app->request->getParam('id');
    //     $cart_id = Application::$app->cart->id;
    //     if ($request->getMethod() === 'get') {
    //         CartItem::deleteItem($itemId);
    //     }
    //     Application::$app->response->redirect('/cart');
    // }
}