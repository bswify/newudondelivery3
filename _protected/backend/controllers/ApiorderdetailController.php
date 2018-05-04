<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use backend\models\Orderdetails;
use backend\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
//use yii\rest\Controller;
use yii\filters\VerbFilter;

use yii\web\NotFoundHttpException;
use yii\web\Response;


class ApiorderdetailController extends Controller
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

    public function actionImportorderdetail()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $model = $this->findModel2($id);
//        $data = \moonland\phpexcel\Excel::widget([
//            'mode' => 'import',
//            'fileName' => Yii::getAlias('@uploadExcelUrl') . '/' . $model->excelName, //path จริงที2อยู่ไฟล์
//            'getOnlySheet' => 'Sheet1',
//        ]);
        $data = Yii::$app->request;
        //insert data array to table
        foreach ($data as $key => $value) {
            Yii::$app->db->createCommand()->insert('orderdetails', [
                'IDFood' => $value['idfood'],
                'IDFoodDetails' => $value['idfooddetail'],
                'AmountFood' => $value['amount'],
                'IDOrder' => $value['idorder'],
            ])->execute();
        }
        return array('status' => true, 'data' => 'Orders create successfully.');
    }
    protected function findModel2($id)
    {
        if (($model = Orderdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //เพิ่ม

    /**
     * @return array
     */
    public function actionInsertorderdetail()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $orderdetail = new Orderdetails();
        $request = Yii::$app->request;
        $orderdetail->scenario = Orderdetails::SCENARIO_CREATE;
        $orderdetail->attributes = \Yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $orderdetail->IDFood = $request->getBodyParam('idfood');
            $orderdetail->IDFoodDetails = $request->getBodyParam('idfooddetail');
            $orderdetail->AmountFood = $request->getBodyParam('amount');
            $orderdetail->IDOrder = $request->getBodyParam('idorder');
            if ($orderdetail->validate()) {
                $orderdetail->save();
                return array('status' => true, 'data' => 'Orders create successfully.');
            } else {
                return array('status' => false, 'data' => $orderdetail->getErrors());
            }

        }
    }


    //ลบ

    /**
     * @return array
     */
    public function actionDeleteorderdetail($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id =  Yii::$app->request->get('id');

        $this->findModel($id)->delete();
        return array('status' => true, 'data' => 'Orders delete successfully.');
    }
    protected function findModel($id)
    {
        if (($model = Orderdetails::find()->select('*')->from('orderdetails')->where('IDOrder = '.$id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}

