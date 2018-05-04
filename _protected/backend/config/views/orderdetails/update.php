<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */

$this->title = 'แก้ไขรายละเอียดอาหาร:'.$model->IDOrderDetails;
$this->params['breadcrumbs'][] = ['label' => 'Orderdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDOrderDetails, 'url' => ['view', 'id' => $model->IDOrderDetails]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
