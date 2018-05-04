<?php


use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */

$this->title = $model->ResName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลร้านอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<!--<php-->
<!--echo Alert::widget([-->
<!--    'options' => [-->
<!--        'class' => 'alert-info',-->
<!--    ],-->
<!--    'body' => 'Say hello...',-->
<!--]);-->
<!--?>-->
<div class="restaurant-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDRestaurant], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('ลบ', ['delete', 'id' => $model->IDRestaurant], [
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
           // 'IDRestaurant',
            'ResName:ntext',
            'ResAddress:ntext',
            'ResStatus:ntext',
            'ResLowPrice',
            'ResTel:ntext',
            'ResTimeStart',
            'ResTimeEnd',
            'IDLocation',
//            'IDUser',
//            'RUsername:ntext',
//           // 'Rpasswords:ntext',
//            [
//                'attribute'=>'Rpasswords',
//                'value'=>'********'
//            ],
            //'ResImg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'ResImg',
                'value' => Html::img( $model->ResImg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            // 'latlng:ntext',
            // 'LoginType:ntext',
        ],
    ]) ?>


    <?= Html::a('อนุมัติ', ['status', 'id' => $model->IDRestaurant], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a('ไม่อนุมัติ', ['status2', 'id' => $model->IDRestaurant], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</div>
