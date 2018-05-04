<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Foodtype */

$this->title = 'Update Foodtype: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Foodtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDFoodType, 'url' => ['view', 'id' => $model->IDFoodType]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foodtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
