<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApilistcustomerController extends Controller
{

    public $enableCsrfValidation = false;
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

    //แสดง
/**
* @param $id
* @return array
* @throws \yii\db\Exception
*/
    public function actionListcustomer($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');
        $sql2 = new Query;
        $sql3 = new Query;
        $data3 = array();
        $sql2->select('*')->from('customer')
//            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomer = customer.IDCustomer')
            ->where('IDCustomer = '.$id);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDCustomer" => $item1['IDCustomer'],
                    "CustomerFName" => $item1['CustomerFName'],

                    "CustomerLName" => $item1['CustomerLName'],
                    "CustomerImage" => "http://udonfooddelivery.xyz/uploads/images/Customer/".$item1['CustomerImage'],
                    "CustomerPoint" => $item1['CustomerPoint'],
                    "CustomerPhone" => $item1['CustomerPhone'],
                    "CUsername" => $item1['CUsername'],
                    "CPasswords" => $item1['CPasswords'],
                    "LoginType" => $item1['LoginType'],
                    "email" => $item1['email'],
                    

                );
            $sql3->select('*')->from('customeraddress')
                ->where('IDCustomer ='.$item1['IDCustomer']);
            $command12 = $sql3->createCommand();
            $data13 = $command12->queryAll();
            $d = array('name'=>$data2,'address'=>$data13);
            $data3[] = $d;
        }
        return array('success' => true, 'data' => $data3);
    }


    public function actionListcustomerall()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $id =  Yii::$app->request->get('id');
        $sql2 = new Query;
        $sql3 = new Query;
        $data3 = array();
        $sql2->select('*')->from('customer');
//            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomer = customer.IDCustomer')
//            ->where('IDCustomer = '.$id);
        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDCustomer" => $item1['IDCustomer'],
                    "CustomerFName" => $item1['CustomerFName'],

                    "CustomerLName" => $item1['CustomerLName'],
                    "CustomerImage" => "http://udonfooddelivery.xyz/uploads/images/Customer/".$item1['CustomerImage'],
                    "CustomerPoint" => $item1['CustomerPoint'],
                    "CustomerPhone" => $item1['CustomerPhone'],
                    "CUsername" => $item1['CUsername'],
                    "CPasswords" => $item1['CPasswords'],
                    "LoginType" => $item1['LoginType'],


                );

            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }

}

