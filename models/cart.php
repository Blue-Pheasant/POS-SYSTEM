<?php

namespace app\models;

use app\core\Application;
use app\core\CartModel;
use app\models\Product;

class Cart extends CartModel 
{
    public array $records;
    public int $status;
    
    public function __construct(
        $status = 0,
        $records = []
    ) {
        $this->status = $status;
        $this->list = $records;
    }
    
    public static function tableName(): string
    {
        return 'carts';
    }

    public function attributes(): array
    {
        return ['list'];
    }

    public function labels(): array
    {
        return [
            'records' => 'Records',
            'status' => 'Status',
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
        return $this->records . ' ' . $this->status;
    }

    public function insert(Product $product)
    {
        
        $recordModel = new Record(Application::$app->session->get('user'), $product->getId(), 1);
        $exists = Application::$app->session->exists('cart');
        if(!$exists) {
            Application::$app->session->setFlash('cart', 'Initiate cart');
            $userID = Application::$app->session->get('user');
            $cart = Application::$app->session->get('cart');
            Application::$app->session->set('cart', $userID);
            array_push($cart->records, $recordModel);
            return;
        } else {
            $cart = Application::$app->session->get('cart');
            $records = $cart->records;
            foreach($records as $record) {
                if($record->getProductID() == $product->getId()) {
                    $record->setQuantity($record->getQuantity() + 1);
                    return;
                }
            }
            array_push($cart->records, $recordModel);
        }
            
    }
}