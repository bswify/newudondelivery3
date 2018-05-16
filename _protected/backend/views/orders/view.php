<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $delivery backend\models\Delivery */
/* @var $searchModel backend\models\OrderdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->IDOrder;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการสั่งซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDOrder], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDOrder], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณแน่ใจว่าต้องการ ลบ ข้อมูลแล้วหรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= Html::a('ยืนยันการสั่งซื้อ', ['status1', 'id' => $model->IDOrder], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'คุณแน่ใจว่าต้องการ ยืนยันการสั่งซื้อ?',
            'method' => 'post',
        ],
    ]) ?>

    <?= Html::a('กำลังจัดส่ง', ['status3', 'id' => $model->IDOrder], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'คุณแน่ใจว่าต้องการ กำลังจัดส่ง?',
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a('จัดส่งแล้ว', ['status4', 'id' => $model->IDOrder,'idc'=> $model->IDCustomer], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'คุณแน่ใจว่าต้องการ จัดส่งแล้ว?',
            'method' => 'post',
        ],
    ]) ?>
    <?= Html::a('ไม่พบผู้รับ', ['status5', 'id' => $model->IDOrder], [
        'class' => 'btn btn-primary',
        'data' => [
            'confirm' => 'คุณแน่ใจว่าต้องการ ไม่พบผู้สั่งซื้อ?',
            'method' => 'post',
        ],
    ]) ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDOrder',
            'OrderDate',
            'OrderNote:ntext',
            'OrderTotalPrice',
            'OrderStatus:ntext',
            'Orderpayprice:ntext',
            'paymant.PaymentName',
//            'IDCustomer',
            'customer.CustomerFName',
            'customer.CustomerLName',
            'customer.CustomerPhone',
            'cusadd.CustomerAddNo',
            'cusadd.CustomerAddRoad',
            'emp.EmpFName',
            'emp.EmpLname',
            'deliveries.IDDelivery',
            'deliveries.DeliveryPrice',
            'deliveries.IDDeliveryTime',
            'deliveries.deliveryTime.DeliveryTime',
            'deliveries.IDDeliveryPro',
            'deliveries.deliveryPro.DeliveryProName',
        ],



    ]) ?>

<!--    <= DetailView::widget([-->
<!--        'model2' => $model2,-->
<!--        'attributes' => [-->
<!--            'deliveryTime.DeliveryTime',-->
<!--        ],-->
<!--    ]) ?>-->

<!--    //เพิ่มการแสดงข้อมูลรายละเอียดอาหาร-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'IDOrderDetails',
            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'FoodImg',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url('.Yii::getAlias('@ShowFoodPhoto').$model->food->FoodImg.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
            [
                'attribute' => 'IDFood',
                'value' => 'food.FoodName',
            ],
            [
                'attribute' => 'FoodPrice',
                'value' => 'food.FoodPrice',
            ],
//            'IDFood',
            [
                'attribute' => 'IDFoodDetails',
                'value' => 'foodDetails.FoodDetailName',
            ],
            [
                'attribute' => 'FoodDetailsPrice',
                'value' => 'foodDetails.FoodDetailsPrice',
            ],
//            'IDFoodDetails',
            'AmountFood',
//            'IDOrder',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options'=>['style'=>'width:120px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">  {update2} {delete2} </div>',
                'buttons'=>[
                    'update2'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                            ['orderdetails/update', 'id' => $model->IDOrderDetails],
                            ['title'=>'Edit Orderdetail',
                                'data-confirm' => Yii::t('yii', "คุณต้องการแก้ไขข้อมูลรายการอาหารหรือไม่"),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class'=>'btn btn-warning']);
                    },
                    'delete2'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>',
                            ['orderdetails/delete', 'id' => $model->IDOrderDetails],
                            [
                            'title' => Yii::t('yii', 'Delete Orderdetail'),
                            'data-confirm' => Yii::t('yii', 'คุณต้องการลบข้อมูลรายการอาหารหรือไม่?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class'=>'btn btn-warning'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
<!--    //เพิ่มการแสดงข้อมูลรายละเอียดอาหาร-->

    <?= Html::a('พิมพ์ใบสั่งซื้อ', ['viewpdf', 'id' => $model->IDOrder], [
        'class' => 'btn btn-primary',
        'data' => [
//            'confirm' => 'คุณแน่ใจว่าต้องการ ไม่พบผู้สั่งซื้อ?',
            'method' => 'post',
        ],
    ]) ?>

</div>
