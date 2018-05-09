<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลการสั่งซื้อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('พิมพ์รายงาน', ['pdf2'], ['class' => 'btn btn-danger']) ?>
<!--        <= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],


            'OrderDate',
            'OrderNote:ntext',
            'OrderTotalPrice',
            'OrderStatus:ntext',
            //'IDPaymant',
            //'IDCustomer',
            //'IDEmp',

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
