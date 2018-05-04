<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = $model->CustomerFName.' '. $model->CustomerLName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDCustomer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDCustomer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'IDCustomer',
            [
                'format' => 'raw',
                'attribute' => 'CustomerImage',
                'value' => Html::img(Yii::getAlias('@ShowCus')  . $model->CustomerImage, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'CustomerFName',
            'CustomerLName',
            //'CustomerImage:ntext',


            'CustomerPoint',
            'CustomerPhone',
            'email',
//            'CUsername:ntext',
//            'CPasswords:ntext',
//            'LoginType:ntext',
        ],
    ]) ?>

    <h2>ที่อยู่</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            // 'IDCustomerAddress',
            'CustomerAddNo',
            'CustomerAddRoad:ntext',

            //'IDCustomer',
            [
                'attribute' => 'IDCustomer',
                'value' => 'customer.CustomerFName',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options' => ['style' => 'width:135px;'],
                'headerOptions' => ['class' => 'text-center'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">  {update2} {delete2} </div>',
                'buttons'=>[
                    'update2'=>function($url,$model,$key){
                        return Html::a('<i class="fa fa-pencil"></i>',
                            ['customeraddress/update', 'id' => $model->IDCustomerAddress],
                            ['title'=>'Edit Fooddetail',
                                'data-confirm' => Yii::t('yii', "คุณต้องการแก้ไขข้อมูลรายการอาหารหรือไม่"),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class'=>'btn btn-warning']);
                    },
                    'delete2'=>function($url,$model,$key){
                        return Html::a('<i class="fa fa-trash"></i>',
                            ['customeraddress/delete', 'id' => $model->IDCustomerAddress],
                            [
                                'title' => Yii::t('yii', 'Delete Fooddetail'),
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

    <p>
        <?= Html::a('เพิ่มข้อมูลที่อยู่ลูกค้า', ['customeraddress/create','id' => $model->IDCustomer], ['class' => 'btn btn-success']) ?>
    </p>

<!--<= Html::a('เพิ่มที่อยู่', ['/customeraddress/index'], ['class'=>'btn btn-primary']) ?>-->

</div>
