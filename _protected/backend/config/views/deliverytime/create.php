<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deliverytime */

$this->title = 'เพิ่มข้อมูลเวลาการจัดส่ง';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลเวลาการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverytime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
