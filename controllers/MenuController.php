<?php

namespace app\controllers;

use app\controllers\SiteController;
use app\models\Category;
use app\models\Product;
use app\core\Application;
use app\core\Request;
use app\models\Cart;
use app\models\CartItem;

class MenuController extends SiteController
{
    public function menu()
    {
        $category_id = Application::$app->request->getParam('category_id');
        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);
        if ($category_id == '') {
            $products = Product::getAllProducts();
        } else {
            $products = Product::getProductsByCategory($category_id);
        }
        
        foreach($items as $item) {
            if($item->size === 'medium') {
                $item->price += 3000;
            } else if($item->getSize() === 'large') {
                $item->price += 6000;
            }
        }

        $categories = Category::getAllCategories();
        return $this->render('menu', [
            'products' => $products, 
            'categories' => $categories,
            'items' => $items 
        ]);
    }

    public function search(Request $request)
    {
        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);
        foreach($items as $item) {
            if($item->size === 'medium') {
                $item->price += 3000;
            } else if($item->getSize() === 'large') {
                $item->price += 6000;
            }
        }
        if($request->getMethod() === 'post') {
            $body = Application::$app->request->getBody();
            $keyword = $body['keyword'];
            $products = Product::getProductsByKeyword($keyword);
            $categories = Category::getAllCategories();
            return $this->render('menu', [
                'products' => $products, 
                'categories' => $categories,
                'items' => $items 
            ]);
        }
    }
}