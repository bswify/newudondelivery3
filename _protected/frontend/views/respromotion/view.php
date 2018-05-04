<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Respromotion */

$this->title = $model->IDResPromotion;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลโปรโมชั่นของร้าน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respromotion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->IDResPromotion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->IDResPromotion], [
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
            //'IDResPromotion',
            'ResPromotionName:ntext',
         
            'ResPromotionStart',
            'ResPromotionEnd',
            //'IDRestaurant',
        ],
    ]) ?>

</div>
