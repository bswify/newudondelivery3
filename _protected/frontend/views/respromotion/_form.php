<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Respromotion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$addon = <<< HTML
<span class="input-group-addon">
    <!--<i class="glyphicon glyphicon-calendar"></i>-->
    <i class = "material-icons" > date_range </i>
</span>
HTML;
?>
<div class="respromotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ResPromotionName')->textInput(['readonly' => true,'value' =>'ฟรีค่าจัดส่ง']) ?>

   

<!--    <= $form->field($model, 'ResPromotionStart')->widget(\janisto\timepicker\TimePicker::className(), [-->
<!--    'language' => 'th',-->
<!--    'mode' => 'date',-->
<!--    'clientOptions'=>[-->
<!--        'dateFormat' => 'yy/mm/dd',-->
<!--        //'timeFormat' => 'HH:mm:ss',-->
<!--        'showSecond' => true,-->
<!--    ]-->
<!--])  ?>-->
<!---->
<!---->
<!---->
<!--    <= $form->field($model, 'ResPromotionEnd')->widget(\janisto\timepicker\TimePicker::className(), [-->
<!--    'language' => 'th',-->
<!--    'mode' => 'date',-->
<!--    'clientOptions'=>[-->
<!--        'dateFormat' => 'yy/mm/dd',-->
<!--       // 'timeFormat' => 'HH:mm:ss',-->
<!--        'showSecond' => true,-->
<!--    ]-->
<!--])  ?>-->

    <?php

    echo '<h5><b>วันที่เริ่มต้น - สิ้นสุด</b></h5>';
    $model->ResPromotionStart = date('Y-m-d');//ตัวแปลวันที่เริ่มต้น
    $model->ResPromotionEnd = date('Y-m-d');//ตัวแปลวันที่เข้าพัก
//    $form->field($model, 'kvdate1');
    echo '<div class="input-group drp-container">';
        echo DateRangePicker::widget([
        'model'=>$model,
        'attribute' => 'kvdate1',
        'useWithAddon'=>true,
        'convertFormat'=>true,
        'startAttribute' => 'ResPromotionStart',
        'endAttribute' => 'ResPromotionEnd',
//        'language' => 'th',
        'pluginOptions'=>[
        'locale'=>['format' => 'Y-m-d'],
        ]
        ]).$addon;

        echo '</div>';
        ?>
<!--    <= $form->field($model, 'IDRestaurant')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['respromotion/index'], ['class' => 'btn btn-default']) ?>

    </div>



    <?php ActiveForm::end(); ?>

</div>

<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!--        $('#datetimepicker6').datetimepicker();-->
<!--        $('#datetimepicker7').datetimepicker({-->
<!--            useCurrent: false //Important! See issue #1075-->
<!--        });-->
<!--        $("#datetimepicker6").on("dp.change", function (e) {-->
<!--            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);-->
<!--        });-->
<!--        $("#datetimepicker7").on("dp.change", function (e) {-->
<!--            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);-->
<!--        });-->
<!--    });-->
<!--</script>-->

