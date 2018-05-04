<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApideliveryproController extends Controller
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
    public function actionListdeliverypro()
    {
//        Yii::$app->formatter->locale = 'th_TH';
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


//        $iddd =  Yii::$app->request->get('id');
//        $idR = $iddd;
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('deliverypro')
            ->where('DeliveryProEnd <= \'' .date('Y-m-d') . '\'');

        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDDeliveryPro" => $item1['IDDeliveryPro'],
                    "DeliveryProName" => $item1['DeliveryProName'],
                    "DeliveryProPiont" => $item1['DeliveryProPiont'],
                    "DeliveryProPrice" => $item1['DeliveryProPrice'],
                    "DeliveryProStart" => $item1['DeliveryProStart'],
                    "DeliveryProEnd" => $item1['DeliveryProEnd']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }


}
