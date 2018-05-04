<?php

namespace frontend\controllers;

use frontend\models\Food;
use Yii;
use frontend\models\Fooddetails;
use frontend\models\FooddetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FooddetailsController implements the CRUD actions for Fooddetails model.
 */
class FooddetailsController extends Controller
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
     * Lists all Fooddetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userid = Yii::$app->user->identity->id;

        $searchModel = new FooddetailsSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search($userid);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fooddetails model.
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
     * Creates a new Fooddetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
//        $userid = Yii::$app->user->identity->id;
//        $resId = $this->searchResId($userid);
//        $foodid = $this->searchFoodId($resId);

        $model = new Fooddetails();
//        $model->IDFood = $foodid[0];

        if ($model->load(Yii::$app->request->post()) ) {
            $model->IDFood = $id;
            $model->save();
            return $this->redirect(['food/view', 'id' => $model->IDFood]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fooddetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['food/view', 'id' => $model->IDFood]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fooddetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $this->findModel($id)->delete();

        return $this->redirect(['food/view', 'id' => $model->IDFood]);
//        return $this->redirect(['index']);
    }

    /**
     * Finds the Fooddetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fooddetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fooddetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //ค้นหารหัสร้าน
    private function searchResId($userid)
    {
        return Restaurant::find()
            ->select('IDRestaurant')
            ->distinct(true)
            ->where(['IDUser' => $userid])
            ->all();
    }

   // ค้นหารหะสอาหาร
    private function searchFoodId($resId)
    {
        return Food::find()
            ->select('	IDFood')
            ->distinct(true)
            ->where(['IDRestaurant' => $resId])
            ->all();
    }
}
