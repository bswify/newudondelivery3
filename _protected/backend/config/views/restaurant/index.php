<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลร้านอาหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข้อมูลร้านอาหาร', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           //['class' => 'yii\grid\SerialColumn'],

           // 'IDRestaurant',
            // [
            //     'options'=>['style'=>'width:150px;'],
            //     'format'=>'raw',
            //     'attribute'=>'ResImg',
            //     'value'=>function($model){
            //       return Html::tag('div','',[
            //         'style'=>'width:150px;height:95px;
            //                   border-top: 10px solid rgba(255, 255, 255, .46);
            //                   background-image:url('.$model->photoViewer.');
            //                   background-size: cover;
            //                   background-position:center center;
            //                   background-repeat:no-repeat;
            //                   ']);
            //     }
            // ],
            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'ResImg',
                'value'=>function($model){
                  return Html::tag('div','',[
                    'style'=>'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url('.$model->ResImg.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                            }
                ],




            'ResName:ntext',
            'ResAddress:ntext',
            'ResStatus:ntext',
            'ResLowPrice',
            //'ResTel:ntext',
            //'ResTimeStart',
            //'ResTimeEnd',
            //'IDLocation',
            //'RUsername:ntext',
            //'Rpasswords:ntext',
            //'ResImg:ntext',
            //'latlng:ntext',
            //'LoginType:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options'=>['style'=>'width:120px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update} {delete} </div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,
                        ['title'=>'View user',
                          'class'=>'btn btn-warning']);
                    },
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,
                        ['title'=>'Edit user',
                        'class'=>'btn btn-warning']);
                    },
                    'delete'=>function($url,$model,$key){
                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
                                'title' => Yii::t('yii', 'Delete user'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
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
