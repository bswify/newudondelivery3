<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverytime */

$this->title = 'แก้ไขข้อมูลเวลาการจัดส่ง: '.$model->IDDeliveryTime;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเวลาการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDDeliveryTime, 'url' => ['view', 'id' => $model->IDDeliveryTime]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deliverytime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
