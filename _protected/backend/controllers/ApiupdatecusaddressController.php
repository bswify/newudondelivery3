<?php

namespace backend\controllers;

use backend\models\CustomerAddress;
use backend\models\Orders;
use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;


class ApiupdatecusaddressController extends Controller
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



    protected function findModel($id)
    {
        if (($model = CustomerAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * @return array
     */
    public function actionUpdatecustomeraddress($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        
        $cusadd = $this->findModel($id);
        $request = Yii::$app->request;

        $cusadd->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $cusadd->CustomerAddNo = $request->getBodyParam('CustomerAddNo');
            $cusadd->CustomerAddRoad = $request->getBodyParam('CustomerAddRoad');
            $cusadd->IDCustomer = $request->getBodyParam('IDCustomer');

            if ($cusadd->validate()) {
                $cusadd->save();
                return array('status' => true, 'data' => 'CustomerAddress update successfully.');
            } else {
                return array('status' => false, 'data' => $cusadd->getErrors());
            }

        }
    }

    public function actionDeletecustomeraddress($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $id =  Yii::$app->request->get('id');
        $d = Orders::find()->where(['IDCustomerAddress' => $id])->one();
        if($d !== null){
            return array('status' => true, 'data' => 'CustomerAddress can not delete.');
        }else{
            $this->findModel($id)->delete();
            return array('status' => true, 'data' => 'CustomerAddress delete successfully.');
        }


    }
//
//    protected function findModelorder($id)
//    {
//        if (($model2 = Orders::find()->where(['IDCustomerAddress' => $id])->one()) !== null) {
//            return $model2;
//        }
//        else{
//
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
