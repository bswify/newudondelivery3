<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApifavoritemenuController extends Controller
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
    public function actionInsertfavoritemenu()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $favoritemenu = new Favoritemenu();
        $request = Yii::$app->request;
        $favoritemenu->scenario = Favoritemenu::SCENARIO_CREATE;
        $favoritemenu->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $favoritemenu->IDFood = $request->getBodyParam('idfood');
            $favoritemenu->IDCustomer = $request->getBodyParam('idcustomer');
            if ($favoritemenu->validate()) {
                $favoritemenu->save();
                return array('status' => true, 'data' => 'Favoritemenu create successfully.');
            } else {
                return array('status' => false, 'data' => $favoritemenu->getErrors());
            }

        }
    }
    //ลบ

    /**
     * @return array
     */
    public function actionDeletefavoritemenu($idf,$idc)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $idf =  Yii::$app->request->get('idf');
        $idc =  Yii::$app->request->get('idc');

//        $sql = new Query();
//        $sql->

        $this->findModel($idf,$idc)->delete();
        return array('status' => true, 'data' => 'Favoritemenu delete successfully.');
    }
    protected function findModel($idf,$idc)
    {
        if (($model = Favoritemenu::find()->where(['IDFood' => $idf])->andWhere(['IDCustomer'=> $idc])->one()) !== null) {
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
    public function actionListfavoritemenu2($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('favoritemenu')
            ->join('INNER JOIN', 'customer', 'customer.IDCustomer = favoritemenu.IDCustomer')
            ->join('INNER JOIN', 'food', 'food.IDFood = favoritemenu.IDFood')
            ->join('INNER JOIN','foodtype','foodtype.IDFoodType = food.IDFoodType')
            ->join('INNER JOIN','restaurant','restaurant.IDRestaurant = food.IDRestaurant')
            ->where('favoritemenu.IDCustomer =' . $id);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDFavoriteManu" => $item1['IDFavoriteManu'],
                    "IDFood" => $item1['IDFood'],
                    "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                    "FoodName" => $item1['FoodName'],
                    "FoodPrice" => $item1['FoodPrice'],
                    "IDFoodType" => $item1['IDFoodType'],
                    "FoodTypeName" => $item1['FoodTypeName'],
                    "IDRestaurant" => $item1['IDRestaurant'],
                    "ResName" => $item1['ResName'],
                    "MenuTypeName" => $item1['MenuTypeName'],
                    "IDCustomer" => $item1['IDCustomer'],
                    "CustomerFName" => $item1['CustomerFName'],
                    "CustomerLName" => $item1['CustomerLName']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }


    public function actionListfavoritemenu($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');
        $sql1 = new Query();

        $sql3 = new Query();

        $qa = array();
        $data3 = array();
        $detal = array();

        $sql1->select('restaurant.IDRestaurant')->distinct()->from('favoritemenu')
            ->join('INNER JOIN', 'food', 'food.IDFood = favoritemenu.IDFood')
            ->join('INNER JOIN','restaurant','restaurant.IDRestaurant = food.IDRestaurant')
            ->where('favoritemenu.IDCustomer =' . $id);
        $command = $sql1->createCommand();
        $data = $command->queryAll();
        $dateNow = date('Y-m-d');
        foreach ($data as $item){

            $sd = new Query();
            $sd->select('*')->from('respromotion')->where('IDRestaurant = '.$item['IDRestaurant'])
                ->andFilterWhere(['<=', 'ResPromotionStart', $dateNow])
                ->andFilterWhere(['>=', 'ResPromotionEnd', $dateNow])
            ;
            $comsd = $sd->createCommand();
            $datasd = $comsd->queryAll();
            if(count($datasd) > 0){
                foreach ($datasd as $itemsd){
                    $datapro =
                        array(
                            "IDResPromotion"=>$itemsd['IDResPromotion'],
                            "ResPromotionName"=>$itemsd['ResPromotionName'],
                        );
                    $qa[]= $datapro;
                }
            }else{
                $qa = null;
            }


            $sql65 = new  Query;

            $sql65->select('*')->from('restaurant')->where('ResStatus ='.' "อนุมัติ" ')
                ->andWhere('IDRestaurant = '.$item['IDRestaurant'])
            ;
            $command65 = $sql65->createCommand();
            $data65 = $command65->queryAll();

            foreach ($data65 as $item65){
                $datares =
                    array(
                        "IDRestaurant"=>$item65['IDRestaurant'],
                        "ResName"=>$item65['ResName'],
                        "ResAddress"=> $item65['ResAddress'],
                        "ResStatus"=>$item65['ResStatus'],
                        "ResTel"=> $item65['ResTel'],
                        "ResTimeStart"=> $item65['ResTimeStart'],
                        "ResTimeEnd"=>$item65['ResTimeEnd'],
                        "IDLocation"=> $item65['IDLocation'],
                        "ResLowPrice"=>$item65['ResLowPrice'],
                        "latlng"=>$item65['latlng'],
                        "ResImg"=>"http://udonfooddelivery.xyz/uploads/images/Restaurantimg/".$item65['ResImg'],
                        "Respro"=>$qa
                    );
            }

//            $sql3->select(['IDRestaurant',
//                'CONCAT( \'http://udonfooddelivery.xyz/uploads/images/Restaurantimg/\' , ResImg ) as ResImg',
//                'ResName',
//                'ResLowPrice',
//                'ResAddress',
//                'ResTel',
//                'ResTimeStart',
//                'ResTimeEnd',
//                'latlng',
//                'IDLocation'
//            ])
//                ->from('restaurant')
//                ->where('IDRestaurant = ' . $item['IDRestaurant']);
//            $cm =$sql3->createCommand();
//            $d =$cm->queryAll();



            $sql2 = new Query;
            $sql2->select('*')->from('favoritemenu')
                ->join('INNER JOIN', 'customer', 'customer.IDCustomer = favoritemenu.IDCustomer')
                ->join('INNER JOIN', 'food', 'food.IDFood = favoritemenu.IDFood')
                ->join('INNER JOIN','foodtype','foodtype.IDFoodType = food.IDFoodType')
                ->join('INNER JOIN','restaurant','restaurant.IDRestaurant = food.IDRestaurant')
                ->where('favoritemenu.IDCustomer =' . $id)
                ->andWhere('food.IDRestaurant = '.$item['IDRestaurant']);
            $command11 = $sql2->createCommand();
            $data11 = $command11->queryAll();
            foreach ($data11 as $item1) {
                $sql12 = new Query();
                $sql12->select('*')->from('fooddetails')->where('IDFood = '.$item1['IDFood']);
                $command5 = $sql12->createCommand();
                $data12 = $command5->queryAll();
                if($data12 !== null){
                    foreach ($data12 as $item12){
                        $dade = array(
                            "IDFoodDetails" => $item12['IDFoodDetails'],
                            "FoodDetailName" => $item12['FoodDetailName'],
                            "FoodDetailsPrice" => $item12['FoodDetailsPrice']
                        );
                        $detal[] = $dade;

                    }
                }else{
                    $detal =null;
                }

                $data2 =
                    array(
                        "IDFavoriteManu" => $item1['IDFavoriteManu'],
                        "IDFood" => $item1['IDFood'],
                        "FoodImg" => "http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                        "FoodName" => $item1['FoodName'],
                        "FoodPrice" => $item1['FoodPrice'],
                        "IDFoodType" => $item1['IDFoodType'],
                        "FoodTypeName" => $item1['FoodTypeName'],
                        "MenuTypeName" => $item1['MenuTypeName'],
                        "IDCustomer" => $item1['IDCustomer'],
                        "CustomerFName" => $item1['CustomerFName'],
                        "CustomerLName" => $item1['CustomerLName'],
                        'detailfood'=>$detal
                    );




//                $dq = array('favoritefood' => $data2,'detailfood'=>$detal);
                $detal =null;

                $data3[] = $data2;
            }


            $dataa = array('res'=>$datares,'food'=>$data3);
            $data3 =null;
            $re[]=$dataa;
        }




        $model = Favoritemenu::find()->where(['IDCustomer' => $id])->one();
        if( $model !== null){
            return array('success' => true, 'data' => $re);
        }else{
            return array('success' => true, 'data' => null);
        }

    }

}

