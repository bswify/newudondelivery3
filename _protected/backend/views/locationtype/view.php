<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Locationtype */

$this->title = $model->IDLocationType;
$this->params['breadcrumbs'][] = ['label' => 'Locationtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locationtype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'กลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->IDLocationType], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDLocationType], [
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
//            'IDLocationType',
            'LocationTypeName:ntext',
        ],
    ]) ?>

</div>
