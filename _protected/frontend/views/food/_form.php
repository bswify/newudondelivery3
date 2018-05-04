<?php

use consynki\yii\input\ImageInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Foodtype;

/* @var $this yii\web\View */
/* @var $food frontend\models\Food */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="food-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
<!--                <div class="col-md-2">-->
<!--                    <div class="well text-center">-->
<!--                        <= Html::img(Yii::getAlias('@ShowFoodPhoto') . '/' . $food->FoodImg, ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-md-10">
                    <?= $form->field($food, 'FoodImg')->fileInput(['style' => 'opacity:unset;margin-top: -18px;']) ?>
                </div>
            </div>

            <?= $form->field($food, 'FoodName')->textarea(['rows' => 1]) ?>

            <?= $form->field($food, 'FoodPrice')->textInput(['type' => 'number']) ?>

            <?= $form->field($food, 'IDFoodType')->dropDownList(
                ArrayHelper::map(Foodtype::find()->all(), 'IDFoodType', 'FoodTypeName'),
                ['promp' => 'เลือกประเภทอาหาร']
            ) ?>

            <?= $form->field($food, 'MenuTypeName')->dropDownList(
                ['เมนูธรรมดา' => 'เมนูธรรมดา', 'เมนูแนะนำ' => 'เมนูแนะนำ']) ?>
        </div>
    </div>



<!--    <div class="form-group">-->
<!--        <= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>-->
<!--    </div>-->
    <div class="form-group">
        <?= Html::submitButton($food->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $food->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['food/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
