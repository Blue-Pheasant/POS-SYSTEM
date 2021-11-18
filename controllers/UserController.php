<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Input;
use app\core\Application;
use app\core\Request;
use app\core\Session;
use app\models\User;

class UserController extends Controller{
    public function __construct() {}

    public function index() 
    {
        $users = User::getAll();
        $this->setLayout('admin');
        return $this->render('users', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $userModel = new User;
        if($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());
            $userModel->save();
            Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $this->setLayout('admin');
            return $this->render('createUser',  [
                'userModel' => $userModel
            ]);
        }
    }

    public function delete(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = user::get($id);
            $userModel->delete();
            return Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = user::get($id);
            $this->setLayout('admin');
            return $this->render('deleteUser', [
                'userModel' => $userModel
            ]);
        }        
    }

    public function update(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::get($id);
            $userModel->loadData($request->getBody());
            $userModel->update($userModel);
            Application::$app->response->redirect('/admin/users');
        } else if ($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::get($id);
            $this->setLayout('admin');
            return $this->render('editUser', [
                'userModel' => $userModel
            ]);
        }        
    }

    public function details(Request $request)
    {
        if($request->getMethod() === 'get')
        $id = Application::$app->request->getParam('id');
        $userModel = User::get($id);
        $this->setLayout('admin');
        return $this->render('detailsUser', [
            'userModel' => $userModel
        ]);         
    }
}