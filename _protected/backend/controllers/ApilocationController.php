<?php

namespace backend\controllers;

use Yii;
use yii\db\mssql\PDO;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;


class ApilocationController extends Controller
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
    public function actionListlocationall()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


//        $iddd =  Yii::$app->request->get('id');
//        $idR = $iddd;
        $sql2 = new Query;
        $data3 = array();
        $sql2->select('*')->from('location');

        $command11 = $sql2->createCommand();
        $data11 = $command11->queryAll();
        foreach ($data11 as $item1) {
            $data2 =
                array(
                    "IDLocation" => $item1['IDLocation'],
                    "LocationName" => $item1['LocationName'],
                    "IDLocationType" => $item1['IDLocationType'],
                    "letlng" => $item1['letlng']
                );
            $data3[] = $data2;
        }
        return array('success' => true, 'data' => $data3);
    }
    public function actionListlocationbytype()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $sql1 = new Query;
        $data1 = array();
        $sql1->select('*')->from('location')
        ->where('IDLocationType = 2');
        $command1 = $sql1->createCommand();
        $data11 = $command1->queryAll();
        foreach ($data11 as $item1) {
            $data1g =
                array(
                    "IDLocation" => $item1['IDLocation'],
                    "LocationName" => $item1['LocationName'],
                    "IDLocationType" => $item1['IDLocationType'],
                    "letlng" => $item1['letlng']
                );
            $data1[] = $data1g;
        }

        $sql2 = new Query;
        $data2 = array();
        $sql2->select('*')->from('location')
            ->where('IDLocationType = 3');
        $command2 = $sql2->createCommand();
        $data22 = $command2->queryAll();
        foreach ($data22 as $item2){
            $data2g =
                array(
                    "IDLocation" => $item2['IDLocation'],
                    "LocationName" => $item2['LocationName'],
                    "IDLocationType" => $item2['IDLocationType'],
                    "letlng" => $item2['letlng']
                );
            $data2[] = $data2g;
        }
        $sql3 = new Query;
        $data3 = array();
        $sql3->select('*')->from('location')
            ->where('IDLocationType = 4');
        $command3 = $sql3->createCommand();
        $data33 = $command3->queryAll();
        foreach ($data33 as $item3){
            $data2g =
                array(
                    "IDLocation" => $item3['IDLocation'],
                    "LocationName" => $item3['LocationName'],
                    "IDLocationType" => $item3['IDLocationType'],
                    "letlng" => $item3['letlng']
                );
            $data3[] = $data2g;
        }
        $dataa = array("Alley" => $data1,"Road" => $data2,"village"=> $data3);
        return array('success' => true, 'data' => $dataa);
    }

    public function actionListlocationtype($type)
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $type =  Yii::$app->request->get('type');
        $sql1 = new Query;
        $data1 = array();
        $sql1->select('*')->from('location')
            ->join('INNER JOIN','locationtype','locationtype.IDLocationType = location.IDLocationType')
            ->where('locationtype.LocationTypeName = \''.$type.'\'');
        $command1 = $sql1->createCommand();
        $data11 = $command1->queryAll();
        foreach ($data11 as $item1) {
            $data1g =
                array(
                    "IDLocation" => $item1['IDLocation'],
                    "LocationName" => $item1['LocationName'],
                    "IDLocationType" => $item1['IDLocationType'],
                    "letlng" => $item1['letlng']
                );
            $data1[] = $data1g;
        }


//        $dataa = array("Alley" => $data1,"Road" => $data2,"village"=> $data3);
        return array('success' => true, 'data' => $data1);
    }
}
