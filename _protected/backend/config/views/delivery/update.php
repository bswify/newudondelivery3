<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Delivery */

$this->title = 'แก้ไขข้อมูลการจัดส่ง:'.$model->IDDelivery;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDDelivery, 'url' => ['view', 'id' => $model->IDDelivery]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
