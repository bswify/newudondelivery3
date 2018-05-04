<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'เข้าสู่ระบบ');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="orange">
        <h4 class="title">
          <h1><?= Html::encode($this->title) ?></h1>
        </h4>
<!--        <p class="category"><= Yii::t('app', 'Please fill out the following fields to login:'); ?></p>-->
      </div>
      <div class="card-content table-responsive">


        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?php //-- use email or username field depending on model scenario --// ?>
        <?php if ($model->scenario === 'lwe'): ?>
            <?= $form->field($model, 'email') ?>
        <?php else: ?>
            <?= $form->field($model, 'username') ?>
        <?php endif ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
<!--        <= $form->field($model, 'rememberMe')->checkbox() ?>-->

<!--        <div style="color:#999;margin:1em 0">-->
<!--            <= Yii::t('app', 'If you forgot your password you can') ?>-->
<!--            <= Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.-->
<!--        </div>-->

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'เข้าสูระบบ'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>



      </div>
    </div>
  </div>

    

</div>
