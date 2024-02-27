<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('/img/logo.png'); background-size: 250px auto; background-repeat: no-repeat; background-position: center; width: 200px; height: 550px;"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'user']]); ?>

            <?= $form->field($model, 'username', ['inputOptions' => ['class' => 'form-control form-control-user', 'placeholder' => 'Enter your username']])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control form-control-user', 'placeholder' => 'Enter your password']])->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>

            <?php ActiveForm::end() ?>

            <hr>

            <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="alert alert-danger">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <hr>

            <div class="text-center">
                <a class="small" href="<?= Url::to(['/site/forgot-password']) ?>">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>