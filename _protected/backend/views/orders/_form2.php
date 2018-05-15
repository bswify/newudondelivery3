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


    <?= $form->field($model, 'IDEmp')->dropDownList(
        ArrayHelper::map(Employee::find()->all(),'IDEmp','EmpFName'),
        ['promp'=>'พนักงานจัดส่ง'])  ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['orders/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
