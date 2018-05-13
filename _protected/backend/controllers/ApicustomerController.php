<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\Favoritemenu;
use backend\models\Orderdetails;
use backend\models\Orders;
use Mpdf\Tag\Q;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApicustomerController extends Controller
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
    //เพิ่ม

    /**
     * @return array
     */
    public function actionInsertcustomer2()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $cus = new Customer();
        $dd = Yii::$app->request->post();
        $d = array($dd);
        $request = Yii::$app->request;
//        $cus->scenario = Customer::SCENARIO_CREATE;
        $cus->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $param = $request->getBodyParam('img');
            $filename = $request->getBodyParam('fname').date("Y-m-d_H-i-s") . '.png';

//            $cus->CustomerFName = $request->getBodyParam('fname');
//            $cus->CustomerLName = $request->getBodyParam('lname');
            $cus->CustomerFName = $request->getBodyParam('username');
            $cus->CustomerLName = $request->getBodyParam('username');
            $cus->CustomerImage = $filename ;
            $cus->CustomerPoint = 0;
            $cus->CustomerPhone = $request->getBodyParam('phone');

            $cus->CUsername = $request->getBodyParam('username');
            $cus->CPasswords = $request->getBodyParam('password');
            $cus->LoginType =   "ลูกค้า";

            $to =$request->getBodyParam('token');
            $userf = $request->getBodyParam('iduserface');
            $usern =$request->getBodyParam('username');
//            return d;
            if($to == null){
                $sql = new Query();
                $sql->select('*')->from('customer')->where('CUsername = "'.$usern.'"');
                $command11 = $sql->createCommand();
                $data = $command11->queryAll();
                if (count($data) == 0){
                    if ($cus->validate()) {
                        file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                        $cus->save();
                        return array('status' => true, 'data' => 'Customer create successfully.');
                    } else {
                        return array('status' => false, 'data' => $cus->getErrors());
                    }
                }else{
                    return array('status' => false, 'data' => 'username ซ้ำกัน.');
                }

            }else{
                $sql2 = new Query();
                $sql2->select('*')->from('customer')->where('iduserface = "'.$userf.'"');
                $command = $sql2->createCommand();
                $data2 = $command->queryAll();
                if(count($data2)==0){
                    if ($cus->validate()) {
                        file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                        $cus->iduserface = $request->getBodyParam('iduserface');
                        $cus->token = $request->getBodyParam('token');
                        $cus->save();
                        return array('status' => true, 'data' => 'Customer create successfully.');
                    } else {
                        return array('status' => false, 'data' => $cus->getErrors());
                    }
                }
                else{
                    return array('status' => false, 'data' => 'iduserfacebook ซ้ำกัน.');
                }

            }




        }
    }

    protected function findModel($iduserface)
    {
        if (($model = Customer::find()->where(['iduserface' => $iduserface])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCustomerlogin()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $username =  Yii::$app->request->getBodyParam('username');
        $pass =  Yii::$app->request->getBodyParam('pass');
        $iduserface =  Yii::$app->request->getBodyParam('iduserface');
        $token =  Yii::$app->request->getBodyParam('token');




        if($iduserface !== null){
            $model = Customer::find()->where(['iduserface' => $iduserface])->one();
            if($model !== null) {
                $cus = $this->findModel($iduserface);

                $cus->attributes = \Yii::$app->request->post();
                $cus->token = $token;
                $cus->save();
                $sql2 = new Query;
                $sql3 = new Query;
                $data3 = array();
                $sql2->select('*')->from('customer')
                    ->where('iduserface = "' . $iduserface . '"');
                $command11 = $sql2->createCommand();
                $data11 = $command11->queryAll();
                foreach ($data11 as $item1) {
                    $data2 =
                        array(
                            "IDCustomer" => $item1['IDCustomer'],
                            "CustomerFName" => $item1['CustomerFName'],

                            "CustomerLName" => $item1['CustomerLName'],
                            "CustomerImage" => "http://udonfooddelivery.xyz/uploads/images/Customer/" . $item1['CustomerImage'],
                            "CustomerPoint" => $item1['CustomerPoint'],
                            "CustomerPhone" => $item1['CustomerPhone'],
                            "CUsername" => $item1['CUsername'],
                            "CPasswords" => $item1['CPasswords'],
                            "LoginType" => $item1['LoginType'],
                            "email" => $item1['email'],
                            "iduserface" => $item1['iduserface'],
                            "token" => $item1['token']


                        );
                    $sql3->select('*')->from('customeraddress')
                        ->where('IDCustomer =' . $item1['IDCustomer'])->andWhere('CustomerAddNo != "null"');
                    $command12 = $sql3->createCommand();
                    $data13 = $command12->queryAll();
                    $d = array('name' => $data2, 'address' => $data13);
                    $data3[] = $d;
                }
                return array('success' => true, 'data' => $data3);
            }else{
                return array('success' => false, 'data' => "iduserface ไม่มีในฐานข้อมูล");

            }

        }else{
            $model = Customer::find()->where(['CUsername' => $username])->andWhere(['CPasswords' => $pass]) ->one();
            if($model !== null){
                $sql2 = new Query;
                $sql3 = new Query;
                $data3 = array();
                $sql2->select('*')->from('customer')
                    ->where('CUsername = "'.$username.'"');
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
                            "iduserface" => $item1['iduserface'],
                            "token" => $item1['token']


                        );
                    $sql3->select('*')->from('customeraddress')
                        ->where('IDCustomer ='.$item1['IDCustomer']);
                    $command12 = $sql3->createCommand();
                    $data13 = $command12->queryAll();
                    $d = array('name'=>$data2,'address'=>$data13);
                    $data3[] = $d;
                }
                return array('success' => true, 'data' => $data3);

            }else{
                return array('success' => false, 'data' => "username and password ไม่มีในฐานข้อมูล");

            }


        }

    }


    public function actionInsertcustomer()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $cus = new Customer();
        $request = Yii::$app->request;
        $cus->scenario = Customer::SCENARIO_CREATE;
        $cus->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $cus->CustomerFName = null;
            $cus->CustomerLName = null;
            $cus->CustomerImage = null;
            $cus->CustomerPoint = 0;
            $cus->CustomerPhone = $request->getBodyParam('phone');
            $cus->CUsername = $request->getBodyParam('username');
            $cus->CPasswords = $request->getBodyParam('password');
            $cus->LoginType = "ลูกค้า";
            if ($cus->validate()) {
//                file_put_contents(Yii::getAlias('@UploadCus') . $filename, base64_decode($param));
                $cus->save();
                return array('status' => true, 'data' => 'Customer create successfully.');
            } else {
                return array('status' => false, 'data' => $cus->getErrors());
            }

        }
    }






}

