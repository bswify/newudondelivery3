<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDRestaurant') ?>

    <?= $form->field($model, 'ResName') ?>

    <?= $form->field($model, 'ResAddress') ?>

    <?= $form->field($model, 'ResStatus') ?>

    <?= $form->field($model, 'ResLowPrice') ?>

    <?php // echo $form->field($model, 'ResTel') ?>

    <?php // echo $form->field($model, 'ResTimeStart') ?>

    <?php // echo $form->field($model, 'ResTimeEnd') ?>

    <?php // echo $form->field($model, 'IDLocation') ?>

    <?php // echo $form->field($model, 'RUsername') ?>

    <?php // echo $form->field($model, 'Rpasswords') ?>

    <?php // echo $form->field($model, 'ResImg') ?>

    <?php // echo $form->field($model, 'latlng') ?>

    <?php // echo $form->field($model, 'LoginType') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
