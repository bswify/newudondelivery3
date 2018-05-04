<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Delivery */

$this->title = 'เพิ่มข้อมูลการจัดส่ง';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
