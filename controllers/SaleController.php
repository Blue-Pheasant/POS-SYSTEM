<?php
/*
    controllers/SaleController.php
*/

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Record;

class SaleController extends Controller {
        public function __construct() {}

        public function index()
        {
            $records = Record::getAll();
            $this->setLayout('admin');
            return $this->render('records', [
                'records' => $records
            ]);
        }

        public function delete(Request $request) {
            if($request->getMethod() === 'post') {
                $id = Application::$app->request->getParam('id');
                $recordModel = Record::get($id);
                $recordModel->delete();
                Application::$app->response->redirect('record');
            } else if ($request->getMethod() === 'get') {
                $id = Application::$app->request->getParam('id');
                $recordModel = Record::get($id);
                $this->setLayout('main');
                return $this->render('record', [
                    'model' => $recordModel
                ]);
            } 
        }
}