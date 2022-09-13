<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="mb-4 text-center">
      <img src="theme/images/ct2.png" width="180" alt="" />
    </div>
    <div class="card">
      <div class="card-body">
          <div class="border p-4 rounded">
              <div class="text-center">
                  <h3 class="">Sign in</h3>
                  <p>Don't have an account yet? <a href="#">Contact Administrator</a>
                  </p>
              </div>
              <div class="login-separater text-center mb-4"> <span>OR SIGN HERE</span>
								<hr/>
							</div>
              <?php $form = ActiveForm::begin([
                  'id' => 'login-form',
                  'layout' => 'horizontal',
                  'fieldConfig' => [
                      'template' => "{label}\n{input}\n{error}",
                      'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                      'inputOptions' => ['class' => 'col-lg-3 form-control'],
                      'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                  ],
              ]); ?>
                  <label for="inputEmailAddress" class="form-label">Username</label>
                  <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>

                  <label for="inputEmailAddress" class="form-label">Password</label>
                  <?= $form->field($model, 'password')->passwordInput()->label(false) ?>

                  <div class="form-group">
                      <div class="offset-lg-1 col-lg-11">
                          <?= Html::submitButton('<i class="bx bxs-lock-open"></i> Sign in', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
                      </div>
                  </div>

              <?php ActiveForm::end(); ?>

              <div class="offset-lg-1" style="color:#999;">
                  User credentils provided by <code>Administrator</code>.
              </div>
            </div>
          </div>
    </div>
</div>
