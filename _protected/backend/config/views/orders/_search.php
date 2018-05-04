<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDOrder') ?>

    <?= $form->field($model, 'OrderDate') ?>

    <?= $form->field($model, 'OrderNote') ?>

    <?= $form->field($model, 'OrderTotalPrice') ?>

    <?= $form->field($model, 'OrderStatus') ?>

    <?php // echo $form->field($model, 'IDOrderDetails') ?>

    <?php // echo $form->field($model, 'IDPaymant') ?>

    <?php // echo $form->field($model, 'IDDelivery') ?>

    <?php // echo $form->field($model, 'IDCustomer') ?>

    <?php // echo $form->field($model, 'IDEmp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
