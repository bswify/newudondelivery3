<?php

namespace backend\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApiorderhistoryController extends Controller
{
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


    public function actionListorderhistory($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');
        $sql2 = new Query;

        $data3 = array();
        $data5 = array();
        $sql2->select('*')->from('orders')
//            ->join('INNER JOIN','employee','employee.IDEmp = orders.IDEmp')
            ->join('INNER JOIN','payment','payment.IDPaymant = orders.IDPaymant')
            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomerAddress = orders.IDCustomerAddress')
            ->where('orders.IDCustomer =' . $id );
//        ->andWhere('OrderStatus = \'จัดส่งแล้ว\'');
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data1 =
                array(
                    "IDOrder"=> $item1['IDOrder'],
                    "OrderDate"=> $item1['OrderDate'],
                    "OrderNote"=> $item1['OrderNote'],
                    "OrderTotalPrice"=> $item1['OrderTotalPrice'],
                    "OrderStatus"=> $item1['OrderStatus'],
                    "Orderpayprice"=> $item1['Orderpayprice'],
                    "PaymentName"=> $item1['PaymentName'],
//                    "EmpFName"=> $item1['EmpFName'],
//                    "EmpLname"=> $item1['EmpLname'],
                    "CustomerAddNo"=> $item1['CustomerAddNo'],
                    "CustomerAddRoad"=> $item1['CustomerAddRoad'],
                );

            $sql3 = new Query;
            $sql3->select('*')->from('orderdetails')
//                ->join('INNER JOIN','food','food.IDFood = orderdetails.IDFood')
//                ->join('INNER JOIN','fooddetails','fooddetails.IDFoodDetails = orderdetails.IDFoodDetails')
                ->where('orderdetails.IDOrder = ' . $item1['IDOrder']);
            $command3 = $sql3->createCommand();
            $data13 = $command3->queryAll();
            foreach ($data13 as $item2) {
                if($item2['IDFoodDetails'] == null){
                    $sql31 = new Query;
                    $sql31->select('*')->from('orderdetails')
                        ->join('INNER JOIN','food','food.IDFood = orderdetails.IDFood')
//                        ->join('INNER JOIN','fooddetails','fooddetails.IDFoodDetails = orderdetails.IDFoodDetails')
                        ->where('orderdetails.IDFood = ' . $item2['IDFood']);
                    $command31 = $sql31->createCommand();
                    $data131 = $command31->queryAll();

                    foreach ($data131 as $item31){
                        $data2 =
                            array(
                                "IDOrderDetails"=> $item31['IDOrderDetails'],
                                "IDFood"=> $item31['IDFood'],
                                "AmountFood"=> $item31['AmountFood'],
                                "FoodName"=> $item31['FoodName'],
                                "FoodPrice"=> $item31['FoodPrice'],
                                "FoodImg"=> $item31['FoodImg'],
                                "IDFoodType"=> $item31['IDFoodType'],
                                "reason"=>$item31['reason'],
//                        "FoodDetailName"=> $item2['FoodDetailName'],
//                        "FoodDetailsPrice"=> $item2['FoodDetailsPrice'],
                        );
                    }

                }else{
                    $sql32 = new Query;
                    $sql32->select('*')->from('orderdetails')
                        ->join('INNER JOIN','food','food.IDFood = orderdetails.IDFood')
                        ->join('INNER JOIN','fooddetails','fooddetails.IDFoodDetails = orderdetails.IDFoodDetails')
                        ->where('orderdetails.IDFood = ' . $item2['IDFood']);
                    $command32 = $sql32->createCommand();
                    $data132 = $command32->queryAll();

                    foreach ($data132 as $item32){
                        $data2 =
                            array(
                                "IDOrderDetails"=> $item32['IDOrderDetails'],
                                "IDFood"=> $item32['IDFood'],
                                "AmountFood"=> $item32['AmountFood'],
                                "FoodName"=> $item32['FoodName'],
                                "FoodPrice"=> $item32['FoodPrice'],
                                "FoodImg"=> $item32['FoodImg'],
                                "IDFoodType"=> $item32['IDFoodType'],
                                "reason"=>$item32['reason'],
                                "FoodDetailName"=> $item32['FoodDetailName'],
                                "FoodDetailsPrice"=> $item32['FoodDetailsPrice'],
                            );
                    }



                }



                $data5[] = $data2;
            }

            $data4 = array("order" =>$data1,"food" =>$data5);
            $data5 = null;
//            $data2 = null;
            $data3[] = $data4;
        }
        return array('success' => true, 'data' => $data3);
    }
}
