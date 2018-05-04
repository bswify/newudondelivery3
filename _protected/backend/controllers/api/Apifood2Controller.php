<?php

namespace backend\controllers;

use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class Apifood2Controller extends Controller
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


    public function actionListfood2()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;





        $query = new Query;
        $query->select([
                'food.IDFood',
                'CONCAT( \'http://localhost/newudondelivery3/uploads/images/Food/\' , food.FoodImg ) as FoodImg',
                'food.FoodName',
                'food.FoodPrice',
                'foodtype.FoodTypeName',
                'food.IDRestaurant',
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
            ->where('restaurant.IDRestaurant =  16 ')
//            ->where('food.IDRestaurant = \''.$idR.'\'')
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
