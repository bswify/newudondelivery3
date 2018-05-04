<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Favoritemenu */

$this->title = 'Update Favoritemenu: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Favoritemenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDFavoriteManu, 'url' => ['view', 'id' => $model->IDFavoriteManu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favoritemenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
