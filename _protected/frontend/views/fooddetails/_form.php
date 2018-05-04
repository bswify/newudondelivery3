<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fooddetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fooddetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FoodDetailName')->textarea(['rows' => 1]) ?>


    <?= $form->field($model, 'FoodDetailsPrice')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['food/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
