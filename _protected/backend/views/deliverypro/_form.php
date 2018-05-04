<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliverypro */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;
?>

<div class="deliverypro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DeliveryProName')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'DeliveryProPiont')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'DeliveryProPrice')->textInput(['type' => 'number']) ?>

<!--    <= $form->field($model, 'DeliveryProStart')->widget(\janisto\timepicker\TimePicker::className(), [-->
<!--    //'language' => 'fi',-->
<!--    'mode' => 'date',-->
<!--    'clientOptions'=>[-->
<!--        'dateFormat' => 'yy-mm-dd',-->
<!--        //'timeFormat' => 'HH:mm:ss',-->
<!--        'showSecond' => true,-->
<!--    ]-->
<!--]) ?>-->
<!---->
<!--    <= $form->field($model, 'DeliveryProEnd')->widget(\janisto\timepicker\TimePicker::className(), [-->
<!--    //'language' => 'fi',-->
<!--    'mode' => 'date',-->
<!--    'clientOptions'=>[-->
<!--        'dateFormat' => 'yy-mm-dd',-->
<!--        //'timeFormat' => 'HH:mm:ss',-->
<!--        'showSecond' => true,-->
<!--    ]-->
<!--]) ?>-->


    <?php
    echo '<h5><b>วันที่เริ่มต้น - สิ้นสุด</b></h5>';
    $model->DeliveryProStart = date('Y-m-d');
    $model->DeliveryProEnd = date('Y-m-d');
    //    $form->field($model, 'kvdate1');
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
            'model'=>$model,
            'attribute' => 'kvdate',
            'useWithAddon'=>true,
            'convertFormat'=>true,
            'startAttribute' => 'DeliveryProStart',
            'endAttribute' => 'DeliveryProEnd',
            'language' => 'th',
            'pluginOptions'=>[
                'locale'=>['format' => 'Y-m-d'],
            ]
        ]).$addon;

    echo '</div>';
    echo '<br>';
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['deliverypro/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
