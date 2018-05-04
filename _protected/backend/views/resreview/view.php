<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Resreview;

/* @var $this yii\web\View */
/* @var $model backend\models\Resreview */

$this->title = $model->IDResReview;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรีวิวร้านอาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resreview-view">

    <h1>รหัสรีวิว : <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDResReview], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDResReview], [
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
//            'IDResReview',
            'ResReviewDate',
            'ResReviewScore',
            'ResComment:ntext',
            //'ResReviewImage:ntext',
            [
                'format' => 'raw',
                'attribute' => 'ResReviewImage',
                'value' => Html::img(Yii::getAlias('@ShowResReview') . '/' . $model->ResReviewImage, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'IDRestaurant',
            'IDCustomer',
        ],
    ]) ?>

</div>
