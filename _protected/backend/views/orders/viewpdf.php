<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $delivery backend\models\Delivery */
/* @var $searchModel backend\models\OrderdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCss("
.container{
    font-family: \"thsarabun\",\"Helvetica Neue\", Helvetica, Arial, sans-serif;
    font-size: 16pt;
}
");
$this->title = $model->IDOrder;
$this->params['breadcrumbs'][] = ['label' => 'ดูใบารสั่งซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>


    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?= Html::img(Yii::getAlias('@appRoot3') . '/uploads/logo.png') ?><h4>บริการจัดส่งอาหารในเขตเทศบาลอุดณธานี</h4>

    <h>----------------------------------------------------------------------------------</h>
    <br>
    <?php
    echo('รหัสการสั่งซื้อ : ' . $model->IDOrder);
    ?>
    <br>
    <?php
    echo('วันที่ : ' . $model->OrderDate);
    ?>
    <br>
    <?php
    echo('หมายเหตุ : ' . $model->OrderNote);
    ?>
    <br>
    <?php
    echo('การชำระเงิน : ' . $model->paymant->PaymentName);
    ?><br>
    <h>----------------------------------------------------------------------------------</h>
    <br>
    <h>รายการอาหาร</h>
    <br>
    <h>----------------------------------------------------------------------------------</h>
    <br>


    <!--    //เพิ่มการแสดงข้อมูลรายละเอียดอาหาร-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['style' => 'table-layout:fixed; width:370px;'],
        'columns' => [
            'food.FoodName',
            'food.FoodPrice',
            'foodDetails.FoodDetailName',
            'foodDetails.FoodDetailsPrice',
            'AmountFood',

        ]

    ]); ?>
    <h>----------------------------------------------------------------------------------</h>
    <br>
    <?php
    echo('ราคาค่าจัดส่ง : ' . $model->deliveries->DeliveryPrice . ' บาท');
    ?><br>
    <?php
    echo('ราคารวม : ' . $model->OrderTotalPrice . ' บาท');
    ?><br>
    <?php
    echo('เงินที่จะชำระ : ' . $model->Orderpayprice . ' บาท');
    ?><br>
    <h>----------------------------------------------------------------------------------</h>
    <br>
    <h>ข้อมูลผู้รับ</h>
    <br>
    <?php
    echo('ชื่อ : ' . $model->customer->CustomerFName . ' ' . $model->customer->CustomerLName);
    ?><br>
    <?php
    echo('บ้านเลขที่ ' . $model->cusadd->CustomerAddNo . ' ถนน/ซอย ' . $model->cusadd->CustomerAddRoad);
    ?><br>
    <?php
    echo('เบอร์โทร : ' . $model->customer->CustomerPhone);
    ?><br>
    <h>----------------------------------------------------------------------------------</h>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?= Html::a('<i class="	glyphicon glyphicon-print"></i>', ['mpdfdemo1', 'id' => $model->IDOrder], [
        'class' => 'btn btn-primary',
        'data' => [
//            'confirm' => 'คุณแน่ใจว่าต้องการ ไม่พบผู้สั่งซื้อ?',
            'method' => 'post',
        ],
    ]) ?>

    <!--    //เพิ่มการแสดงข้อมูลรายละเอียดอาหาร-->
    <!--    <= DetailView::widget([-->
    <!--        'model' => $model,-->
    <!--        'attributes' => [-->
    <!--            'IDOrder',-->
    <!--            'OrderDate',-->
    <!--            'OrderNote:ntext',-->
    <!--            'OrderTotalPrice',-->
    <!--            'OrderStatus:ntext',-->
    <!--            'paymant.PaymentName',-->
    <!--//            'IDCustomer',-->
    <!--            'customer.CustomerFName',-->
    <!--            'customer.CustomerLName',-->
    <!--            'customer.CustomerPhone',-->
    <!--            'cusadd.CustomerAddNo',-->
    <!--            'cusadd.CustomerAddRoad',-->
    <!--            'emp.EmpFName',-->
    <!--            'emp.EmpLname',-->
    <!--            'deliveries.IDDelivery',-->
    <!--            'deliveries.DeliveryPrice',-->
    <!--            'deliveries.IDDeliveryTime',-->
    <!--            'deliveries.deliveryTime.DeliveryTime',-->
    <!--            'deliveries.IDDeliveryPro',-->
    <!--            'deliveries.deliveryPro.DeliveryProName',-->
    <!--        ],-->
    <!---->
    <!---->
    <!---->
    <!--    ]) ?>-->

</div>
