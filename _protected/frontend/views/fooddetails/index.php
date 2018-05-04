<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FooddetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลรายละเอียดอาหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fooddetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มข้อมูลรายละเอียดอาหาร', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDFoodDetails',
            'FoodDetailName:ntext',
            'IDFood',
            'FoodDetailsPrice',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
