<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$this->title = 'แก้ไขข้อมูลตำแหน่ง: '.$model->LocationName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลตำแหน่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDLocation, 'url' => ['view', 'id' => $model->IDLocation]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
