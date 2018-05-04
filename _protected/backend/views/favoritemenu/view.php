<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Favoritemenu */

$this->title = $model->IDFavoriteManu;
$this->params['breadcrumbs'][] = ['label' => 'Favoritemenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritemenu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDFavoriteManu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDFavoriteManu], [
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
            'IDFavoriteManu',
            'IDFood',
            'IDCustomer',
        ],
    ]) ?>

</div>
