<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApiorderController extends Controller
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
    public function actionInsertorder()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = new Orders();
        $request = Yii::$app->request;
        $order->scenario = Orders::SCENARIO_CREATE;
        $order->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $order->OrderDate = $request->getBodyParam('date');
            $order->OrderNote = $request->getBodyParam('note');
            $order->OrderTotalPrice = $request->getBodyParam('totalprice');
            $order->OrderStatus = $request->getBodyParam('status');
            $order->IDPaymant = $request->getBodyParam('idpaymant');
            $order->IDCustomer = $request->getBodyParam('idcustomer');
            $order->Orderpayprice = $request->getBodyParam('orderpayprice');

//            $order->IDEmp = $request->getBodyParam('idcustomer');
            $order->IDCustomerAddress = $request->getBodyParam('idcustomeradd');
            if ($order->validate()) {
                $order->save();
                return array('status' => true, 'data' => 'Orders create successfully.');
            } else {
                return array('status' => false, 'data1' => $order->getErrors());
            }

        }
    }
    //ลบ

    /**
     * @return array
     */
    public function actionDeleteorder($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $this->findModel($id)->delete();
        return array('status' => true, 'data' => 'Orders delete successfully.');
    }
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //แสดง
/**
* @param $id
* @return array
* @throws \yii\db\Exception
*/
    public function actionListorder()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $id =  Yii::$app->request->get('id');
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('orders')
            ->join('INNER JOIN','orderdetails','orderdetails.IDOrder = orders.IDOrder')
            ->join('INNER JOIN','delivery','delivery.IDOrder = orders.IDOrder')
            ->join('INNER JOIN','payment','payment.IDPaymant = orders.IDPaymant')
            ->join('INNER JOIN','customer','customer.IDCustomer = orders.IDCustomer')
            ->join('INNER JOIN','employee','employee.IDEmp = orders.IDEmp')
            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomerAddress = orders.IDCustomerAddress')
//            ->where('orders.IDOrder = '.$id)

        ;
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDOrder" => $item1['IDOrder'],
                    "OrderDate" => $item1['OrderDate'],
//                    "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                    "OrderNote" => $item1['OrderNote'],
                    "OrderTotalPrice" => $item1['OrderTotalPrice'],
                    "OrderStatus" => $item1['OrderStatus'],
                    "IDOrderDetails" => $item1['IDOrderDetails'],
                    "IDDelivery" => $item1['IDDelivery'],
                    "IDPaymant" => $item1['IDPaymant'],
                    "IDCustomer" => $item1['IDCustomer'],
                    "IDEmp" => $item1['IDEmp'],
                    "IDCustomerAddress" => $item1['IDCustomerAddress'],
                    "Orderpayprice" => $item1['Orderpayprice'],

                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }

}

