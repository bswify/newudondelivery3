<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Employee;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OrderDate')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'date',
    'language' => 'th',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        //'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
])  ?>

    <?= $form->field($model, 'OrderNote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'OrderTotalPrice')->textInput() ?>

    <?= $form->field($model, 'OrderStatus')->dropDownList(
        ['รอยืนยัน' => 'รอยืนยัน', 'ยืนยัน' => 'ยืนยัน', 'กำลังจัดส่ง' => 'กำลังจัดส่ง', 'จัดส่งแล้ว' => 'จัดส่งแล้ว']) ?>

    <?= $form->field($model, 'IDOrderDetails')->textInput() ?>

    <?= $form->field($model, 'IDPaymant')->textInput() ?>

    <?= $form->field($model, 'IDDelivery')->textInput() ?>

    <?= $form->field($model, 'IDCustomer')->textInput() ?>

    <?= $form->field($model, 'IDEmp')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'IDEmp','EmpFName'),
        ['promp'=>'เลือกพนักงาน'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
