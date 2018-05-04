<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApirestaurantController extends Controller
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


    public function actionListrestaurant()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



        $dateNow = date('Y-m-d');


        $query = new Query;


        $query->select([
                'IDRestaurant',
                'ResName',
                'ResLowPrice',
                'latlng',
                'CONCAT( \'http://udonfooddelivery.xyz/uploads/images/Restaurantimg/\' , ResImg ) as ResImg '])
            ->from('restaurant')->where('ResStatus ='.' "อนุมัติ" ');




        $command = $query->createCommand();
        $data = $command->queryAll();



//        print("<pre>" . print_r($data, true) . "</pre>");

        if (count($data) > 0) {
            return array('success' => true, 'data' => $data);
        } else {
            return array('success' => false, 'data' => 'No data');
        }
    }


    public function actionListrestaurant2(){
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $dateNow = date('Y-m-d');
        $sql = new  Query;

        $sql->select('*')->from('restaurant')->where('ResStatus ='.' "อนุมัติ" ');;
        $command = $sql->createCommand();
        $data = $command->queryAll();
        foreach ($data as $item){
            $datares =
                array(
                    "IDRestaurant"=>$item['IDRestaurant'],
                    "ResName"=>$item['ResName'],
                    "ResLowPrice"=>$item['ResLowPrice'],
                    "latlng"=>$item['latlng'],
                    "ResImg"=>"http://udonfooddelivery.xyz/uploads/images/Restaurantimg/".$item['ResImg'],
                );
            $sql2 = new  Query;
            $sql2->select('*')->from('respromotion')
                ->andFilterWhere(['=', 'IDRestaurant', $item['IDRestaurant']])
                ->andFilterWhere(['<=', 'ResPromotionStart', $dateNow])
                ->andFilterWhere(['>=', 'ResPromotionEnd', $dateNow]);
//                ->andWhere('IDRestaurant = '.$item['IDRestaurant'])
//                ->andWhere('ResPromotionStart <='.$dateNow)
//                ->andWhere('ResPromotionEnd >='.$dateNow);
            $command2 = $sql2->createCommand();
            $data2 = $command2->queryAll();

            if (count($data2) > 0){
                foreach ($data2 as $item2){
                    $datapro =
                        array(
                            "IDResPromotion"=>$item2['IDResPromotion'],
                            "ResPromotionName"=>$item2['ResPromotionName'],
                        );

                }
            }else{
                $datapro = null;
            }
            $dataall = array('res'=>$datares,'pro'=>$datapro);

            $dd[] =$dataall;





        }


        return array('success' => true, 'data' => $dd);

    }
}
