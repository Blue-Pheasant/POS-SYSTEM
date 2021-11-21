<?php

namespace app\models;

use app\core\CartModel;
use app\core\Database;
use app\core\DBModel;

class CartItem extends DBModel
{
    public string $product_id = '';
    public string $cart_id = '';
    public int $quantity = 0;
    public string $note = '';
    public string $category_id = '';
    public string $name = '';
    public float $price = 0;
    public string $description = '';
    public string $image_url = '';

    public function __construct(
        $product_id,
        $cart_id,
        $quantity,
        $note,
        $category_id = '',
        $name = '',
        $price = 0,
        $description = '',
        $image_url = '',
        $size = ''
    ) {
        $this->product_id = $product_id;
        $this->cart_id = $cart_id;
        $this->quantity = $quantity;
        $this->note = $note;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->size = $size;
    }

    public static function tableName(): string
    {
        return 'cart';
    }

    public function attributes(): array
    {
        return ['product_id', 'cart_id', 'quantity', 'note', 'category_id', 'name', 'price', 'description', 'image_url', 'size'];
    }

    public function labels(): array
    {
        return
            [
                'product_id' => 'Product ID',
                'cart_id' => 'Cart ID',
                'quantity' => 'Quantity',
                'note' => 'Note',
                'name' => 'Product name',
                'price' => 'Price',
                'description' => 'Description',
                'size' => 'Size',
            ];
    }

    public function rules(): array
    {
        return [];
    }

    public function save()
    {
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->list . ' ' . $this->status;
    }

    public static function getCartItem($cart_id)
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query(
            "SELECT *
            FROM cart_detail JOIN products ON cart_detail.product_id = products.id 
            WHERE cart_detail.cart_id = '" . $cart_id . "';"
        );

        foreach ($req->fetchAll() as $item) {
            $list[] = new
                CartItem(
                    $item['product_id'],
                    $item['cart_id'],
                    $item['quantity'],
                    $item['note'],
                    $item['category_id'],
                    $item['name'],
                    $item['price'],
                    $item['description'],
                    $item['image_url'],
                    $item['size']
                );
        }
        return $list;
    }

    public function destroy()
    {
        
    }
}