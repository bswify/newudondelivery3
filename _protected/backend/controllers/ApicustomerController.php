<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\Favoritemenu;
use backend\models\Orderdetails;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApicustomerController extends Controller
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

    /**
     * @return array
     */
    public function actionInsertcustomer2()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $cus = new Customer();
        $request = Yii::$app->request;
        $cus->scenario = Customer::SCENARIO_CREATE;
        $cus->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $param = $request->getBodyParam('img');
            $filename = $request->getBodyParam('fname').date("Y-m-d_H-i-s") . '.png';

            $cus->CustomerFName = $request->getBodyParam('fname');
            $cus->CustomerLName = $request->getBodyParam('lname');
            $cus->CustomerImage = $filename ;
            $cus->CustomerPoint = 0;
            $cus->CustomerPhone = $request->getBodyParam('phone');
            $cus->CUsername = $request->getBodyParam('username');
            $cus->CPasswords = $request->getBodyParam('password');
            $cus->LoginType =   "ลูกค้า";
            $cus->iduserface = $request->getBodyParam('iduserface');
            $cus->toketface = $request->getBodyParam('toketface');
            if ($cus->validate()) {
                file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                $cus->save();
                return array('status' => true, 'data' => 'Customer create successfully.');
            } else {
                return array('status' => false, 'data' => $cus->getErrors());
            }

        }
    }


    public function actionInsertcustomer()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $cus = new Customer();
        $request = Yii::$app->request;
        $cus->scenario = Customer::SCENARIO_CREATE;
        $cus->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
//            $param = $request->getBodyParam('img');
//            $filename = null;

            $cus->CustomerFName = null;
            $cus->CustomerLName = null;
            $cus->CustomerImage = null;
            $cus->CustomerPoint = 0;
            $cus->CustomerPhone = $request->getBodyParam('phone');
            $cus->CUsername = $request->getBodyParam('username');
            $cus->CPasswords = $request->getBodyParam('password');
            $cus->LoginType = "ลูกค้า";
            if ($cus->validate()) {
//                file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                $cus->save();
                return array('status' => true, 'data' => 'Customer create successfully.');
            } else {
                return array('status' => false, 'data' => $cus->getErrors());
            }

        }
    }






}

