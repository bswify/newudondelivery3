<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\Employee;
use backend\models\Favoritemenu;
use backend\models\Fooddetails;
use backend\models\Location;
use backend\models\Locationtype;
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


class ApiemproyeeController extends Controller
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


    /**
     * @return array
     */
    public function actionListemp($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $sql = new Query();
        $sql->select('*')->from('employee')
            ->where('IDEmp = '.$id);
        $command = $sql->createCommand();
        $data = $command->queryAll();


        return array('success' => true, 'data' => $data);



    }

    public function actionListorderbyemp($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $sql = new Query();
        $sql3 = new Query();
        $sql4 = new Query();
        $sql5 = new Query();
        $sql->select('*')->from('orders')
            ->join('INNER JOIN','employee','employee.IDEmp = orders.IDEmp')
            ->join('INNER JOIN','payment','payment.IDPaymant = orders.IDPaymant')
            ->join('INNER JOIN','customeraddress','customeraddress.IDCustomerAddress = orders.IDCustomerAddress')
            ->where('orders.IDEmp = '.$id);
        $command = $sql->createCommand();
        $data = $command->queryAll();
        foreach ($data as $item1) {
            $data1 =
                array(
                    "IDOrder"=> $item1['IDOrder'],
                    "OrderDate"=> $item1['OrderDate'],
                    "OrderNote"=> $item1['OrderNote'],
                    "OrderTotalPrice"=> $item1['OrderTotalPrice'],
                    "OrderStatus"=> $item1['OrderStatus'],
                    "Orderpayprice"=> $item1['Orderpayprice'],
                    "PaymentName"=> $item1['PaymentName'],
                    "EmpFName"=> $item1['EmpFName'],
                    "EmpLname"=> $item1['EmpLname'],
                    "CustomerAddNo"=> $item1['CustomerAddNo'],
                    "CustomerAddRoad"=> $item1['CustomerAddRoad'],
                    "map"=> $item1['map'],
                );

            $sql3->select('*')->from('orderdetails')
                ->where('orderdetails.IDOrder = ' . $item1['IDOrder']);
            $command3 = $sql3->createCommand();
            $data13 = $command3->queryAll();
            foreach ($data13 as $item2) {
                $data2 =
                    array(
                        "IDOrderDetails"=> $item2['IDOrderDetails'],
                        "AmountFood"=> $item2['AmountFood'],
                    );
                $data5[] = $data2;

                $sql4->select('*')->from('food')->where('IDFood = ' . $item2['IDFood']);
                $command4 = $sql4->createCommand();
                $data14 = $command4->queryAll();
                foreach ($data14 as $item3) {
                    $data4 =
                        array(
                            "FoodName"=> $item3['FoodName'],
                            "FoodPrice"=> $item3['FoodPrice'],
                            "FoodImg"=> $item3['FoodImg'],
                            "IDFoodType"=> $item3['IDFoodType'],
//
                    );
                    $data5[] = $data4;
                }
                $sql5->select('*')->from('fooddetails')->where('IDFoodDetails = '.$item2['IDFoodDetails']);
                $command5 = $sql5->createCommand();
                $data15 = $command5->queryAll();
                foreach ($data15 as $item4) {
                    $data55=
                        array(
                            "FoodDetailName"=> $item4['FoodDetailName'],
                            "FoodDetailsPrice"=> $item4['FoodDetailsPrice'],
                        );
                    $data5[] = $data55;
                }

            }

            $data4 = array("order" =>$data1,"food" =>$data5);
            $data5 = null;
//            $data2 = null;
            $data3[] = $data4;
        }


        return array('success' => true, 'data' => $data3);



    }


    public function actionEmplogin()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $username =  Yii::$app->request->getBodyParam('username');
        $pass =  Yii::$app->request->getBodyParam('pass');

        $model = Employee::find()->where(['EUsername' => $username])->andWhere(['Epasswords' => $pass])->one();
        if($model !== null){
            foreach ($model as $item){
                $data = array(
                    "IDEmp" => $item['IDEmp'],
                    "EmpFName" => $item['EmpFName'],
                    "EmpLname" => $item['EmpLname'],
                    "EmpPhone"=>$item['EmpPhone'],
                    "EUsername"=> $item['EUsername'],
                    "Epasswords"=>$item['Epasswords'],
                    "LoginType"=>$item['LoginType']
                );
            }
            return array('success' => true, 'data' => $data);
        }else{
            return array('success' => true, 'data' => "username และ password ไม่ถูกต้อง");
        }


    }

    public function actionEmpvieworder($id)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $dataall = array();
        $foof = array();
        $order = new Query();
        $orderd = new Query();
        $order->select('*')
            ->from('orders')
            ->join('INNER JOIN','payment','orders.IDPaymant = payment.IDPaymant')
            ->join('INNER JOIN','customer','orders.IDCustomer = customer.IDCustomer')
            ->join('INNER JOIN','employee','orders.IDEmp =  employee.IDEmp ')
            ->join('INNER JOIN','customeraddress','orders.IDCustomerAddress = customeraddress.IDCustomerAddress')

            ->where('orders.IDEmp = "'.$id.'"')
            ->andWhere('orders.OrderStatus != "รอการยืนยัน"')
            ->andWhere('orders.OrderStatus != "จัดส่งแล้ว"')
            ->andWhere('orders.OrderStatus != "ไม่พบผู้รับ"')
        ;
        $com = $order->createCommand();
        $do = $com->queryAll();

            foreach ($do as $item){

                $loca = Location::find()->where('LocationName = "'.$item['CustomerAddRoad'].'"')->one();

                if($loca !== null){
                    $loca2 = Locationtype::findOne($loca->IDLocationType);
                    $loo = $loca2->LocationTypeName;
                }else{
                    $loo = "เลือกจากแผ่นที่";
                }


                $orderd = new Query();
                $data = array(
                    "IDOrder" => $item['IDOrder'],
                    "OrderDate" => $item['OrderDate'],
                    "OrderNote" => $item['OrderNote'],
                    "OrderTotalPrice"=>$item['OrderTotalPrice'],
                    "OrderStatus"=> $item['OrderStatus'],
                    "IDPaymant"=>$item['IDPaymant'],
                    "PaymentName"=>$item['PaymentName'],
                    "IDCustomer"=>$item['IDCustomer'],
                    "CustomerFName"=>$item['CustomerFName'],
                    "CustomerLName"=>$item['CustomerLName'],
                    "CustomerPhone"=>$item['CustomerPhone'],
                    "IDEmp"=> $item['IDEmp'],
                    "EmpFName"=>$item['EmpFName'],
                    "EmpLname"=>$item['EmpLname'],
                    "IDCustomerAddress"=>$item['IDCustomerAddress'],
                    "CustomerAddNo"=> $item['CustomerAddNo'],
                    "CustomerAddRoad"=> $loo." ".$item['CustomerAddRoad'],
                    "map"=>$item['map'],
                    "Orderpayprice"=>$item['Orderpayprice']
                );

                $orderd->select('*')
                    ->from('orderdetails')
                    ->join('INNER JOIN','food','orderdetails.IDFood = food.IDFood')
                    ->join('INNER JOIN','restaurant','food.IDRestaurant = restaurant.IDRestaurant')

                    ->where('IDOrder = '.$item['IDOrder'])

                    ;
                $com1 = $orderd->createCommand();
                $orderd1 = $com1->queryAll();

                foreach ($orderd1 as $item1){

                    $pl = Fooddetails::findOne($item1['IDFoodDetails']);
                    if($pl !== null){
                        $fdn = $pl->FoodDetailName;
                        $fdp = $pl->FoodDetailsPrice;
                    }else{
                        $fdn = null;
                        $fdp = null;
                    }
                    $dataoderd = array(
                        "IDOrderDetails"=>$item1['IDOrderDetails'],
                        "IDFood"=>$item1['IDFood'],
                        "FoodImg"=>"http://udonfooddelivery.xyz/uploads/images/Food/".$item1['FoodImg'],
                        "FoodName"=>$item1['FoodName'],
                        "FoodPrice"=>$item1['FoodPrice'],
                        "IDFoodType"=>$item1['IDFoodType'],
                        "IDRestaurant"=>$item1['IDRestaurant'],
                        "ResName"=>$item1['ResName'],
                        "MenuTypeName"=>$item1['MenuTypeName'],
                        "IDFoodDetails"=>$item1['IDFoodDetails'],
                        "AmountFood"=>$item1['AmountFood'],
                        "IDOrder"=>$item1['IDOrder'],
                        "reason"=>$item1['reason'],
                        "FoodDetailName"=> $fdn,
                        "FoodDetailsPrice"=> $fdp,


                    );


                    $foof[]=$dataoderd;
                }

                $f = array('order'=> $data,'food'=>$foof);
                $dataall[] = $f;
                $foof=null;
            }
            return array('success' => true, 'data' => $dataall);




    }


    public function actionEmpupdateorder()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $status =  Yii::$app->request->getBodyParam('status');
        $idorder =  Yii::$app->request->getBodyParam('idorder');

        $model = Orders::findOne($idorder);

        if($model !== null){
            $model->OrderStatus = $status;
            $model->save();
            return array('status' => true, 'data' => "Update Status Order successfully.");
        }else{
            return array('status' => true, 'data' => "Can not Update Status Order.");
        }




    }






}

