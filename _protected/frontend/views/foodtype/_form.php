<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Foodtype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foodtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FoodTypeName')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
