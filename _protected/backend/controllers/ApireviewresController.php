<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApireviewresController extends Controller
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
    public function actionListreviewres($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $iddd =  Yii::$app->request->get('id');


        $idR = $iddd;

        $sql2 = new Query;
//        $sql3 = new Query;

//        $data = $command1->qu

//        $lise = array();
        $data3 = array();
//        $data32 = array();


        $sql2->select('*')->from('resreview')
            ->join('INNER JOIN', 'customer', 'customer.IDCustomer = resreview.IDCustomer')
            ->where('IDRestaurant =' . $idR);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDResReview" => $item1['IDResReview'],
                    "ResReviewDate" => $item1['ResReviewDate'],
                    "ResReviewScore" => $item1['ResReviewScore'],
                    "ResComment" => $item1['ResComment'],
                    "ResReviewImage" => "http://udonfooddelivery.xyz/uploads/images/Resreview/".$item1['ResReviewImage'],
                    "IDRestaurant" => $item1['IDRestaurant'],
                    "IDCustomer" => $item1['IDCustomer'],
                    "CustomerFName" => $item1['CustomerFName'],
                    "CustomerLName" => $item1['CustomerLName']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }
}
