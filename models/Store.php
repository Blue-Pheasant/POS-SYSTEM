<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;


class Store extends DBModel
{
    public string $id;
    public string $address;
    public string $status;
    public string $phone;
    public string $open_time;
    public string $image_url;

    public function __construct(
        $id  = '',
        $address= '',
        $phone = '',
        $status = '',
        $open_time = '',
        $image_url = ''
    ) {
        $this->id = $id;
        $this->address = $address;
        $this->phone = $phone;
        $this->status = $status;
        $this->open_time = $open_time;
        $this->image_url = $image_url;
    }

    public function getId () { return $this->id; }
    private function setId ($id) { $this->id = $id; }

    public function getAddress() { return $this->address; }
    private function setAddress($address) { $this->address = $address; }

    public function getHotline() { return $this->phone; }
    private function setHotline($phone) { $this->phone = $phone; }
    
    public function getStatus() { return $this->status; }
    private function setStatus($status) { $this->status = $status; }

    public function getOpentime() { return $this->open_time; }
    private function setOpentime($open_time) { $this->open_time = $open_time; }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM stores WHERE id = "' . $id . '"');
        $item = $req->fetchAll()[0];
        $store = new Store($item['id'], $item['address'], $item['phone'], $item['status'], $item['open_time'], $item['image_url']);
        return $store;
    }   

    public function delete()
    {
        $tablename = $this->tableName();
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt= self::prepare($sql);
        $stmt->execute([$this->id]);
        return true;       
    }
}
