<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Restaurant */

$this->title = 'เพิ่มข้อมูลร้านอาหาร';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลร้านอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
