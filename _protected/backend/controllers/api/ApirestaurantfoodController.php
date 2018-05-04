<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApirestaurantfoodController extends Controller
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


    public function actionListrestaurantfood()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;




        $query = new Query;

        $query->select([
                'restaurant.*',
                'food.*',
            ]
        )
            ->from('restaurant')
            ->join('INNER JOIN','food','restaurant.IDRestaurant = food.IDRestaurant')
            ->orderBy('restaurant.IDRestaurant');

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
