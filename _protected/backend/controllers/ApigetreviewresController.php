<?php

namespace backend\controllers;

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


class ApigetreviewresController extends Controller
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
     * @return array
     */

    public function actionCreateResreview()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $resreview = new Resreview();
        $resreview->scenario = Resreview::SCENARIO_CREATE;
        $resreview->attributes = \Yii::$app->request->post();


        if ($resreview->validate()) {
            $resreview->save();
            return array('status' => true, 'data' => 'Resreview create successfully.');
        } else {
            return array('status' => false, 'data' => $resreview->getErrors());
        }
    }



    /**
     */
    public function actionInsertresreview()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $resreview = new Resreview();
        $request = Yii::$app->request;

        $resreview->scenario = Resreview::SCENARIO_CREATE;
        $resreview->attributes = \Yii::$app->request->post();
        if (Yii::$app->request->post()) {


            $param = $request->getBodyParam('img');
            $filename = $request->getBodyParam('imgname').date("Y-m-d_H-i-s") . '.png';
            $resreview->ResReviewImage = $filename;
            $resreview->ResReviewScore = $request->getBodyParam('res_score');
            $resreview->ResReviewDate = $request->getBodyParam('date');
            $resreview->ResComment = $request->getBodyParam('res_comment');
            $resreview->IDRestaurant = $request->getBodyParam('id_restaurant');
            $resreview->IDCustomer = $request->getBodyParam('id_customer');
            if ($resreview->validate()) {
                file_put_contents(Yii::getAlias('@UploadResReview') . $filename, base64_decode($param));
                $resreview->save();
                return array('status' => true, 'data' => 'Resreview create successfully.');
            } else {
                return array('status' => false, 'data' => $resreview->getErrors());
            }

        }
    }





}