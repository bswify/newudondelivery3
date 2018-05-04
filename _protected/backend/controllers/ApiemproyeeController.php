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


class ApiemproyeeController extends Controller
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


    /**
     * @return array
     */
    public function actionListemp($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $sql = new Query();
        $sql->select('*')->from('employee')
            ->where('IDEmp = '.$id);
        $command = $sql->createCommand();
        $data = $command->queryAll();


        return array('success' => true, 'data' => $data);



    }

    public function actionListorderbyemp($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $sql = new Query();
        $sql3 = new Query();
        $sql4 = new Query();
        $sql5 = new Query();
        $sql->select('*')->from('orders')
            ->join('INNER JOIN','employee','employee.IDEmp = orders.IDEmp')
            ->join('INNER JOIN','payment','payment.IDPaymant = orders.IDPaymant')
            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomerAddress = orders.IDCustomerAddress')
            ->where('orders.IDEmp = '.$id);
        $command = $sql->createCommand();
        $data = $command->queryAll();
        foreach ($data as $item1) {
            $data1 =
                array(
                    "IDOrder"=> $item1['IDOrder'],
                    "OrderDate"=> $item1['OrderDate'],
                    "OrderNote"=> $item1['OrderNote'],
                    "OrderTotalPrice"=> $item1['OrderTotalPrice'],
                    "OrderStatus"=> $item1['OrderStatus'],
                    "Orderpayprice"=> $item1['Orderpayprice'],
                    "PaymentName"=> $item1['PaymentName'],
                    "EmpFName"=> $item1['EmpFName'],
                    "EmpLname"=> $item1['EmpLname'],
                    "CustomerAddNo"=> $item1['CustomerAddNo'],
                    "CustomerAddRoad"=> $item1['CustomerAddRoad'],
                    "map"=> $item1['map'],
                );

            $sql3->select('*')->from('orderdetails')
                ->where('orderdetails.IDOrder = ' . $item1['IDOrder']);
            $command3 = $sql3->createCommand();
            $data13 = $command3->queryAll();
            foreach ($data13 as $item2) {
                $data2 =
                    array(
                        "IDOrderDetails"=> $item2['IDOrderDetails'],
                        "AmountFood"=> $item2['AmountFood'],
                    );
                $data5[] = $data2;

                $sql4->select('*')->from('food')->where('IDFood = ' . $item2['IDFood']);
                $command4 = $sql4->createCommand();
                $data14 = $command4->queryAll();
                foreach ($data14 as $item3) {
                    $data4 =
                        array(
                            "FoodName"=> $item3['FoodName'],
                            "FoodPrice"=> $item3['FoodPrice'],
                            "FoodImg"=> $item3['FoodImg'],
                            "IDFoodType"=> $item3['IDFoodType'],
//
                    );
                    $data5[] = $data4;
                }
                $sql5->select('*')->from('fooddetails')->where('IDFoodDetails = '.$item2['IDFoodDetails']);
                $command5 = $sql5->createCommand();
                $data15 = $command5->queryAll();
                foreach ($data15 as $item4) {
                    $data55=
                        array(
                            "FoodDetailName"=> $item4['FoodDetailName'],
                            "FoodDetailsPrice"=> $item4['FoodDetailsPrice'],
                        );
                    $data5[] = $data55;
                }

            }

            $data4 = array("order" =>$data1,"food" =>$data5);
            $data5 = null;
//            $data2 = null;
            $data3[] = $data4;
        }


        return array('success' => true, 'data' => $data3);



    }







}

