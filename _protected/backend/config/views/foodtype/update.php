<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Foodtype */

$this->title = 'แก้ไขประเภทอาหาร: '.$model->IDFoodType;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDFoodType, 'url' => ['view', 'id' => $model->IDFoodType]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="foodtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
