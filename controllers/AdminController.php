<?php

namespace app\controllers;

use app\core\Controller;


class AdminController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $this->setLayout('admin');
        return $this->render('dashboard');
    }
}