<?php

use kolyunya\yii2\widgets\MapInputWidget;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Locationtype;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LocationName')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'IDLocationType')->dropDownList(
        ArrayHelper::map(Locationtype::find()->all(),'IDLocationType','LocationTypeName'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
        ) ?>

    <?= $form->field($model, 'letlng')->widget(\pigolab\locationpicker\CoordinatesPicker::className() , [
        'key' => 'AIzaSyCP7RNiyWiYUj-4JrlrgvhXl2lRE4zIKlo' ,   // optional , Your can also put your google map api key
        // 'valueTemplate' => '{latitude},{longitude}' , // Optional , this is default result format
        'options' => [
            'style' => 'width: 80%; height: 400px',  // map canvas width and height
        ] ,
        'enableSearchBox' => false , // Optional , default is true
        'searchBoxOptions' => [ // searchBox html attributes
            'style' => 'width: 300px;', // Optional , default width and height defined in css coordinates-picker.css
        ],
        'searchBoxPosition' => new JsExpression('google.maps.ControlPosition.TOP_LEFT'), // optional , default is TOP_LEFT

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
            ],

        ],
        'clientOptions' => [
            'radius'    => 300,
            'location' => [
                'latitude'  => 17.397455 ,
                'longitude' => 102.794378,
            ],
            'addressFormat' => 'street_number',
            'inputBinding' => [
                'latitudeInput'     => new JsExpression("$('#us2-lat')"),
                'longitudeInput'    => new JsExpression("$('#us2-lon')"),
                'radiusInput'       => new JsExpression("$('#us2-radius')"),
                'locationNameInput' => new JsExpression("$('#us2-address')")
            ]
        ]
    ])  ?>

<!--    <=-->
<!--    $form->field($model, 'LocationName')->widget(MapInputWidget::className(),-->
<!--        [-->
<!---->
<!--            // Google maps browser key.-->
<!--            'key' => 'AIzaSyCP7RNiyWiYUj-4JrlrgvhXl2lRE4zIKlo',-->
<!---->
<!--            // Initial map center latitude. Used only when the input has no value.-->
<!--            // Otherwise the input value latitude will be used as map center.-->
<!--            // Defaults to 0.-->
<!--            'latitude' => 42,-->
<!---->
<!--            // Initial map center longitude. Used only when the input has no value.-->
<!--            // Otherwise the input value longitude will be used as map center.-->
<!--            // Defaults to 0.-->
<!--            'longitude' => 42,-->
<!---->
<!--            // Initial map zoom.-->
<!--            // Defaults to 0.-->
<!--            'zoom' => 12,-->
<!---->
<!--            // Map container width.-->
<!--            // Defaults to '100%'.-->
<!--            'width' => '420px',-->
<!---->
<!--            // Map container height.-->
<!--            // Defaults to '300px'.-->
<!--            'height' => '420px',-->
<!---->
<!--            // Coordinates representation pattern. Will be use to construct a value of an actual input.-->
<!--            // Will also be used to parse an input value to show the initial input value on the map.-->
<!--            // You can use two macro-variables: '%latitude%' and '%longitude%'.-->
<!--            // Defaults to '(%latitude%,%longitude%)'.-->
<!--            'pattern' => '[%longitude%-%latitude%]',-->
<!---->
<!--            // Google map type. See official Google maps reference for details.-->
<!--            // Defaults to 'roadmap'-->
<!--            'mapType' => 'satellite',-->
<!---->
<!--            // Marker animation behavior defines if a marker should be animated on position change.-->
<!--            // Defaults to false.-->
<!--            'animateMarker' => true,-->
<!---->
<!--            // Map alignment behavior defines if a map should be centered when a marker is repositioned.-->
<!--            // Defaults to true.-->
<!--            'alignMapCenter' => false,-->
<!---->
<!--            // A flag which defines if a search bar should be rendered over the map.-->
<!--            'enableSearchBar' => true,-->
<!---->
<!--        ]-->
<!--    )-->
<!--    ?>-->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['location/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
