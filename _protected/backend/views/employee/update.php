<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'แก้ไขข้อมูลพนักงาน:'.$model->EmpFName."  " .$model->EmpLname;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลพนักงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDEmp, 'url' => ['view', 'id' => $model->IDEmp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
