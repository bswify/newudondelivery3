<?php

namespace backend\controllers;

use backend\models\Favoritemenu;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\helpers\Json;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use backend\models\Resreview;
use backend\models\ResreviewSearch;
use yii\web\Response;
//use yii\rest\Controller;


class ApiinsertfavoritmenuController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;


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
     */
    public function actionInsertfavoritmenu()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $favoritmenu = new Favoritemenu();
        $request = Yii::$app->request;

        $favoritmenu->scenario = Favoritemenu::SCENARIO_CREATE;
        $favoritmenu->attributes = \Yii::$app->request->post();
        if (Yii::$app->request->post()) {

            $favoritmenu->IDFood = $request->getBodyParam('idfood');
            $favoritmenu->IDCustomer = $request->getBodyParam('idcustomer');
            if ($favoritmenu->validate()) {
                $favoritmenu->save();
                return array('status' => true, 'data' => 'Resreview create successfully.');
            } else {
                return array('status' => false, 'data' => $favoritmenu->getErrors());
            }

        }
    }





}