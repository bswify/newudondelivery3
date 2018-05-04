<?php

use consynki\yii\input\ImageInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Location;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model frontend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ResName')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'ResAddress')->textarea(['rows' => 5]) ?>

<!--    <= $form->field($model, 'ResStatus')->dropDownList(-->
<!--        ['ไม่อนุมัติ' => 'ไม่อนุมัติ', 'อนุมัติ' => 'อนุมัติ']) ?>-->

    <?= $form->field($model, 'ResLowPrice')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'ResTel')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-9999'])  ?>

    <?= $form->field($model, 'ResTimeStart')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'time',
    'clientOptions'=>[
        //'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>

    <?= $form->field($model, 'ResTimeEnd')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'time',
    'clientOptions'=>[
        //'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>

    <?= $form->field($model, 'IDLocation')->dropDownList(
        ArrayHelper::map(Location::find()->all(),'IDLocation','LocationName'),
        ['promp'=>'เลือกตำแหน่ง']) ?>

<!--    <= $form->field($model, 'RUsername')->textarea(['rows' => 6]) ?>-->
<!---->
<!--    <= $form->field($model, 'Rpasswords')->textarea(['rows' => 6]) ?>-->

    <?= $form->field($model, 'ResImg')->fileInput(['style' => 'opacity:unset;margin-top: -18px;'])?>

    <?= $form->field($model, 'latlng')->widget(\pigolab\locationpicker\CoordinatesPicker::className() , [
        'key' => 'AIzaSyCP7RNiyWiYUj-4JrlrgvhXl2lRE4zIKlo' ,   // optional , Your can also put your google map api key
        // 'valueTemplate' => '{latitude},{longitude}' , // Optional , this is default result format
        'options' => [
            'style' => 'width: 80%; height: 400px',  // map canvas width and height
        ] ,
        'enableSearchBox' => false , // Optional , default is true
        'searchBoxOptions' => [ // searchBox html attributes
            'style' => 'width: 300px;', // Optional , default width and height defined in css coordinates-picker.css
        ],
        'mapOptions' => [
            // set google map optinos
            'rotateControl' => true,
            'scaleControl' => false,
            'streetViewControl' => true,
            'mapTypeId' => new JsExpression('google.maps.MapTypeId.SATELLITE'),
            'heading'=> 90,
            'tilt' => 45 ,

            'mapTypeControl' => true,
            'mapTypeControlOptions' => [
                'style'    => new JsExpression('google.maps.MapTypeControlStyle.HORIZONTAL_BAR'),
                'position' => new JsExpression('google.maps.ControlPosition.TOP_CENTER'),
            ]
        ],
        'clientOptions' => [
            'radius'    => 300,
            'location' => [
                'latitude'  => 17.397455 ,
                'longitude' => 102.794378,
            ]
        ]
    ])  ?>

    <?= $form->field($model, 'LoginType')->hiddenInput(['value'=>'เจ้าของร้าน'])->label(false) ?>
<!--    <= $form->field($model, 'IDUser')->textInput() ?>-->


    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
