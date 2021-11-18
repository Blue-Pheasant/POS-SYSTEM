<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

use app\models\User;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $id = Application::$app->user->id;
        $user = User::get($id);
        if ($request->getMethod() === 'post') {
            $user->loadData($request->getBody());
            if ($user->validateUpdateProfile() && true) {
                if ($user->updateProfile($user)) {
                    Application::$app->response->redirect('/profile');
                    return 'Show success page';
                }
            }
        }
        return $this->render('profile', [
            'user' => $user
        ]);
    }
}