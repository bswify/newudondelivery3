<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Food;

/* @var $this yii\web\View */
/* @var $model frontend\models\Food */

$this->title = "รายการอาหาร : ". $model->FoodName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเมนูอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-view">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDFood], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDFood], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>




            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'IDFood',
                    //'FoodImg:ntext',
                    [
                        'format' => 'raw',
                        'attribute' => 'FoodImg',
                        'value' => Html::img(Yii::getAlias('@ShowFoodPhoto') . '/' . $model->FoodImg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
                    ],
                    'FoodName:ntext',
                    'FoodPrice',
                    'IDFoodType',
//                    'IDRestaurant',
                    'MenuTypeName:ntext',
                ],
            ]) ?>



    <p>
        <?= Html::a('เพิ่มข้อมูลรายละเอียดอาหาร', ['fooddetails/create','id' => $model->IDFood], ['class' => 'btn btn-success']) ?>
    </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,

            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'IDFoodDetails',
                'FoodDetailName:ntext',
                'IDFood',
                'FoodDetailsPrice',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => "การทำงาน",
                    'options' => ['style' => 'width:135px;'],
                    'headerOptions' => ['class' => 'text-center'],
                    'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">  {update2} {delete2} </div>',
                    'buttons'=>[
                        'update2'=>function($url,$model,$key){
                            return Html::a('<i class="fa fa-pencil"></i>',
                                ['fooddetails/update', 'id' => $model->IDFoodDetails],
                                ['title'=>'Edit Fooddetail',
                                    'data-confirm' => Yii::t('yii', "คุณต้องการแก้ไขข้อมูลรายการอาหารหรือไม่"),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                    'class'=>'btn btn-warning']);
                        },
                        'delete2'=>function($url,$model,$key){
                            return Html::a('<i class="fa fa-trash"></i>',
                                ['fooddetails/delete', 'id' => $model->IDFoodDetails],
                                [
                                    'title' => Yii::t('yii', 'Delete Fooddetail'),
                                    'data-confirm' => Yii::t('yii', 'คุณต้องการลบข้อมูลรายการอาหารหรือไม่?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                    'class'=>'btn btn-warning'
                                ]);
                        }
                    ]
                ],
            ],
        ]); ?>


</div>
