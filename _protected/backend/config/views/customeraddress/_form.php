<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Location;
use backend\models\Customer;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customeraddress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustomerAddNo')->textInput() ?>

    <?= $form->field($model, 'CustomerAddRoad')->dropDownList(
        ArrayHelper::map(Location::find()->all(),'LocationName','LocationName'),
        ['promp'=>'เลือกถนน/ซอย']
        ) ?>

    <?= $form->field($model, 'IDCustomer')->dropDownList(
        ArrayHelper::map(Customer::find()->all(),'IDCustomer','CustomerFName'),
        ['promp'=>'เลือกชื่อลูกค้า']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
