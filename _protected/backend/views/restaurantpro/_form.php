<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ResName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResAddress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResStatus')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResLowPrice')->textInput() ?>

    <?= $form->field($model, 'ResTel')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ResTimeStart')->textInput() ?>

    <?= $form->field($model, 'ResTimeEnd')->textInput() ?>

    <?= $form->field($model, 'IDLocation')->textInput() ?>

    <?= $form->field($model, 'ResImg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'latlng')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'LoginType')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IDUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
