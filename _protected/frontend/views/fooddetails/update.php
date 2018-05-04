<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Fooddetails */

$this->title = 'แก้ไขข้อมูลรายละเอียดอาหาร:'.$model->IDFoodDetails;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรายละเอียดอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDFoodDetails, 'url' => ['view', 'id' => $model->IDFoodDetails]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="fooddetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
