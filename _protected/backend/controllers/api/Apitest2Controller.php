<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class Apitest2Controller extends Controller
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


    public function actionListtest2()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



//        header("content-type:Application/json; charset=utf-8");

//        $con=mysqli_connect("localhost","root","","dbtest2");

////
        $sql = new Query;
        $sql2 = new Query;
        $sql3 = new Query;
        $sql->select('*')->from('restaurant')->where('ResStatus ='.' "อนุมัติ" ');
//        $sql = "SELECT * FROM restaurant ";

        $command1 = $sql->createCommand();
        $data1 = $command1->queryAll();

//        $data1 = mysqli_query($con,$sql);//การเรียกใช้ข้อมูลจากฐานข้อมูลมาใช้งานโดยกำหนดค่าการเรียกใช้





        $lise = array();
        $data3 = array();
        $data32 = array();
//        while ($row = $data1)
        foreach($data1 as $item)// คำสั่งให้แสดงข้อมูล
        {
//            print ($key);
//            print("<pre>" . print_r($item, true) . "</pre>");



            $data =
                array(
                    "IDRestaurant" => $item['IDRestaurant'],
                    "ResName" => $item['ResName'],
                    "ResLowPrice" => $item['ResLowPrice'],
                    "ResImg" => $item['ResImg']


                );

            $sql2->select('*')->from('food')->where('IDRestaurant ='.$item['IDRestaurant']);

//            $sql2 = "SELECT * FROM food WHERE IDRestaurant = ".$row['IDRestaurant'];

            $command11 = $sql2->createCommand();
            $data11 = $command11->queryAll();

//            $data11 = mysqli_query($con,$sql2);

            foreach($data11 as  $item1){
                $data2 =
                    array(
                        "IDFood" => $item1['IDFood'],
                        "FoodImg" => $item1['FoodImg'],
                        "FoodName" => $item1['FoodName'],
                        "FoodPrice" => $item1['FoodPrice'],
                        "IDFoodType" => $item1['IDFoodType'],
                        "MenuTypeName" => $item1['MenuTypeName'],
                        "IDRestaurant" => $item1['IDRestaurant']
                    );
                $data3[] = $data2;
            }

//
            $sql3->select('*')->from('respromotion')->where('IDRestaurant = '.$item['IDRestaurant']);

//            $sql3 = "SELECT * FROM respromotion WHERE IDRestaurant = ".$row['IDRestaurant'];
////
            $command111 = $sql3->createCommand();
            $data111 = $command111->queryAll();

//            $data111 = mysqli_query($con,$sql3);
            foreach($data111 as $item2){
                $data22 =
                    array(
                        "ResPromotionName" => $item2['ResPromotionName'],
                        "ResPromotionStart" => $item2['ResPromotionStart'],
                        "ResPromotionEnd" => $item2['ResPromotionEnd']
                    );
                $data32[] = $data22;
            }

            $data4 = array("ชื่อร้าน" =>$data,"เมนูอาหาร" =>$data3,"โปรโมชั่น" =>$data32);
            $data3 = null;
            $data32 = null;
            $lise[] = $data4;
        }


//        if (count($lise) > 0) {

            return array('success' => true, 'data' => $lise);
//        echo json_encode($a);

//        } else {
//            return array('success' => false, 'data' => 'No data');
//        }
    }
}
