<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDCustomer') ?>

    <?= $form->field($model, 'CustomerFName') ?>

    <?= $form->field($model, 'CustomerLName') ?>

    <?= $form->field($model, 'CustomerImage') ?>

    <?= $form->field($model, 'CustomerPoint') ?>

    <?php // echo $form->field($model, 'CustomerPhone') ?>

    <?php // echo $form->field($model, 'CUsername') ?>

    <?php // echo $form->field($model, 'CPasswords') ?>

    <?php // echo $form->field($model, 'LoginType') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
