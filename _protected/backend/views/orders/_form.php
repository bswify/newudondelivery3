<?php

use backend\models\Customer;
use backend\models\CustomerAddress;
use backend\models\Employee;
use backend\models\Payment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'OrderDate')->textInput() ?>

    <?= $form->field($model, 'OrderNote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'OrderTotalPrice')->textInput(['readOnly'=> true]) ?>




    <?= $form->field($model, 'IDPaymant')->dropDownList(
        ArrayHelper::map(Payment::find()->all(),'IDPaymant','PaymentName'),
        ['promp'=>'ประเภทการชำระเงิน'])  ?>

    <?= $form->field($model, 'IDCustomer')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'IDCustomer','CustomerFName'),
        ['promp'=>'ลูกค้า'])  ?>

    <?= $form->field($model, 'IDEmp')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'IDEmp','EmpFName'),
        ['promp'=>'พนักงานจัดส่ง'])  ?>

    <?= $form->field($model, 'Orderpayprice')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['orders/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
