<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RestaurantproSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Restaurant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'IDRestaurant',
            'ResName:ntext',
            'ResAddress:ntext',
            'ResStatus:ntext',
            'ResLowPrice',
            //'ResTel:ntext',
            //'ResTimeStart',
            //'ResTimeEnd',
            //'IDLocation',
//            'ResImg:ntext',
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
            //'latlng:ntext',
            //'LoginType:ntext',
            //'IDUser',
            'respromotion.ResPromotionName',
            [
                'attribute' => 'ResPromotionStart',
                'value' => 'respromotion.ResPromotionStart',
                'filter' => Html::activeDropDownList($searchModel, 'ResPromotionStart', \backend\models\Restaurant::getResPromotionStart()
                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'attribute' => 'ResPromotionEnd',
                'value' => 'respromotion.ResPromotionEnd',
                'filter' => Html::activeDropDownList($searchModel, 'ResPromotionEnd', \backend\models\Restaurant::getResPromotionEnd()
                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],

//            'respromotion.ResPromotionEnd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
