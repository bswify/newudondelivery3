<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Respromotion */

$this->title = 'Update Respromotion: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Respromotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDResPromotion, 'url' => ['view', 'id' => $model->IDResPromotion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="respromotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
