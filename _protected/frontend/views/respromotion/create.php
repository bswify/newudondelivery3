<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Respromotion */

$this->title = 'เพิ่มข้อมูลโปรโมชั่นของร้าน';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลโปรโมชั่นของร้าน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respromotion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
