<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */

$this->title = 'แก้ไขข้อมูลประเภทการชำระเงิน: '.$model->PaymentName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลประเภทการชำระเงิน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPaymant, 'url' => ['view', 'id' => $model->IDPaymant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
