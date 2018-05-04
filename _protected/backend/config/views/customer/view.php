<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = $model->CustomerFName.' '. $model->CustomerLName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDCustomer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDCustomer], [
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
           // 'IDCustomer',
            [
                'format' => 'raw',
                'attribute' => 'CustomerImage',
                'value' => Html::img( $model->CustomerImage, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'CustomerFName',
            'CustomerLName',
            //'CustomerImage:ntext',


            'CustomerPoint',
            'CustomerPhone',
//            'CUsername:ntext',
//            'CPasswords:ntext',
//            'LoginType:ntext',
        ],
    ]) ?>

<!--<= Html::a('เพิ่มที่อยู่', ['/customeraddress/index'], ['class'=>'btn btn-primary']) ?>-->

</div>
