<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDEmp') ?>

    <?= $form->field($model, 'EmpFName') ?>

    <?= $form->field($model, 'EmpLname') ?>

    <?= $form->field($model, 'EmpPhone') ?>

    <?= $form->field($model, 'EUsername') ?>

    <?php // echo $form->field($model, 'Epasswords') ?>

    <?php // echo $form->field($model, 'LoginType') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
