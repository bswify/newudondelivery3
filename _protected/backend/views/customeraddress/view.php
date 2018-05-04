<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerAddress */

$this->title = $model->IDCustomerAddress;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลที่อยู่ลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customeraddress-view">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDCustomerAddress], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDCustomerAddress], [
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
//            'IDCustomerAddress',
            'CustomerAddNo',
            'CustomerAddRoad:ntext',
            'IDCustomer',
            
        ],
    ]) ?>

</div>
