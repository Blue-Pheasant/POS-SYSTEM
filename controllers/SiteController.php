<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Cookie;
use app\middlewares\AuthMiddleware;
use app\models\LoginForm;
use app\models\Store;
use app\models\User;

class SiteController extends Controller
{
    public function __construct()
    {
        // Preprocess login with cookie
        if(!Application::$app->session::exists('user')) {
            $loginForm = new LoginForm();
            if($this->cookie::exists($this->cookie::KEY_COOKIE)) {
                $userId = $this->cookie->get($this->cookie::KEY_COOKIE);
                $loginForm->userId = $userId; 
                $this->registerCookie(new Cookie($this->cookie::KEY_COOKIE, $userId, time() + $this->cookie::TIME_COOKIE, True));
                $loginForm->login('userId');
            }
        }
        $this->registerMiddleware(new AuthMiddleware(['profile', 'cart', 'menu']));
    }

    public function home()
    {
        return $this->render('home', [
            'name' => 'Buy me store'
        ]);
    }

    public function error() {
        $this->setLayout('auth');
        return $this->render('permission');
    }

    public function cart()
    {
        return $this->render('cart');
    }

    public function product()
    {
        return $this->render('product_detail');
    }

    public function menu()
    {
        return $this->render('menu');
    }

    public function collection()
    {
        return $this->render('collection');
    }

    public function about()
    {
        return $this->render('about');
    }

    public function stores()
    {
        $stores = Store::getAll();
        $this->setLayout('main');
        return $this->render('stores', [
            'store' => $stores
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login('email')) {
                $userId = Application::$app->session->get('user');
                $userModel = User::getUserInfo($userId);
                $this->registerCookie(new Cookie($this->cookie::KEY_COOKIE, $userId, time() + $this->cookie::TIME_COOKIE, True));

                if ($userModel->getRole() === 'admin') {
                    return Application::$app->router->intended('/admin');
                } else {
                    return Application::$app->router->intended('/');
                }
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout()
    {
        Application::$app->logout();
        Application::$app->response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function notice()
    {
        $this->setLayout('auth');
        return $this->render('payment_success');
    }
}