<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Resreview;
use backend\models\ResreviewSearch;


class Apigetreviewres2Controller extends Controller
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

    public function actionCreateResreview2(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $resreview = new Resreview();
        $resreview->scenario = Resreview::SCENARIO_CREATE;
        $resreview->attributes = \Yii::$app->request->post();

        if($resreview->validate()){
            return array('status'=>true);
        }
        else{
            return array('status'=> false,'data'=>$resreview->getErrors());
        }
    }



}
