<?php

namespace backend\controllers;

use backend\models\CustomerAddress;
use backend\models\Location;
use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;


class ApiinsertcusaddressController extends Controller
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


    protected function findModello($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return array
     * @throws \yii\db\Exception
     */
    public function actionInsertcustomeraddress()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $id =  Yii::$app->request->get('id');

        $cusadd = new CustomerAddress();
        $request = Yii::$app->request;
        $cusadd->scenario = CustomerAddress::SCENARIO_CREATE;
        $cusadd->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {

            $cusadd->CustomerAddNo = $request->getBodyParam('CustomerAddNo');

            $lo = $this->findModello($request->getBodyParam('IDLocation'));
            $cusadd->CustomerAddRoad = $lo->LocationName;
//            $cusadd->IDCustomerAddRoad = $request->getBodyParam('IDCustomerAddRoad');
            $cusadd->map = $lo->letlng;
            $cusadd->IDCustomer = $request->getBodyParam('IDCustomer');

            if ($cusadd->validate()) {
                $cusadd->save();
                return array('status' => true, 'data' => 'CustomerAddress create successfully.');
            } else {
                return array('status' => false, 'data' => $cusadd->getErrors());
            }

        }
    }


    public function actionInsertcustomeraddressbymap()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $id =  Yii::$app->request->get('id');

        $cusadd = new CustomerAddress();
        $request = Yii::$app->request;
        $cusadd->scenario = CustomerAddress::SCENARIO_CREATE;
        $cusadd->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {

//            $cusadd->CustomerAddNo = ;
//            $cusadd->CustomerAddRoad = "-";
            $cusadd->map = $request->getBodyParam('map');
            $cusadd->IDCustomer = $request->getBodyParam('IDCustomer');

            if ($cusadd->validate()) {
                $cusadd->save();
                return array('status' => true, 'data' => 'CustomerAddressbymap create successfully.');
            } else {
                return array('status' => false, 'data' => $cusadd->getErrors());
            }

        }
    }
}
