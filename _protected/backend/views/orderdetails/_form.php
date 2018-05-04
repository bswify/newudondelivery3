<?php

use backend\models\Food;
use backend\models\Fooddetails;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDFood')->dropDownList(
        ArrayHelper::map(Food::find()->all(),'IDFood','FoodName'),
        ['promp'=>'อาหาร'])  ?>

    <?= $form->field($model, 'IDFoodDetails')->dropDownList(
        ArrayHelper::map(Fooddetails::find()->all(),'IDFoodDetails','FoodDetailName'),
        ['promp'=>'อาหาร'])  ?>

    <?= $form->field($model, 'AmountFood')->textInput(['type' => 'number']) ?>


    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
