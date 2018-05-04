<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ResreviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resreview-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDResReview') ?>

    <?= $form->field($model, 'ResReviewDate') ?>

    <?= $form->field($model, 'ResReviewScore') ?>

    <?= $form->field($model, 'ResComment') ?>

    <?= $form->field($model, 'ResReviewImage') ?>

    <?php // echo $form->field($model, 'IDRestaurant') ?>

    <?php // echo $form->field($model, 'IDCustomer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
