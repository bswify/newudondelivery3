<?php

namespace backend\controllers;

use Yii;
use backend\models\Resreview;
use backend\models\ResreviewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResreviewController implements the CRUD actions for Resreview.php model.
 */
class ResreviewController extends Controller
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
     * Lists all Resreview.php models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResreviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resreview.php model.
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
     * Creates a new Resreview.php model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resreview();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           // $model->ResReviewImage = $model->upload($model,'ResReviewImage');
             $model->ResReviewImage = 'http://udonfooddelivery.xyz/uploads/images/Resreview.php/'.$model->upload($model,'ResReviewImage');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDResReview]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->IDResReview]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Resreview.php model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //$model->ResReviewImage = $model->upload($model,'ResReviewImage');
             $model->ResReviewImage = 'http://udonfooddelivery.xyz/uploads/images/Resreview.php/'.$model->upload($model,'ResReviewImage');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDResReview]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->IDResReview]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }

    /**
     * Deletes an existing Resreview.php model.
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
     * Finds the Resreview.php model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resreview the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resreview::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
