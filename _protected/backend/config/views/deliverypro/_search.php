<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeliveryproSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliverypro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDDeliveryPro') ?>

    <?= $form->field($model, 'DeliveryProName') ?>

    <?= $form->field($model, 'DeliveryProPiont') ?>

    <?= $form->field($model, 'DeliveryProPrice') ?>

    <?= $form->field($model, 'DeliveryProStart') ?>

    <?php // echo $form->field($model, 'DeliveryProEnd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
