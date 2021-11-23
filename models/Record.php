<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;
use app\models\Product;

class Record extends DBModel 
{
    public string $id = '';
    public string $user_id = '';
    public string $product_name= '';
    public string $quantity = '';
    public string $total_price = '';
    public string $paymentMethod = '';
    public string $size = '';

    
    
    public function __construct(
        $user_id = '',
        $product_name='',
        $size = '',
        $quantity = '',
        $id = '',
        $total_price = '',
        ) {
            $this->user_id = $user_id;
            $this->product_name= $product_name;
            $this->size = $size;
            $this->quantity = $quantity;
            $this->id = $id;
            $this->total_price = $total_price;
        }
        
    public function getUserName()
    {
        $userModel = User::getUserInfo($this->user_id);
        return $userModel->getDisplayName();
    }
    
    public function getId () { return $this->id; }
    private function setId ($id) { $this->id = $id; }

    public function getSize() { return $this->size; }
    public function setSize($size) { $this->size = $size; }

    public function getTotalPrice() { return $this->total_price; }
    public function setTotalPrice($total_price) { $this->total_price = $total_price; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($quantity) { $this->quantity = $quantity; }

    public function getProductName() { return $this->product_name; }
    public function setProductName ($product_name) { $this->product_name= $product_name; }

    public function getUserId () { return $this->user_id; }
    public function setUserIid ($user_id) { $this->user_id = $user_id; }

    public static function tableName(): string
    {
        return 'records';
    }

    public function attributes(): array
    {
        return ['id', 'user_id', 'product_name', 'size', 'quantity', 'total_price'];
    }

    public function labels(): array
    {
        return [
            'id' => 'Mã giao dịch',
            'user_id' => 'Mã khách hàng',
            'product_name' => 'Tên sản phẩm',
            'size' => 'Kích thước',
            'quantity' => 'Số lượng',
            'total_price' => 'Tổng số tiền'
        ];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }
    
    public function rules(): array
    {
        return [];
    }

    public function save()
    {
        $productModel = Product::getProductDetail($this->product_name);
        $this->product_name = $productModel->getName();
        $this->id = uniqid();
        $this->total_price = (int)$productModel->getPrice() * (int)$this->quantity;
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->id . ' ' . $this->user_id . ' ' . $this->quantity . ' ' . $this->total_price;
    }

    public function delete()
    {
        $tablename = $this->tableName();
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt= self::prepare($sql);
        $stmt->execute([$this->id]);
        return true;
    }

    public static function getAll()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM records');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Record($item['user_id'], $item['product_name'], $item['size'], $item['quantity'],  $item['id'], $item['total_price']);
        }

        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM records WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $record = new Record($item['user_id'], $item['product_name'], $item['size'], $item['quantity'],  $item['id'], $item['total_price']);
        return $record; 
    }
}