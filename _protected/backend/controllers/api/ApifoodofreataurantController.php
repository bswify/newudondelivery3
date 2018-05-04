<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApifoodofreataurantController extends Controller
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


    public function actionListfoodofreataurant($idRes)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;




        $query = new Query;
        $query->select([
                'food.IDFood',
                'CONCAT( \'http://localhost/newudondelivery3/uploads/images/Food/\' , food.FoodImg ) as FoodImg',
                'food.FoodName',
                'food.FoodPrice',
                'foodtype.FoodTypeName',
                'restaurant.ResName',
                'food.MenuTypeName',
                'fooddetails.FoodDetailName',
                'fooddetails.FoodDetailsPrice'

            ]
        )
            ->from('food')
            ->join('INNER JOIN','foodtype','food.IDFoodType = foodtype.IDFoodType')
            ->join('INNER JOIN','fooddetails','food.IDFood = fooddetails.IDFood')
            ->join('INNER JOIN','restaurant','restaurant.IDRestaurant = food.IDRestaurant')
            ->where('food.IDFood =' .$idRes)
        ;

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
