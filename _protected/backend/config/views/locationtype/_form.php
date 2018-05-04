<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Locationtype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locationtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LocationTypeName')->textarea(['rows' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
