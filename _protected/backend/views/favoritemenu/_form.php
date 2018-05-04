<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Favoritemenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="favoritemenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDFood')->textInput() ?>

    <?= $form->field($model, 'IDCustomer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
