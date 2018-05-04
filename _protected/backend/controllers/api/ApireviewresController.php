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

//            $data11 = mysqli_query($con,$sql2);

        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDResReview" => $item1['IDResReview'],
                    "ResReviewDate" => $item1['ResReviewDate'],
                    "ResReviewScore" => $item1['ResReviewScore'],
                    "ResComment" => $item1['ResComment'],
                    "ResReviewImage" => $item1['ResReviewImage'],
                    "IDRestaurant" => $item1['IDRestaurant'],
                    "IDCustomer" => $item1['IDCustomer'],
                    "CustomerFName" => $item1['CustomerFName'],
                    "CustomerLName" => $item1['CustomerLName']
                );
            $data3[] = $data2;
        }

//

//        $data4 = array( "RecommendedMenu" => $data3, "Normalmenu" => $data32);
////        $data4 = array( "เมนูแนะนำ" =>$data3,"เมนูธรรมดา" =>$data32);
//        $lise[] = $data4;

//        if (count($lise) > 0) {

        return array('success' => true, 'data' => $data3);
//        echo json_encode($a);

//        } else {
//            return array('success' => false, 'data' => 'No data');
//        }
    }
}
