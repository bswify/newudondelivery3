<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Respromotion */

$this->title = 'แก้ไขข้อมูลโปรโมชั่นของร้าน:'.$model->IDResPromotion;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลโปรโมชั่นของร้าน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDResPromotion, 'url' => ['view', 'id' => $model->IDResPromotion]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="respromotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
