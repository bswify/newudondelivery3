<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Foodtype */

$this->title = 'เพิ่มประเภทอาหาร';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foodtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
