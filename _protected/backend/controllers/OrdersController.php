<?php

namespace backend\controllers;


use backend\models\Customer;
use backend\models\Delivery;
use backend\models\Deliverytime;
use backend\models\DeliverytimeSearch;
use backend\models\Orderdetails;
use backend\models\OrderdetailsSearch;

use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
use Yii;
use backend\models\Orders;
use backend\models\OrdersSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

//        $model = new Deliverytime();
//        $searchModel2 = new DeliverytimeSearch();
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

//        echo '<pre>',print_r($this->findDelivery($id),1),'</pre>';
//        $dd = $searchModel2->search($model->IDDeliveryTime);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
//            'model2' => $model->IDDeliveryTime,
//            'delivery' => $this->findDelivery($id),
        ]);
    }

    public function actionViewpdf($id)
    {

//        $model = new Deliverytime();
//        $searchModel2 = new DeliverytimeSearch();
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);
//        echo '<pre>',print_r($this->findDelivery($id),1),'</pre>';
//        $dd = $searchModel2->search($model->IDDeliveryTime);

        return $this->render('viewpdf', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
//            'model2' => $model->IDDeliveryTime,
//            'delivery' => $this->findDelivery($id),
        ]);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function actionMpdfdemo1($id)
    {
        $model = \backend\models\Orders::findOne($id);
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

        $content = $this->renderPartial('viewpdf', [
            'model' => $model,
//            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // etc...
        ]);
        
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
//            'mode' => Pdf::MODE_ASIAN,
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
//            'destination' => Pdf::DEST_FILE,
//            'format' => Pdf::FORMAT_A4,
            'format' => [100, 236],
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Factuur',
//                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
//                'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
//                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);

        return $pdf->render();
    }


    public function actionPdf($id)
    {
        $case_molecular = Orders::findOne(['IDOrder' => $id]);
        $patient_case = Orderdetails::findOne(['IDOrder' => $id]);


        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_preview', [
            'case_molecular' => $case_molecular,
            'patient_case' => $patient_case,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@appRoot3/_protected/backend/controllers/pdf.css',
            // any css to be embedded if required
            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Preview Report Case: ' . $id],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDOrder]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDOrder]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel3($idc)
    {
        if (($model = Customer::findOne($idc)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel2($id)
    {
        if (($model = Delivery::find()->where('IDOrder' == $id)->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionStatus1($id)
    {
        $model = $this->findModel($id);

        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

        $model->OrderStatus = "ยืนยันการสั่งซื้อ";
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();
        return $this->redirect(['view',
            'id' => $model->IDOrder,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }
    }

    public function actionStatus2($id)
    {
        $model = $this->findModel($id);
        $model->OrderStatus = "กำลังดำเนินการ";

        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();
        return $this->redirect(['view',
            'id' => $model->IDOrder,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }
    }

    public function actionStatus3($id)
    {
        $model = $this->findModel($id);

        $model->OrderStatus = "กำลังจัดส่ง";
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();
        return $this->redirect(['view',
            'id' => $model->IDOrder,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }
    }

    public function actionPdf2()
    {

        $model = new Orders();
        $searchModel = new OrdersSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $content = $this->renderPartial('viewpdf2', [
            'model' => $model,
//            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // etc...
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
//            'mode' => Pdf::MODE_ASIAN,
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
//            'destination' => Pdf::DEST_FILE,
//            'format' => Pdf::FORMAT_A4,
            'format' => [100, 236],
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Factuur',
//                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
//                'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
//                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);

        return $pdf->render();

    }

    public function actionStatus4($id,$idc)
    {
        $model = $this->findModel($id);
        $cus = $this->findModel3($idc);
        $cus->CustomerPoint = $cus->CustomerPoint + 1;
        $cus->save();

        $model->OrderStatus = "จัดส่งแล้ว";
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();
        return $this->redirect(['view',
            'id' => $model->IDOrder,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }
    }

    public function actionStatus5($id)
    {
        $model = $this->findModel($id);

        $model->OrderStatus = "ไม่พบผู้สั่งซื้อ";
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search($id);

//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $model->save();
        return $this->redirect(['view',
            'id' => $model->IDOrder,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }
    }

//    public function actionView2($id)
//    {
//        return $this->render('/orderdetails/view', [
//            'model' => $this->findModel($id),
//        ]);
//    }


    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDOrder]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete2($id)
    {
        $this->findModel($id)->delete();
        $model = $this->findModel($id);

        return
            $this->redirect(['view', 'id' => $model->IDOrder]);
    }

}
