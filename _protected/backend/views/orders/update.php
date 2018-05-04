<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = 'แก้ไข ข้อมูลการสั่งซื้อ : '.$model->IDOrder;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDOrder, 'url' => ['view', 'id' => $model->IDOrder]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
