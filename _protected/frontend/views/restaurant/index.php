<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลร้านอาหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'IDRestaurant',
            //'ResImg:ntext',
            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'ResImg',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                               background-image:url('.Yii::getAlias('@ShowRes').$model->ResImg.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
            'ResName:ntext',
            'ResAddress:ntext',
           // 'ResStatus:ntext',
           // 'ResLowPrice',
           // 'IDUser',
//            [
//                'options'=>['style'=>'width:150px;'],
//                'format'=>'raw',
//                'attribute'=>'ResImg',
//                'value'=>function($model){
//                    return Html::tag('div','',[
//                        'style'=>'width:100px;height:100px;
//                              border-top: 10px solid rgba(255, 255, 255, .46);
//                              background-image:url('.Yii::getAlias('@uploadUrl').'/images/Restaurantimg'.'/'.$model->ResImg.');
//                              background-size: cover;
//                              background-position:center center;
//                              background-repeat:no-repeat;
//                              align-items: center;margin: auto;
//                              ']);
//                }
//            ],
            'ResTel:ntext',
            //'ResTimeStart',
            //'ResTimeEnd',
            //'IDLocation',
            //'RUsername:ntext',
            //'Rpasswords:ntext',

            //'latlng:ntext',
            //'LoginType:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options' => ['style' => 'width:135px;'],
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update}  </div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'View user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil"></i>', $url,
                            ['title' => 'Edit user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
//
                ]
            ],// ActionColumn
        ],
    ]); ?>
</div>
