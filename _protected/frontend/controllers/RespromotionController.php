<?php

namespace frontend\controllers;

use frontend\models\Restaurant;
use Yii;
use frontend\models\Respromotion;
use frontend\models\RespromotionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RespromotionController implements the CRUD actions for Respromotion model.
 */
class RespromotionController extends Controller
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
     * Lists all Respromotion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userid = Yii::$app->user->identity->id;

        $searchModel = new RespromotionSearch();
        $dataProvider = $searchModel->search($userid);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Respromotion model.
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
     * Creates a new Respromotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$model = new Respromotion();
        //$foodSearch = new RespromotionSearch();
//ดึงรหัสรา้นและรหัสยูเซอมา
        $model = new Respromotion();
        $userid = Yii::$app->user->identity->id;
        $resId = $this->searchResId($userid);

        $resID = null;

        foreach ($resId as $item) {
            $resID = ($item->IDRestaurant);
        }

        $model->IDRestaurant = $resID;



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDResPromotion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

        //เแก้ไข

    }

    /**
     * Updates an existing Respromotion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->IDResPromotion]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);

       // $model = new Respromotion();
        $userid = Yii::$app->user->identity->id;
        $resId = $this->searchResId($userid);

        $resID = null;

        foreach ($resId as $item) {
            $resID = ($item->IDRestaurant);
        }

        $model->IDRestaurant = $resID;



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDResPromotion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Respromotion model.
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
     * Finds the Respromotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Respromotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Respromotion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    private function searchResId($userid)
    {
        return Restaurant::find()
            ->select('IDRestaurant')
            ->distinct(true)
            ->where(['IDUser' => $userid])
            ->all();
    }
}
