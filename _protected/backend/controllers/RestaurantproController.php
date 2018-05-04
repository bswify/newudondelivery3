<?php

namespace backend\controllers;

use Yii;
use backend\models\Restaurant;
use backend\models\RestaurantproSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RestaurantproController implements the CRUD actions for Restaurant model.
 */
class RestaurantproController extends Controller
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
     * Lists all Restaurant models.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $searchModel = new RestaurantproSearch();

        $date = 2018 - 02 - 21;

//        $queryParams = array_merge(array(),Yii::$app->request->getQueryParams());
//        $queryParams["RestaurantproSearch"]["ResPromotionStart"] = $date ;
//        $queryParams["RestaurantproSearch"]["ResPromotionEnd"] = $date ;
//        $dataProvider = $searchModel->search($queryParams);


//        $searchModel->ResPromotionStart = 2018 - 02 - 21;
//        $searchModel->ResPromotionEnd = 2018-02-20;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $dataProvider = $searchModel->search(RestaurantproSearch%5BResPromotionStart%5D=2018-02-20&RestaurantproSearch%5BResPromotionEnd%5D=2018-02-20);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

//
//        $dataProvider = new ActiveDataProvider('Restaurantpro');
//        $this->sandAjaxResponse($dataProvider);


    }

    /**
     * Displays a single Restaurant model.
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
     * Creates a new Restaurant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Restaurant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Restaurant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Restaurant model.
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
     * Finds the Restaurant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Restaurant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Restaurant::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function sandAjaxResponse(AjaxResponseInterface $model)
    {

        header('Content-type : Application/json', true, 200);
        echo json_encode([
            'data' => $model->getData(),
            'errors' => $model->getError()
        ]);
        yii::app()->end();
    }

    public function actionListpromotion()
    {
        \yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        echo date('Y-m-d H:i:s');
        echo "<br>";
        echo date('Y-m-d');

        $dateNow = date('Y-m-d');

        $query = new Query;
        $query->select([
                'restaurant.IDRestaurant',
                'restaurant.ResName',
                'restaurant.ResLowPrice',
                'restaurant.ResImg',
                'respromotion.ResPromotionName',
                'respromotion.ResPromotionStart',
                'respromotion.ResPromotionEnd'
            ]
        )
            ->from('respromotion')
            ->join('INNER JOIN', 'restaurant',
                'respromotion.IDRestaurant = restaurant.IDRestaurant')
            ->andFilterWhere(['<=', 'respromotion.ResPromotionStart', $dateNow])
            ->andFilterWhere(['>=', 'respromotion.ResPromotionEnd', $dateNow]);

        $command = $query->createCommand();
        $data = $command->queryAll();


//        print("<pre>" . print_r($data, true) . "</pre>");

        if (count($data) > 0) {
            return array('status' => true, 'data' => $data);
        } else {
            return array('status' => false, 'data' => 'No data');
        }
    }
}
