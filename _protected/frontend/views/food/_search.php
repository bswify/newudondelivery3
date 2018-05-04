<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FoodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="food-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDFood') ?>

    <?= $form->field($model, 'FoodImg') ?>

    <?= $form->field($model, 'FoodName') ?>

    <?= $form->field($model, 'FoodPrice') ?>

    <?= $form->field($model, 'IDFoodType') ?>

    <?php // echo $form->field($model, 'IDRestaurant') ?>

    <?php // echo $form->field($model, 'MenuTypeName') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
