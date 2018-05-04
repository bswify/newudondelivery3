<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FooddetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fooddetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDFoodDetails') ?>

    <?= $form->field($model, 'FoodDetailName') ?>

    <?= $form->field($model, 'IDFood') ?>

    <?= $form->field($model, 'FoodDetailsPrice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
