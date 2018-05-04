<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Fooddetails */

$this->title = 'เพิ่มข้อมูลรายละเอียดอาหาร';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรายละเอียดอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fooddetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
