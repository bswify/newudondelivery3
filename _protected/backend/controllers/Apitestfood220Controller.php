<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class Apitestfood220Controller extends Controller
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
    public function actionListtestfood22($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $iddd =  Yii::$app->request->get('id');
        $idR = $iddd;
        $sql = new Query;
        $sql2 = new Query;
        $sql3 = new Query;
        $sql4 = new Query;
        $sql5 = new Query;
//        $sql->select('*')->from('restaurant')->where('IDRestaurant ='.$idR);
        $sql->select(['IDRestaurant',
            'CONCAT( \'http://udonfooddelivery.xyz/uploads/images/Restaurantimg/\' , ResImg ) as ResImg',
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
        $lise = array();
        $data3 = array();
//        $data32 = array();
        $sql2->select('*')->from('food')
            ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
            ->where('IDRestaurant =' . $idR)->andWhere('MenuTypeName = "เมนูแนะนำ"');
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDFood" => $item1['IDFood'],
                    "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                    "FoodName" => $item1['FoodName'],
                    "FoodPrice" => $item1['FoodPrice'],
                    "IDFoodType" => $item1['IDFoodType'],
                    "FoodTypeName" => $item1['FoodTypeName'],
                    "MenuTypeName" => $item1['MenuTypeName'],
                    "IDRestaurant" => $item1['IDRestaurant']
                );
            $sql4->select('*')->from('fooddetails')->where('IDFood = '.$item1['IDFood']);
            $command114 = $sql4->createCommand();
            $data44 = $command114->queryAll();
            if($data44 == null){
                $data66 = null;
            }else{
                foreach ($data44 as $item4){
                    $data22 =
                        array(
                            "IDFoodDetails" => $item4['IDFoodDetails'],
                            "FoodDetailName" => $item4['FoodDetailName'],
                            "FoodDetailsPrice" => $item4['FoodDetailsPrice'],
                        );
                    $data66[]=$data22;

                }
            }
//            $data2[]=$data66;

            $data2 += array("detailFood"=> $data66);
            $data32 = array("menu"=>$data2);
            $data3[] = $data32;
            $data66 = null;
        }
        $sql3->select('*')->from('food')
            ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
            ->where('IDRestaurant =' . $idR)->andWhere('MenuTypeName = "เมนูธรรมดา"');
        $command111 = $sql3->createCommand();
        $data111 = $command111->queryAll();
        foreach ($data111 as $item2) {
            $data22 =
                array(
                    "IDFood" => $item2['IDFood'],
                    "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item2['FoodImg'],
                    "FoodName" => $item2['FoodName'],
                    "FoodPrice" => $item2['FoodPrice'],
                    "IDFoodType" => $item2['IDFoodType'],
                    "FoodTypeName" => $item2['FoodTypeName'],
                    "MenuTypeName" => $item2['MenuTypeName'],
                    "IDRestaurant" => $item2['IDRestaurant']
                );
            $sql5->select('*')->from('fooddetails')->where('IDFood = '.$item2['IDFood']);
            $command115 = $sql5->createCommand();
            $data55 = $command115->queryAll();
            if($data55 == null){
                $data2222 = null;
            }else{
                foreach ($data55 as $item5){
                    $data222 =
                        array(
                            "IDFoodDetails" => $item5['IDFoodDetails'],
                            "FoodDetailName" => $item5['FoodDetailName'],
                            "FoodDetailsPrice" => $item5['FoodDetailsPrice'],
                        );

                    $data2222[]=$data222;
                }
            }

//            $data3 = array($data2,"detailFood"=> $data22);
            $data322= array("menu"=>$data22,"detailFood"=> $data2222);
            $data3222[] = $data322;
            $data2222 = null;
        }
        $data4 = array("restaurant" => $data, "RecommendedMenu" => $data3, "Normalmenu" => $data3222);
        $lise[] = $data4;
        return array('success' => true, 'data' => $data4);
//        echo json_encode($a);

//        } else {
//            return array('success' => false, 'data' => 'No data');
//        }
    }
}
