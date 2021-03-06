<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\Customeraddress;
use backend\models\Delivery;
use backend\models\Deliverypro;
use backend\models\Orderdetails;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApiorderrController extends Controller
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
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel2($id)
    {
        if (($model2 = Deliverypro::findOne($id)) !== null) {
            return $model2;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionInsertorderr()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;




        $request = Yii::$app->request;



        $order = new Orders();
        $order->attributes = \Yii::$app->request->post();


        $delivery = new Delivery();
        $delivery->attributes = \Yii::$app->request->post();
        $CusAddress = new Customeraddress();
        $id = Yii::$app->request->getBodyParam('mCustomerId');
        $cus = $this->findModel($id);
        $cus->attributes = \Yii::$app->request->post();


        $sql2 = new Query();

        if (Yii::$app->request->post()) {

            $order->OrderDate = $request->getBodyParam('mOrderDate');
            $order->OrderNote = null;
            $order->OrderTotalPrice = $request->getBodyParam('mTotalPrice');
            $order->OrderStatus = ''.'รอการยืนยัน';
            $order->IDPaymant = $request->getBodyParam('mPaymentType');
            $order->IDCustomer = $request->getBodyParam('mCustomerId');
            $order->Orderpayprice = $request->getBodyParam('mPay')."";

            $idcusaddress = $request->getBodyParam('address');
//
            if($idcusaddress['mAddressId'] == 0 ){

                $CusAddress->attributes = \Yii::$app->request->post();
                $CusAddress->map = $idcusaddress['latitude'].','.$idcusaddress['longitude'];
                $CusAddress->IDCustomer = $request->getBodyParam('mCustomerId');
                $CusAddress->CustomerAddNo = null;
                $CusAddress->CustomerAddRoad = null ;
                $CusAddress->save();
                $order->IDCustomerAddress = $CusAddress->IDCustomerAddress;
            }else{
                $order->IDCustomerAddress = $idcusaddress['mAddressId'];
            }

//            $order->IDCustomerAddress = $idcusaddress['mAddressId'];
            $order->IDEmp= null;
            $order->save();

            $delivery->IDOrder = $order->IDOrder;
            $delivery->DeliveryPrice = $request->getBodyParam('mDeliveryFee');
            $delivery->IDDeliveryTime = $request->getBodyParam('mDeliveryTimeId');
            $depro = $request->getBodyParam('mPromotionId');
            if($depro !== null){
                $delivery->IDDeliveryPro = $request->getBodyParam('mPromotionId');
                $depo = $this->findModel2($request->getBodyParam('mPromotionId'));
                $depo->attributes = \Yii::$app->request->post();
                $cus->CustomerPoint = $cus->CustomerPoint - $depo->DeliveryProPiont ;

            }else{
                $delivery->IDDeliveryPro = null;
            }

//            $delivery->IDDeliveryPro = null;
            $delivery->save();

            $data = $request->getBodyParam('mItems');


            foreach ($data as $key => $value) {
                $orderDetail = new Orderdetails();
                $orderDetail->attributes = \Yii::$app->request->post();

                $orderDetail->IDOrder = $order->IDOrder;
                $orderDetail->IDFood = $value['mIDFood'];

                $tt = $value['addOn'];
                if($tt['selectedIndex'] == 1){
                    $orderDetail->IDFoodDetails = $tt['IDFoodDetails'];
                }else{
                    $orderDetail->IDFoodDetails = null;
                }

                $orderDetail->AmountFood = $value['amount'];
                $orderDetail->reason = $value['reason'];
                $orderDetail->save();
            }

            if ($order->validate()&& $orderDetail->validate()&& $delivery->validate()) {
//                $order->save();
                $cus->save();
                return array('status' => true, 'data' => 'Orders create successfully.');
            } else {
                return array('status' => false, 'data' => $order->getErrors(),'date2'=>$delivery->getErrors(),'data4'=>$orderDetail->getErrors());
            }

//            return array('status' => true, 'data' => 'Order create successfully.');

        }
    }



}

