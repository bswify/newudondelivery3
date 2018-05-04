<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverypro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deliverypro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DeliveryProName')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'DeliveryProPiont')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'DeliveryProPrice')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'DeliveryProStart')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'date',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        //'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>

    <?= $form->field($model, 'DeliveryProEnd')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'date',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        //'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
