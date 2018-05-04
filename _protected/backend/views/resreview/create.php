<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Resreview */

$this->title = 'เพิ่มข้อมูลรีวิวร้านอาหาร';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรีวิวร้านอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resreview-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
