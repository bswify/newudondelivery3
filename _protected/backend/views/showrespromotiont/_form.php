<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Respromotion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="respromotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ResPromotionName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResPromotionStart')->textInput() ?>

    <?= $form->field($model, 'ResPromotionEnd')->textInput() ?>

    <?= $form->field($model, 'IDRestaurant')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
