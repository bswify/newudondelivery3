<?php

namespace frontend\controllers;

use frontend\models\Fooddetails;
use frontend\models\FooddetailsSearch;
use frontend\models\Restaurant;
use Yii;
use frontend\models\Food;
use frontend\models\FoodSearch;

use yii\base\Model;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodController implements the CRUD actions for Food model.
 */
class FoodController extends Controller
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
     * Lists all Food models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userid = Yii::$app->user->identity->id;

        $searchModel = new FoodSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search($userid);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Food model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $searchModel = new FooddetailsSearch();
        $dataProvider = $searchModel->search($id);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Food model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $food = new Food();
//        $fooddetails = new Fooddetails();
        $userid = Yii::$app->user->identity->id;
        $resId = $this->searchResId($userid);
        $resID = null;

        foreach ($resId as $item) {
            $resID = ($item->IDRestaurant);
        }

        // save food
        $food->IDRestaurant = $resID;

        if ($food->load(Yii::$app->request->post()) && $food->validate()) {
           $food->FoodImg = $food->upload($food, 'FoodImg');
            $food->save();
//            $fooddetails->IDFood = $food->IDFood;
            Yii::$app->session->setFlash('success', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
            return $this->redirect(['view', 'id' => $food->IDFood]);


        } else {
            return $this->render('create', [
                'food' => $food,
//                'fooddetails' => $fooddetails,
            ]);
        }
    }

    public function insertFooddetail($idfood)
    {
        $fooddetails = new Fooddetails();
//        $fooddetails->IDFood = $idfood;
        if ($fooddetails->load(Yii::$app->request->post()) && $fooddetails->save()) {

//            Yii::$app->session->setFlash('success', 'เพิ่มข้อมูลเรียบร้อยแล้ว'.$model->IDFood);
            return $this->redirect(['view', 'id' => $idfood]);

        }
    }

    /**
     * Updates an existing Food model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $food = $this->findModel($id);
//        $fooddetails = $this->findidFooddetails($id);
//        $foodDetail = null;
        $userid = Yii::$app->user->identity->id;
        $resId = $this->searchResId($userid);
        $resID = null;


        foreach ($resId as $item) {
            $resID = ($item->IDRestaurant);
        }

        $food->IDRestaurant = $resID;



//        $foodDetail = $fooddetails[0];


        if ($food->load(Yii::$app->request->post()) && $food->validate()) {
             $food->FoodImg = $food->upload($food, 'FoodImg');
            $food->save();
//            $foodDetail->IDFood = $food->IDFood;

//            if ($foodDetail->load(Yii::$app->request->post()) && $foodDetail->save()) {

                Yii::$app->session->setFlash('success', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
                return $this->redirect(['view', 'id' => $food->IDFood]);

//            }
        } else {
            return $this->render('update', [
                'food' => $food,
//                'fooddetails' => $foodDetail,
            ]);
        }


    }

    /**
     * Deletes an existing Food model.
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

        $fooddt = $this->findidFooddetails($id);

        foreach ($fooddt as $item) {
            Fooddetails::findOne($item->IDFoodDetails)->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Food model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Food the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Food::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

//    protected function findModelFooddetails($id)
//    {
//        if (($model = Fooddetails::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }

    /**
     * @param $userid
     * @return mixed
     */
    private function searchResId($userid)
    {
        return Restaurant::find()
            ->select('IDRestaurant')
            ->distinct(true)
            ->where(['IDUser' => $userid])
            ->all();
    }

    private function searchFoodId($resId)
    {
        return Food::find()
            ->select('	IDFood')
            ->distinct(true)
            ->where(['IDRestaurant' => $resId])
            ->all();
    }

    private function findidFooddetails($foodid)
    {
        return Fooddetails::find()
            ->select('*')
            ->distinct(true)
            ->where(['IDFood' => $foodid])
            ->all();
    }
}
