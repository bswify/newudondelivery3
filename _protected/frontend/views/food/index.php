<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCss("
@media screen and (max-width: 1200px) {
	.table {
		overflow-x: auto;
		display: block;
	}
  .btn-group {
    float: left;
    display:flex;
    position: relative;
}
//.btn.btn-warning{
//padding: 5px 10px;
//    font-size: 12px;
//    line-height: 1.5;
//    border-radius: 3px;
//}

}");

$this->title = 'ข้อมูลเมนูอาหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">

    <div class="panel panel-default">
        <div class="panel-body">

            <!--    <h1><= Html::encode($this->title) ?></h1>-->
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('เพิ่มข้อมูลเมนูอาหาร', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],

//            'IDFood',
                    //'FoodImg:ntext',
                    [
                        'options' => ['style' => 'width:150px;'],
                        'format' => 'raw',
                        'attribute' => 'FoodImg',
                        'value' => function ($food) {
                            return Html::tag('div', '', [
                                'style' => 'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                               background-image:url(' . Yii::getAlias('@ShowFoodPhoto') . $food->FoodImg . ');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                        }
                    ],
                    'FoodName:ntext',
                    'FoodPrice',
                    //'IDFoodType',
                    [
                        'attribute' => 'IDFoodType',
                        'value' => 'foodType.FoodTypeName',
                    ],

                    //'IDRestaurant',
                    //'MenuTypeName:ntext',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => "การทำงาน",
                        'options' => ['style' => 'width:135px;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update} {delete} </div>',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-eye"></i>', $url,
                                    ['title' => 'View user',
                                        'class' => 'btn btn-success',
                                        'id' => 'actioncol',
                                        'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-pencil"></i>', $url,
                                    ['title' => 'Edit user',
                                        'class' => 'btn btn-success',
                                        'id' => 'actioncol',
                                        'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-trash"></i>', $url, [
                                    'title' => Yii::t('yii', 'Delete user'),
                                    'data-confirm' => Yii::t('yii', 'คุณต้องการลบรายการนี้หรือไม่?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-success',
                                    'id' => 'actioncol',
                                    'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;'
                                ]);
                            }
                        ]
                    ],// ActionColumn
                ],
            ]); ?>

        </div>
    </div>
</div>
