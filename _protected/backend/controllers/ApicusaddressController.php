<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApicusaddressController extends Controller
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
    public function actionListcusaddress($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $iddd =  Yii::$app->request->get('id');
        $idR = $iddd;
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('customeraddress')
            ->where('IDCustomer =' . $idR)->andWhere('CustomerAddNo != "null"')
            ->andWhere('statusa = "1"');
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDCustomerAddress" => $item1['IDCustomerAddress'],
                    "CustomerAddNo" => $item1['CustomerAddNo'],
                    "CustomerAddRoad" => $item1['CustomerAddRoad']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }

    public function actionListcusaddressall()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


//        $iddd =  Yii::$app->request->get('id');
//        $idR = $iddd;
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('customeraddress');
//            ->where('IDCustomer =' . $idR);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "CustomerAddNo" => $item1['CustomerAddNo'],
                    "CustomerAddRoad" => $item1['CustomerAddRoad']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }

    public function actionListcusaddressbytype($id,$type)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


        $iddd =  Yii::$app->request->get('id');
        $type =  Yii::$app->request->get('type');
        $idR = $iddd;
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('customeraddress')
            ->where('IDCustomer =' . $idR);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "CustomerAddNo" => $item1['CustomerAddNo'],
                    "CustomerAddRoad" => $item1['CustomerAddRoad']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }


}
