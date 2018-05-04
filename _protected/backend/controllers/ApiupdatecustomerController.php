<?php

namespace backend\controllers;

use backend\models\Customer;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApiupdatecustomerController extends Controller
{

    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    //เพิ่ม

    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * @return array
     */
    public function actionUpdatecustomer($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

//        $cus1 = new Customer();

        $cus = $this->findModel($id);
        $request = Yii::$app->request;
//        $cus->scenario = Customer::SCENARIO_UPDATE;
        $cus->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $param = $request->getBodyParam('img');
            $filename = $request->getBodyParam('imgname').date("Y-m-d_H-i-s") . '.png';

            $cus->CustomerFName = $request->getBodyParam('fname');
            $cus->CustomerLName = $request->getBodyParam('lname');
            $cus->CustomerImage = $filename ;
            $cus->CustomerPoint = $request->getBodyParam('point');
            $cus->CustomerPhone = $request->getBodyParam('phone');
            $cus->CUsername = $request->getBodyParam('username');
            $cus->CPasswords = $request->getBodyParam('password');
            $cus->LoginType = $request->getBodyParam('type');
            if ($cus->validate()) {
                file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                $cus->save();
                return array('status' => true, 'data' => 'Customer update successfully.');
            } else {
                return array('status' => false, 'data' => $cus->getErrors());
            }

        }
    }






}

