<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Restaurant */

$this->title = 'แก้ไขข้อมูลร้านอาหาร: '.$model->ResName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลร้านอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ResName, 'url' => ['view', 'id' => $model->IDRestaurant]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="restaurant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
