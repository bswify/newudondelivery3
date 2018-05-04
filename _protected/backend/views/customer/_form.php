<?php
use consynki\yii\input\ImageInput;
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustomerFName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CustomerLName')->textInput(['maxlength' => true]) ?>

    <!-- <= $form->field($model, 'CustomerImage')->widget(ImageInput::className(), [
		'value' => '/img/current-image.png' //Optional current value
    ]) ?> -->

     <?= $form->field($model, 'CustomerImage')->fileInput()?>

    <?= $form->field($model, 'CustomerPoint')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'CustomerPhone')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999-999-9999'])  ?>


    <?= $form->field($model, 'email')->input('email') ?>

<!--    <= $form->field($model, 'CPasswords')->widget(PasswordInput::className(), []) ?>-->

    <?= $form->field($model, 'LoginType')->hiddenInput(['value'=>'ลูกค้า'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['customer/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
