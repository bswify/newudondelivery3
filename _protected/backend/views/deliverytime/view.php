<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverytime */

$this->title = $model->DeliveryTime;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเวลาการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverytime-view">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDDeliveryTime], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDDeliveryTime], [
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
//            'IDDeliveryTime',
            'DeliveryTime',
        ],
    ]) ?>

</div>
