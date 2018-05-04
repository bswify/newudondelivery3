<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Foodtype */

$this->title = 'Create Foodtype';
$this->params['breadcrumbs'][] = ['label' => 'Foodtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foodtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
