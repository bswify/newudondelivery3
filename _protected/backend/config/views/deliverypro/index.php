<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeliveryproSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โปรโมชั่นการจัดส่ง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverypro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มโปรโมชั่นการจัดส่ง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'IDDeliveryPro',
            'DeliveryProName:ntext',
            'DeliveryProPiont',
            'DeliveryProPrice',
            'DeliveryProStart',
            'DeliveryProEnd',

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
