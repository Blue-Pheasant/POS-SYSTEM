<?php

namespace app\models;

use app\core\CartModel;
use app\core\Controller;
use app\core\Database;
use app\core\DBModel;

class CartDetail extends DBModel
{
    public string $product_id = '';
    public string $cart_id = '';
    public string $quantity = '';
    public string $note = '';
    public string $size = '';

    public function __construct(
        $product_id = '',
        $cart_id = '',
        $quantity = '',
        $note = '',
        $size = ''
    ) {
        $this->product_id = $product_id;
        $this->cart_id = $cart_id;
        $this->quantity = $quantity;
        $this->note = $note;
        $this->size = $size;
    }

    public static function tableName(): string
    {
        return 'cart_detail';
    }

    public function attributes(): array
    {
        return ['product_id', 'cart_id', 'quantity', 'note', 'size'];
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
}