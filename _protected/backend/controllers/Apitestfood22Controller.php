<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class Apitestfood22Controller extends Controller
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
                $data66 = [];
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

//            if($data66 == null){
//
//            }else{
//                $data2 += array("detailFood"=> $data66);
//            }
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
                $data2222 = [];
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

//            if($data2222 == null){
//
//            }else{
//                $data22 += array("detailFood"=> $data2222);
//            }

            $data22 += array("detailFood"=> $data2222);
            $data322= array("menu"=>$data22);
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


    public function actionListfoodforres($idr,$idc)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $idr =  Yii::$app->request->get('idr');
        $idc =  Yii::$app->request->get('idc');
        $idR = $idr;
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

            $model2 = Favoritemenu::find()->where(['IDCustomer' => $idc])->andWhere(['IDFood'=> $item1['IDFood']])->one();
            if($model2 !== null){
                $data2 =
                    array(
                        "IDFood" => $item1['IDFood'],
                        "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                        "FoodName" => $item1['FoodName'],
                        "FoodPrice" => $item1['FoodPrice'],
                        "IDFoodType" => $item1['IDFoodType'],
                        "FoodTypeName" => $item1['FoodTypeName'],
                        "MenuTypeName" => $item1['MenuTypeName'],
                        "IDRestaurant" => $item1['IDRestaurant'],
                        "StatusFoodFavorite"=> true
                    );
            }else{
                $data2 =
                    array(
                        "IDFood" => $item1['IDFood'],
                        "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                        "FoodName" => $item1['FoodName'],
                        "FoodPrice" => $item1['FoodPrice'],
                        "IDFoodType" => $item1['IDFoodType'],
                        "FoodTypeName" => $item1['FoodTypeName'],
                        "MenuTypeName" => $item1['MenuTypeName'],
                        "IDRestaurant" => $item1['IDRestaurant'],
                         "StatusFoodFavorite"=> false
                    );
            }

            $sql4->select('*')->from('fooddetails')->where('IDFood = '.$item1['IDFood']);
            $command114 = $sql4->createCommand();
            $data44 = $command114->queryAll();
            if($data44 == null){
                $data66 = [];
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

//            if($data66 == null){
//
//            }else{
//                $data2 += array("detailFood"=> $data66);
//            }
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
//            $sql6->select('*')->from('favoritemenu')
//                ->where('IDCustomer = '.$idc)
//                ->andWhere('IDFood ='.$item2['IDFood']);
//            $com6 = $sql6->createCommand();
//            $data6 = $com6->queryAll();
            $model1 = Favoritemenu::find()->where(['IDCustomer' => $idc])->andWhere(['IDFood'=> $item2['IDFood']])->one();
            if($model1 !== null){
                $data22 =
                    array(
                        "IDFood" => $item2['IDFood'],
                        "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item2['FoodImg'],
                        "FoodName" => $item2['FoodName'],
                        "FoodPrice" => $item2['FoodPrice'],
                        "IDFoodType" => $item2['IDFoodType'],
                        "FoodTypeName" => $item2['FoodTypeName'],
                        "MenuTypeName" => $item2['MenuTypeName'],
                        "IDRestaurant" => $item2['IDRestaurant'],
                        "StatusFoodFavorite"=> true
                    );
            }else{
                $data22 =
                    array(
                        "IDFood" => $item2['IDFood'],
                        "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item2['FoodImg'],
                        "FoodName" => $item2['FoodName'],
                        "FoodPrice" => $item2['FoodPrice'],
                        "IDFoodType" => $item2['IDFoodType'],
                        "FoodTypeName" => $item2['FoodTypeName'],
                        "MenuTypeName" => $item2['MenuTypeName'],
                        "IDRestaurant" => $item2['IDRestaurant'],
                        "StatusFoodFavorite"=> false
                    );
            }

            $sql5->select('*')->from('fooddetails')->where('IDFood = '.$item2['IDFood']);
            $command115 = $sql5->createCommand();
            $data55 = $command115->queryAll();
            if($data55 == null){
                $data2222 = [];
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

//            if($data2222 == null){
//
//            }else{
//                $data22 += array("detailFood"=> $data2222);
//            }

            $data22 += array("detailFood"=> $data2222);
            $data322= array("menu"=>$data22);
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


    public function actionListfoodforres2($idc)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $idr =  Yii::$app->request->get('idr');
        $idc =  Yii::$app->request->get('idc');
        $idR = $idr;
        $sql = new Query;
        $sql15 = new Query;
        $sql2 = new Query;
        $sql3 = new Query;
        $sql4 = new Query;
        $sql5 = new Query;


        $sql15->select('restaurant.IDRestaurant')->distinct()->from('favoritemenu')
            ->join('INNER JOIN', 'food', 'food.IDFood = favoritemenu.IDFood')
            ->join('INNER JOIN','restaurant','restaurant.IDRestaurant = food.IDRestaurant')
            ->where('favoritemenu.IDCustomer =' . $idc);
        $com= $sql15->createCommand();
        $data15 = $com->queryOne();


        foreach ($data15 as $item15) {
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
                ->where('IDRestaurant = ' . $item15['IDRestaurant']);
            $command1 = $sql->createCommand();
            $data = $command1->queryOne();
            $lise = array();
            $data3 = array();
//        $data32 = array();
            $sql2->select('*')->from('food')
                ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
                ->where('IDRestaurant =' . $item15['IDRestaurant'])->andWhere('MenuTypeName = "เมนูแนะนำ"');
            $command11 = $sql2->createCommand();
            $data11 = $command11->queryAll();
            foreach ($data11 as $item1) {

                $model2 = Favoritemenu::find()->where(['IDCustomer' => $idc])->andWhere(['IDFood' => $item1['IDFood']])->one();
                if ($model2 !== null) {
                    $data2 =
                        array(
                            "IDFood" => $item1['IDFood'],
                            "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/" . $item1['FoodImg'],
                            "FoodName" => $item1['FoodName'],
                            "FoodPrice" => $item1['FoodPrice'],
                            "IDFoodType" => $item1['IDFoodType'],
                            "FoodTypeName" => $item1['FoodTypeName'],
                            "MenuTypeName" => $item1['MenuTypeName'],
                            "IDRestaurant" => $item1['IDRestaurant'],
                            "StatusFoodFavorite" => true
                        );
                } else {
                    $data2 =
                        array(
                            "IDFood" => $item1['IDFood'],
                            "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/" . $item1['FoodImg'],
                            "FoodName" => $item1['FoodName'],
                            "FoodPrice" => $item1['FoodPrice'],
                            "IDFoodType" => $item1['IDFoodType'],
                            "FoodTypeName" => $item1['FoodTypeName'],
                            "MenuTypeName" => $item1['MenuTypeName'],
                            "IDRestaurant" => $item1['IDRestaurant'],
                            "StatusFoodFavorite" => false
                        );
                }

                $sql4->select('*')->from('fooddetails')->where('IDFood = ' . $item1['IDFood']);
                $command114 = $sql4->createCommand();
                $data44 = $command114->queryAll();
                if ($data44 == null) {
                    $data66 = [];
                } else {
                    foreach ($data44 as $item4) {
                        $data22 =
                            array(
                                "IDFoodDetails" => $item4['IDFoodDetails'],
                                "FoodDetailName" => $item4['FoodDetailName'],
                                "FoodDetailsPrice" => $item4['FoodDetailsPrice'],
                            );
                        $data66[] = $data22;

                    }
                }

//            if($data66 == null){
//
//            }else{
//                $data2 += array("detailFood"=> $data66);
//            }
//            $data2[]=$data66;


                $data2 += array("detailFood" => $data66);
                $data32 = array("menu" => $data2);
                $data3[] = $data32;
                $data66 = null;
            }
            $sql3->select('*')->from('food')
                ->join('INNER JOIN', 'foodtype', 'foodtype.IDFoodType = food.IDFoodType')
                ->where('IDRestaurant =' . $item15['IDRestaurant'])->andWhere('MenuTypeName = "เมนูธรรมดา"');
            $command111 = $sql3->createCommand();
            $data111 = $command111->queryAll();
            foreach ($data111 as $item2) {
//            $sql6->select('*')->from('favoritemenu')
//                ->where('IDCustomer = '.$idc)
//                ->andWhere('IDFood ='.$item2['IDFood']);
//            $com6 = $sql6->createCommand();
//            $data6 = $com6->queryAll();
                $model1 = Favoritemenu::find()->where(['IDCustomer' => $idc])->andWhere(['IDFood' => $item2['IDFood']])->one();
                if ($model1 !== null) {
                    $data22 =
                        array(
                            "IDFood" => $item2['IDFood'],
                            "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/" . $item2['FoodImg'],
                            "FoodName" => $item2['FoodName'],
                            "FoodPrice" => $item2['FoodPrice'],
                            "IDFoodType" => $item2['IDFoodType'],
                            "FoodTypeName" => $item2['FoodTypeName'],
                            "MenuTypeName" => $item2['MenuTypeName'],
                            "IDRestaurant" => $item2['IDRestaurant'],
                            "StatusFoodFavorite" => true
                        );
                } else {
                    $data22 =
                        array(
                            "IDFood" => $item2['IDFood'],
                            "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/" . $item2['FoodImg'],
                            "FoodName" => $item2['FoodName'],
                            "FoodPrice" => $item2['FoodPrice'],
                            "IDFoodType" => $item2['IDFoodType'],
                            "FoodTypeName" => $item2['FoodTypeName'],
                            "MenuTypeName" => $item2['MenuTypeName'],
                            "IDRestaurant" => $item2['IDRestaurant'],
                            "StatusFoodFavorite" => false
                        );
                }

                $sql5->select('*')->from('fooddetails')->where('IDFood = ' . $item2['IDFood']);
                $command115 = $sql5->createCommand();
                $data55 = $command115->queryAll();
                if ($data55 == null) {
                    $data2222 = [];
                } else {
                    foreach ($data55 as $item5) {
                        $data222 =
                            array(
                                "IDFoodDetails" => $item5['IDFoodDetails'],
                                "FoodDetailName" => $item5['FoodDetailName'],
                                "FoodDetailsPrice" => $item5['FoodDetailsPrice'],
                            );

                        $data2222[] = $data222;
                    }
                }

//            $data3 = array($data2,"detailFood"=> $data22);

//            if($data2222 == null){
//
//            }else{
//                $data22 += array("detailFood"=> $data2222);
//            }

                $data22 += array("detailFood" => $data2222);
                $data322 = array("menu" => $data22);
                $data3222[] = $data322;
                $data2222 = null;
            }
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
