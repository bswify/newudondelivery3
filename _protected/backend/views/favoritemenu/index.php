<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FavoritemenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favoritemenus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favoritemenu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Favoritemenu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDFavoriteManu',
            'IDFood',
            'IDCustomer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
