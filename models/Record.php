<?php

namespace app\models;

use app\core\Database;
use app\core\RecordModel;
use app\models\Product;
use PDO;
use PDOException;

class Record extends RecordModel 
{
    private $id;
    public function getId () { return $this->id; }
    private function setId ($id) { $this->id = $id; }
    
    private $userID;
    public function getUserID () { return $this->userID; }
    private function setUserID ($userID) { $this->userID = $userID; }

    private $productID;
    public function getProductID() { return $this->productID; }
    private function setProductID ($productID) { $this->productID = $productID; }

    private $quantity;
    public function getQuantity() { return $this->quantity; }
    private function setQuantity($quantity) { $this->quantity = $quantity; }

    private $totalPrice;
    public function getTotalPrice() { return $this->totalPrice; }
    private function setTotalPrice($totalPrice) { $this->totalPrice = $totalPrice; }
    
    private $paymentMethod;
    public function getPaymentMethod() { return $this->paymentMethod; }
    private function setPaymentMethod($paymentMethod) { $this->paymentMethod = $paymentMethod; }

    public function getUserName()
    {
        $userModel = User::get($this->userID);
        return $userModel->getDisplayName();
    }

    public function __construct(
        $userID,
        $productID,
        $quantity
    ) {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->quantity = $quantity;
    }
    
    public static function tableName(): string
    {
        return 'records';
    }

    public function attributes(): array
    {
        return ['id', 'user_id', 'product_id', 'quantity', 'total_price'];
    }

    public function labels(): array
    {
        return [
            'id' => 'Mã giao dịch',
            'user_id' => 'Mã khách hàng',
            'quantity' => 'Số lượng',
            'total_price' => 'Tổng số tiền'
        ];
    }

    public function rules(): array
    {
        return [
            
        ];
    }

    public function save()
    {
        $productModel = Product::getProductDetail($this->productID);
        $this->id = uniqid();
        $this->totalPrice = $productModel->getPrice() * $this->quantity;
        return parent::save();
    }

    public function getDisplayInfo(): string
    {
        return $this->id . ' ' . $this->userID . ' ' . $this->quantity . ' ' . $this->totalPrice;
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
            $list[] = new Record($item['id'], $item['user_id'], $item['quantity'], $item['total_price']);
        }

        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM records WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $record = new Record($item['id'], $item['user_id'], $item['quantity'], $item['total_price']);
        return $record; 
    }
}