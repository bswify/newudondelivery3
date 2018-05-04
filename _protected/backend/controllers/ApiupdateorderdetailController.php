<?php

namespace backend\controllers;

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


class ApiupdateorderdetailController extends Controller
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


    protected function findModel($id)
    {
        if (($model = Orderdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //เพิ่ม

    /**
     * @return array
     */
    public function actionUpdateorderdetail($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $orderdetail = new Orderdetails();

        $orderdetail =  $this->findModel($id);

        $request = Yii::$app->request;
//        $orderdetail->scenario = Orderdetails::SCENARIO_CREATE;
        $orderdetail->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $orderdetail->IDFood = $request->getBodyParam('idfood');
            $orderdetail->IDFoodDetails = $request->getBodyParam('idfooddetail');
            $orderdetail->AmountFood = $request->getBodyParam('amount');
            $orderdetail->IDOrder = $request->getBodyParam('idorder');
            if ($orderdetail->validate()) {
                $orderdetail->save();
                return array('status' => true, 'data' => 'Orders update successfully.');
            } else {
                return array('status' => false, 'data' => $orderdetail->getErrors());
            }

        }
    }






}

