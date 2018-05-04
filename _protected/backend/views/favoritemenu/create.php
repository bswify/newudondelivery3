<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Favoritemenu */

$this->title = 'Create Favoritemenu';
$this->params['breadcrumbs'][] = ['label' => 'Favoritemenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritemenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
