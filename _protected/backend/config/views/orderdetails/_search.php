<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrderdetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDOrderDetails') ?>

    <?= $form->field($model, 'IDFood') ?>

    <?= $form->field($model, 'IDFoodDetails') ?>

    <?= $form->field($model, 'AmountFood') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
