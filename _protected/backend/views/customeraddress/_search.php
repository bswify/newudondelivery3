<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerAddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customeraddress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDCustomerAddress') ?>

    <?= $form->field($model, 'CustomerAddNo') ?>

    <?= $form->field($model, 'CustomerAddRoad') ?>

    <?= $form->field($model, 'IDCustomer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
