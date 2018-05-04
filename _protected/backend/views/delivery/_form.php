<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DeliveryPrice')->textInput() ?>

    <?= $form->field($model, 'IDDeliveryTime')->textInput() ?>

    <?= $form->field($model, 'IDDeliveryPro')->textInput() ?>

    <?= $form->field($model, 'IDOrder')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
