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
                'CONCAT( \'http://localhost/newudondelivery3/uploads/images/Restaurantimg/\' , ResImg ) as ResImg '])
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
}
