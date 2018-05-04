<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDFood')->textInput() ?>

    <?= $form->field($model, 'IDFoodDetails')->textInput() ?>

    <?= $form->field($model, 'AmountFood')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
