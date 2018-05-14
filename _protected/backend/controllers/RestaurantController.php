<?php

namespace backend\controllers;

use frontend\models\User;
use Yii;
use backend\models\Restaurant;
use backend\models\RestaurantSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RestaurantController implements the CRUD actions for Restaurant model.
 */
class RestaurantController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                  [
                    'actions' => ['login', 'error'],
                    'allow' => true,
                    'roles' => ['?'],//คนที่ยังไม่ได้ล็อคอิน
                  ],
                  [
                    'actions' => ['logout', 'index','delete','create','view','update'],//เฉพาะหน้าที่กำหนด
                    'allow' => true,//อนุญาต
                    'roles' => ['admin'],//คนที่ล็อคอิน ต้องเป็นแอดมิน
                  ],
                ],
              ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    // public function actionUpload()
    // {
    //     $model = new Restaurant();

    //     if (Yii::$app->request->isPost) {
    //         $model->ResImg = UploadedFile::getInstance($model, 'ResImg');
    //         if ($model->upload()) {
    //             // file is uploaded successfully
    //             return;
    //         }
    //     }

    //     return $this->render('upload', ['model' => $model]);
    // }
    /**
     * Lists all Restaurant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RestaurantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->IDRestaurant]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);

//แก้ไขใหม่
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->ResImg = $model->upload($model,'ResImg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
          } else {
            return $this->render('create', [
              'model' => $model,
            ]);
          }
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

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->IDRestaurant]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
//แก้ไขใหม่
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->ResImg = $model->upload($model,'ResImg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
        }  else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionStatus($id)
    {
        $model = $this->findModel($id);

            $model->ResStatus = "อนุมัติ";
            $model->save();
        $user = $this->findModel2($model->IDUser);
        \Yii::$app->mail->compose('@app/mail/layouts/register', [
            'fullname'=> $model->ResName,
        ])
            ->setFrom(['systemudon@gmail.com' => 'การอนุมัติร้านอาหาร'])
            ->setTo($user->email)
            ->setSubject('การอนุมัติร้านอาหาร ' )
            ->send();
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
    }
    public function actionStatus2($id)
    {
        $model = $this->findModel($id);



//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->ResStatus = "ไม่อนุมัติ";
            $model->save();

        $user = $this->findModel2($model->IDUser);
        \Yii::$app->mail->compose('@app/mail/layouts/register2', [
            'fullname'=> $model->ResName,
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//            'model' => $this->findModel($id)
        ])
            ->setFrom(['systemudon@gmail.com' => 'การอนุมัติร้านอาหาร'])
            ->setTo($user->email)
            ->setSubject('การอนุมัติร้านอาหาร ' )
            ->send();
            return $this->redirect(['view', 'id' => $model->IDRestaurant]);
//        }
//        else{
//            return $this->render('view', [
//                'model' => $model,
//            ]);
//        }
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

    protected function findModel2($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
