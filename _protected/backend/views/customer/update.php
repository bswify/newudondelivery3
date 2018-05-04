<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

$this->title = 'แก้ไขข้อมูลลูกค้า:'. $model->CustomerFName.' '. $model->CustomerLName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDCustomer, 'url' => ['view', 'id' => $model->IDCustomer]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="customer-update">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
