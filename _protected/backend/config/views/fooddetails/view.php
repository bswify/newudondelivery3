<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Fooddetails */

$this->title = $model->IDFoodDetails;
$this->params['breadcrumbs'][] = ['label' => 'Fooddetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fooddetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDFoodDetails], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDFoodDetails], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDFoodDetails',
            'FoodDetailName:ntext',
            'IDFood',
            'FoodDetailsPrice',
        ],
    ]) ?>

</div>
