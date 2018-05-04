<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Foodtype */

$this->title = $model->IDFoodType;
$this->params['breadcrumbs'][] = ['label' => 'Foodtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foodtype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDFoodType], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDFoodType], [
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
            'IDFoodType',
            'FoodTypeName:ntext',
        ],
    ]) ?>

</div>
