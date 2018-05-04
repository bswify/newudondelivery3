<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Locationtype;
/* @var $this yii\web\View */
/* @var $model backend\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LocationName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IDLocationType')->dropDownList(
        ArrayHelper::map(Locationtype::find()->all(),'IDLocationType','LocationTypeName'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
