<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Resreview */

$this->title = 'แก้ไขข้อมูลรีวิวร้านอาหาร: '.$model->IDResReview;
$this->params['breadcrumbs'][] = ['label' => 'Resreviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDResReview, 'url' => ['view', 'id' => $model->IDResReview]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="resreview-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
