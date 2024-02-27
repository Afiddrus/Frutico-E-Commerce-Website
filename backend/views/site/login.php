<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>
<!-- <div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div> -->

<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'user']]); ?>

            <?= $form->field($model, 'username',  ['inputOptions' => ['class' => 'form-control form-control-user', 'placeholder' => 'Enter your username']])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password',  ['inputOptions' => ['class' => 'form-control form-control-user', 'placeholder' => 'Enter your password']])->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <!-- <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                </div>
            </div> -->
            <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                Login
            </a> -->
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
            <hr>

            <?php ActiveForm::end() ?>
            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['/site/forgot-password']) ?>">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>