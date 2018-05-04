<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deliverypro */

$this->title = 'เพิ่มโปรโมชั่นการจัดส่ง';
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่นการจัดส่ง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliverypro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
