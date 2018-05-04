<?php

namespace backend\controllers;

use backend\models\Orders;
use Yii;
use backend\models\Orderdetails;
use backend\models\OrderdetailsSearch;
use yii\db\Exception;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderdetailsController implements the CRUD actions for Orderdetails model.
 */
class OrderdetailsController extends Controller
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
     * Lists all Orderdetails models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderdetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orderdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orderdetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDOrderDetails]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orderdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $totalprice2 = 0;
        $model = $this->findModel($id);
        $model2 = $this->findModel2($model->IDOrder);

//        print("<pre>".print_r($model3,true)."</pre>");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model3 = $this->findModel3($model->IDOrder);
            foreach ($model3 as $value) {
                $totalprice = ($value['FoodPrice'] + $value['FoodDetailsPrice']) * $value['AmountFood'];
                $totalprice2 = $totalprice2 + $totalprice;
            }
            $model2->OrderTotalPrice = $totalprice2 + $model2->deliveries->DeliveryPrice;
            $model2->save();
            return $this->redirect(['/orders/view', 'id' => $model->IDOrder]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Orderdetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->findModel($id)->delete();


        return $this->redirect(['/orders/view', 'id' => $model->IDOrder]);
    }

    /**
     * Finds the Orderdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orderdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orderdetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel2($id)
    {
        if (($model2 = Orders::findOne($id)) !== null) {
            return $model2;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findModel3($id)
    {
        $model3 = new Query;
        $model3->select('*')->from('orderdetails')
            ->join('INNER JOIN', 'food', 'food.IDFood = orderdetails.IDFood')
            ->join('INNER JOIN', 'fooddetails', 'fooddetails.IDFoodDetails = orderdetails.IDFoodDetails')
            ->where('orderdetails.IDOrder = ' . $id);
        $command = $model3->createCommand();
        $data = $command->queryAll();

        if (($data) !== null) {
            return $data;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
