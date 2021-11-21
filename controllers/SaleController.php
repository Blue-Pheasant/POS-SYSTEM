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
            return $this->render('/admin/sales/sales', [
                'records' => $records
            ]);
        }

        public function details(Request $request)
        {
            if($request->getMethod() === 'get') {
                $id = Application::$app->request->getParam('id');
                $recordModel = Record::get($id);
                $this->setLayout('admin');
                return $this->render('/admin/sales/details_sale', [
                    'recordModel' => $recordModel
                ]);
            }
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
                return $this->render('/admin/sales/record', [
                    'model' => $recordModel
                ]);
            } 
        }
}