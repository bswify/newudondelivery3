<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Deliverytime;
use backend\models\Deliverypro;

/* @var $this yii\web\View */
/* @var $model backend\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DeliveryPrice')->textInput() ?>

    <?= $form->field($model, 'IDDeliveryTime')->dropDownList(
        ArrayHelper::map(Deliverytime::find()->all(),'IDDeliveryTime','DeliveryTime'),
        ['promp'=>'เลือกเวลา']
        ) ?>

    <?= $form->field($model, 'IDDeliveryPro')->dropDownList(
        ArrayHelper::map(Deliverypro::find()->all(),'IDDeliveryPro','DeliveryProName'),
        ['promp'=>'เลือกโปรดมชั่นการจัดส่ง']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
