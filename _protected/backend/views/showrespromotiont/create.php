<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Respromotion */

$this->title = 'Create Respromotion';
$this->params['breadcrumbs'][] = ['label' => 'Respromotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respromotion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
