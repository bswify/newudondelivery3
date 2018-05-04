<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Resreview;

class ResreviewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'this is test' ; exit;
        return $this->render('index');
    }

    public function actionCreateResreview(){
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
