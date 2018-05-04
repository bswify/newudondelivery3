<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */

$this->title = 'แก้ไข'.$model->food->FoodName;
$this->params['breadcrumbs'][] = ['label' => 'Orderdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->food->FoodName, 'url' => ['view', 'id' => $model->IDOrderDetails]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="orderdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
