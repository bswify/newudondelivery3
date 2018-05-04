<?php
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'สมัครสมาชิก');
$this->params['breadcrumbs'][] = $this->title;
$script = <<< JS

		$(document).ready(function(){

		// Javascript method's body can be found in assets/js/demos.js
				demo.initDashboardPageCharts();

		});


JS;
$this->registerJs($script,View::POS_END,'myOption');
?>
<div class="site-signup">



  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="orange">
        <h4 class="title">
          <h1><?= Html::encode($this->title) ?></h1>
        </h4>
<!--        <p class="category"><= Yii::t('app', 'Please fill out the following fields to signup:') ?></p>-->
      </div>
      <div class="card-content table-responsive">
				<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

		    <?= $form->field($model, 'username') ?>
		    <?= $form->field($model, 'email') ?>
		    <?= $form->field($model, 'password')->widget(PasswordInput::classname(), []) ?>

		    <div class="form-group">
		      <?= Html::submitButton(Yii::t('app', 'สมัครสมาชิก'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>

		    <?php if ($model->scenario === 'rna'): ?>
		    <div style="color:#666;margin:1em 0">
		      <i>*<?= Yii::t('app', 'We will send you an email with account activation link.') ?></i>
		    </div>
		    <?php endif ?>
      </div>
    </div>
  </div>



</div>
