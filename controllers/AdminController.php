<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;


class AdminController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $this->setLayout('admin');
        return $this->render('/admin/dashboard');
    }

    public function profile(Request $request)
    {
        $adminId = Application::$app->user->id;
        $adminModel = User::getUserInfo($adminId);
        if($request->getMethod() === 'post') {
            $adminModel->loadData($request->getBody());
            if ($adminModel->validateUpdateProfile() && true) {
                if ($adminModel->updateProfile($adminModel)) {
                    Application::$app->response->redirect('/admin/profile');
                    return 'Show success page';
                }
            }
        }

        $this->setLayout('admin');
        return $this->render('/admin/profile', [
            'user' => $adminModel
        ]);
    }
}