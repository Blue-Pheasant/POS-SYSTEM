<?php

use app\core\Application;

class m0001_addAdminAccount
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "INSERT INTO thecoffeehouse.customers (id,firstname,lastname,email,phone_number,password,image_url,address,ward_id,district_id,province_id,created_at,updated_at,role) VALUES ('6191e42fe4e3f','admin','admin','admin@gmail.com','0123456789','" . password_hash('admin123', PASSWORD_DEFAULT) . "',NULL,'admin',NULL,NULL,NULL,'2021-11-15 11:38:07','2021-11-15 11:38:07','admin');";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE users;";
        $db->pdo->exec($sql);
    }
}