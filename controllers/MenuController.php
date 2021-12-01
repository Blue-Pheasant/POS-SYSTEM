<?php

namespace app\controllers;

use app\controllers\SiteController;
use app\models\Category;
use app\models\Product;
use app\core\Application;
use app\models\CartItem;

class MenuController extends SiteController
{
    public function menu()
    {
        $category_id = Application::$app->request->getParam('category_id');
        $cart_id = Application::$app->cart->id;
        if ($category_id == '') {
            $products = Product::getAllProducts();
        } else {
            $products = Product::getProductsByCategory($category_id);
        }
        $deletedItem = false;
        $updatedItem = false;
        $items = CartItem::getCartItem($cart_id);
        $categories = Category::getAllCategories();

        return $this->render('menu', [
            'products' => $products, 
            'categories' => $categories, 
            'items' => $items,
            'deletedItem' => $deletedItem,
            'updatedItem' => $updatedItem
        ]);
    }

    public function search()
    {
        $body = Application::$app->request->getBody();
        $keyword = $body['keyword'];
        $products = Product::getProductsByKeyword($keyword);
        $categories = Category::getAllCategories();
        $data = array('products' => $products, 'categories' => $categories);
        return $this->render('menu', $data);
    }
}