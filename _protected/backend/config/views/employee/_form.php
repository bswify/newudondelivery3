<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use nenad\passwordStrength\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EmpFName')->textinput() ?>

    <?= $form->field($model, 'EmpLname')->textinput() ?>



    <?= $form->field($model, 'EUsername')->textinput() ?>

    <?= $form->field($model, 'Epasswords')->widget(PasswordInput::className(), []) ?>

    <?= $form->field($model, 'EmpPhone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999-999-9999',
])  ?>

    <?= $form->field($model, 'LoginType')->hiddenInput(['value'=>'พนักงานจัดส่ง'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
