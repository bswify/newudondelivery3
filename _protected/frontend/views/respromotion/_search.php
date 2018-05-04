<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RespromotionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respromotion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDResPromotion') ?>

    <?= $form->field($model, 'ResPromotionName') ?>

    

    <?= $form->field($model, 'ResPromotionStart') ?>

    <?= $form->field($model, 'ResPromotionEnd') ?>

    <?php // echo $form->field($model, 'IDRestaurant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
