<?php

namespace backend\controllers;

use backend\models\CustomerAddress;
use backend\models\CustomerAddressSearch;
use Yii;
use backend\models\Customer;
use backend\models\CustomerSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     public function actionTest(){
//         echo "Testttttttttttttttttttt";
         $query = new Query();
         $data = $query->select("*")
             ->from("customer")
             ->all();

         print_r($data);

         echo "<br/>";

         foreach ($data as $item){
             $result = $item['IDCustomer'];
             $result2 = $item['CustomerFName'];
             echo "result : ".$result;
             echo "<br/>result2 : ".$result2;
         }



     }

    /**
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        print_r($dataProvider->models->IDCustomer);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new CustomerAddressSearch();
        $dataProvider = $searchModel->search($id);
//
//        print_r($dataProvider->models);

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        //แก้ใหม่
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->CustomerImage = $model->upload($model,'CustomerImage');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDCustomer]);
          } else {
            return $this->render('create', [
              'model' => $model,
            ]);
          }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         //แก้ใหม่
         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->CustomerImage = $model->upload($model,'CustomerImage');
            $model->save();
            return $this->redirect(['view', 'id' => $model->IDCustomer]);
          } else {
            return $this->render('update', [
              'model' => $model,
            ]);
          }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
