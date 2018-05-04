<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fooddetails */

$this->title = 'Create Fooddetails';
$this->params['breadcrumbs'][] = ['label' => 'Fooddetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fooddetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
