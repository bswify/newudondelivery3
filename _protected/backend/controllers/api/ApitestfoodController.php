<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApitestfoodController extends Controller
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


    /**
     * @param $id
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionListtestfood($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $iddd =  Yii::$app->request->get('id');


        $idR = $iddd;
        $sql = new Query;
        $sql2 = new Query;
        $sql3 = new Query;
//        $sql->select('*')->from('restaurant')->where('IDRestaurant ='.$idR);
        $sql->select(['IDRestaurant',
            'CONCAT( \'http://localhost/newudondelivery3/uploads/images/Food/\' , ResImg ) as ResImg',
            'ResName',
            'ResLowPrice',
            'ResAddress',
            'ResTel',
            'ResTimeStart',
            'ResTimeEnd',
            'latlng',
            'IDLocation'
        ])
            ->from('restaurant')
            ->where('IDRestaurant = ' . $idR);


        $command1 = $sql->createCommand();
        $data = $command1->queryOne();
//        $data = $command1->qu

        $lise = array();
        $data3 = array();
        $data32 = array();


        $sql2->select('*')->from('food')
            ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
            ->where('IDRestaurant =' . $idR)->andWhere('MenuTypeName = "เมนูแนะนำ"');
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();

//            $data11 = mysqli_query($con,$sql2);

        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDFood" => $item1['IDFood'],
                    "FoodImg" => $item1['FoodImg'],
                    "FoodName" => $item1['FoodName'],
                    "FoodPrice" => $item1['FoodPrice'],
                    "IDFoodType" => $item1['IDFoodType'],
                    "FoodTypeName" => $item1['FoodTypeName'],
                    "MenuTypeName" => $item1['MenuTypeName'],
                    "IDRestaurant" => $item1['IDRestaurant']
                );
            $data3[] = $data2;
        }

//
        $sql3->select('*')->from('food')
            ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
            ->where('IDRestaurant =' . $idR)->andWhere('MenuTypeName = "เมนูธรรมดา"');

        $command111 = $sql3->createCommand();
        $data111 = $command111->queryAll();
        foreach ($data111 as $item2) {
            $data22 =
                array(
                    "IDFood" => $item2['IDFood'],
                    "FoodImg" => $item2['FoodImg'],
                    "FoodName" => $item2['FoodName'],
                    "FoodPrice" => $item2['FoodPrice'],
                    "IDFoodType" => $item2['IDFoodType'],
                    "FoodTypeName" => $item2['FoodTypeName'],
                    "MenuTypeName" => $item2['MenuTypeName'],
                    "IDRestaurant" => $item2['IDRestaurant']
                );
            $data32[] = $data22;
        }

        $data4 = array("ร้าน" => $data, "เมนูแนะนำ" => $data3, "เมนูธรรมดา" => $data32);
//        $data4 = array( "เมนูแนะนำ" =>$data3,"เมนูธรรมดา" =>$data32);
        $lise[] = $data4;

//        if (count($lise) > 0) {

        return array('success' => true, 'data' => $data4, 'id' => $iddd);
//        echo json_encode($a);

//        } else {
//            return array('success' => false, 'data' => 'No data');
//        }
    }
}
