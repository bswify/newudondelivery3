<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Locationtype */

$this->title = 'เพิ่มข้อมูลประเภทตำแหน่ง';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลประเภทตำแหน่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locationtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
