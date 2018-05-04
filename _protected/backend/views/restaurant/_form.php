<?php

use consynki\yii\input\ImageInput;
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Location;
use yii\web\JsExpression;
use borales\extensions\phoneInput\PhoneInput;
use backend\models\Restaurant;


/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>
  

    <?= $form->field($model, 'ResName')->textInput() ?>

    <?= $form->field($model, 'ResAddress')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'ResStatus')->dropDownList(
        ['ไม่อนุมัติ' => 'ไม่อนุมัติ', 'อนุมัติ' => 'อนุมัติ']) ?>

    <?= $form->field($model, 'ResLowPrice')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'ResTel')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '999-999-9999'])  ?>

    <?= $form->field($model, 'ResTimeStart')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'time',
    'language' => 'th',
    'clientOptions'=>[
        //'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>
    <!-- <= $form->field($model, 'ResTimeStart')->widget(\yii\widgets\MaskedInput::className(),[
    'name' => 'input-31',
    'clientOptions' => ['alias' =>  'date']]) ?> -->

    <?= $form->field($model, 'ResTimeEnd')->widget(\janisto\timepicker\TimePicker::className(), [
    //'language' => 'fi',
    'mode' => 'time',
    'language' => 'th',
    'clientOptions'=>[
        //'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => true,
    ]
]) ?>


    <?= $form->field($model, 'IDLocation')->dropDownList(
        ArrayHelper::map(Location::find()->all(),'IDLocation','LocationName'),
        ['promp'=>'เลือกตำแหน่ง'])  ?>

    
<!--    <= $form->field($model, 'RUsername')->textInput() ?>-->
<!---->
<!--    <= $form->field($model, 'Rpasswords')->widget(PasswordInput::className(), []) ?>-->

    <!-- <= $form->field($model, 'ResImg')->widget(ImageInput::className(), [
		'value' => '/img/current-image.png' //Optional current value
    ])  ?> -->

    <!-- <= Html::img($model->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?> -->
    <?= $form->field($model, 'ResImg')->fileInput()?>

    <?= $form->field($model, 'latlng')->widget(\pigolab\locationpicker\CoordinatesPicker::className() , [
        'key' => 'AIzaSyCP7RNiyWiYUj-4JrlrgvhXl2lRE4zIKlo' ,   // optional , Your can also put your google map api key
       // 'valueTemplate' => '{latitude},{longitude}' , // Optional , this is default result format
        'options' => [
            'style' => 'width: 100%; height: 400px',  // map canvas width and height
        ] ,
        'enableSearchBox' => true , // Optional , default is true
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
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['restaurant/index'], ['class' => 'btn btn-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
