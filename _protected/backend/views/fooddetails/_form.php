<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Fooddetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fooddetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FoodDetailName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IDFood')->textInput() ?>

    <?= $form->field($model, 'FoodDetailsPrice')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
