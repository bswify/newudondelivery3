<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApipromotionController extends Controller
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


    public function actionListpromotion()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $dateNow = date('Y-m-d');

        $query = new Query;
        $query->select([
                'restaurant.IDRestaurant',
                'restaurant.ResName',
                'restaurant.latlng',
                'restaurant.ResLowPrice',
                'CONCAT( \'http://udonfooddelivery.xyz/uploads/images/Restaurantimg/\' , restaurant.ResImg ) as ResImg',
//                'restaurant.ResImg',
                'respromotion.IDResPromotion',
                'respromotion.ResPromotionName',
                'respromotion.ResPromotionStart',
                'respromotion.ResPromotionEnd'
            ]
        )
            ->from('respromotion')
            ->join('INNER JOIN', 'restaurant',
                'respromotion.IDRestaurant = restaurant.IDRestaurant')
            ->andFilterWhere(['<=', 'respromotion.ResPromotionStart', $dateNow])
            ->andFilterWhere(['>=', 'respromotion.ResPromotionEnd', $dateNow]);

        $command = $query->createCommand();
        $data = $command->queryAll();


//        print("<pre>" . print_r($data, true) . "</pre>");

        if (count($data) > 0) {
            return array('success' => true, 'data' => $data);
        } else {
            return array('success' => false, 'data' => 'No data');
        }
    }
}
