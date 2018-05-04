<?php

namespace backend\controllers;

use backend\models\Delivery;
use backend\models\Orderdetails;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApiorderjingController extends Controller
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


    public function actionInsertorderjing()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = new Orders();

        $delivery = new Delivery();
        $request = Yii::$app->request;
//
//        $order->scenario = Orders::SCENARIO_CREATE;
        $order->attributes = \Yii::$app->request->post();



//        $delivery->scenario = Delivery::SCENARIO_CREATE;
        $delivery->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $order->OrderDate = $request->getBodyParam('OrderDate');
            $order->OrderNote = $request->getBodyParam('OrderNote');
            $order->OrderTotalPrice = $request->getBodyParam('OrderTotalPrice');
            $order->OrderStatus = $request->getBodyParam('OrderStatus');
            $order->IDPaymant = $request->getBodyParam('IDPaymant');
            $order->IDCustomer = $request->getBodyParam('IDCustomer');
            $order->Orderpayprice = $request->getBodyParam('Orderpayprice');
            $order->IDCustomerAddress = $request->getBodyParam('IDCustomerAddress');
            $order->IDEmp = $request->getBodyParam('IDEmp');
            $order->save();
            $delivery->IDOrder = $order->IDOrder;
            $delivery->DeliveryPrice = $request->getBodyParam('DeliveryPrice');
            $delivery->IDDeliveryTime = $request->getBodyParam('IDDeliveryTime');
            $delivery->IDDeliveryPro = $request->getBodyParam('IDDeliveryPro');
            $delivery->save();
//            เพิ่มรายการอาหารที่สั่งซื้อOrderDetailยังไงละ
            $data = $request->getBodyParam('menu');
            foreach ($data as $key => $value) {

                $orderdetail = new Orderdetails();
//                $orderdetail->scenario = Orderdetails::SCENARIO_CREATE;
                $orderdetail->attributes = \Yii::$app->request->post();

                $orderdetail->IDOrder = $order->IDOrder;
                $orderdetail->IDFood = $value['IDFood'];
                $orderdetail->IDFoodDetails = $value['IDFoodDetails'];
                $orderdetail->AmountFood = $value['AmountFood'];
                $orderdetail->save();
            }
//            return array('data' => $request->getBodyParam('menu'));
            return array('status' => true, 'data' => 'Orderjing create successfully.');
        }
    }


}

