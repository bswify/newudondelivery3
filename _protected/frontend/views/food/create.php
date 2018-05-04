<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $food frontend\models\Food */
/* @var $fooddetails frontend\models\Food */

$this->title = 'เพิ่มข้อมูลเมนูอาหาร';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเมนูอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-create">


    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'food' => $food,
//        'fooddetails' => $fooddetails,
    ]) ?>

</div>
