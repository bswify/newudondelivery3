<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Locationtype */

$this->title = 'แก้ไขข้อมูลประเภทตำแหน่ง:'.$model->LocationTypeName;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลประเภทตำแหน่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDLocationType, 'url' => ['view', 'id' => $model->IDLocationType]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locationtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
