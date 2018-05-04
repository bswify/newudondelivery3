<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverypro */

$this->title = $model->IDDeliveryPro;
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่นการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverypro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDDeliveryPro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDDeliveryPro], [
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
//            'IDDeliveryPro',
            'DeliveryProName:ntext',
            'DeliveryProPiont',
            'DeliveryProPrice',
            'DeliveryProStart',
            'DeliveryProEnd',
        ],
    ]) ?>

</div>
