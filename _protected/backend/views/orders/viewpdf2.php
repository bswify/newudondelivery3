<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลการสั่งซื้อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">



    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,

        'itemView' => '_post',
//            'OrderDate',
//            'OrderNote:ntext',
//            'OrderTotalPrice',
//            'OrderStatus:ntext',
//            [
//                'attribute' => 'IDPaymant',
//                'value' => 'paymant.PaymentName',
//            ],
//            [
//                'attribute' => 'IDCustomer',
//                'value' => 'customer.CustomerFName',
//            ],
//            [
//                'attribute' => 'IDEmp',
//                'value' => 'emp.EmpFName',
//            ],

    ]); ?>
</div>
