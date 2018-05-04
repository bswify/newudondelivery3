<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverypro */

$this->title = 'แก้ไขโปรโมชั่นการจัดส่ง:'.$model->DeliveryProName;
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่นการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDDeliveryPro, 'url' => ['view', 'id' => $model->IDDeliveryPro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="deliverypro-update">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
