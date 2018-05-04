<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Food */

$this->title = 'แก้ไขข้อมูลเมนูอาหาร: '.$food->IDFood;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเมนูอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $food->IDFood, 'url' => ['view', 'id' => $food->IDFood]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'food' => $food,
//        'fooddetails' => $fooddetails,
    ]) ?>

</div>
