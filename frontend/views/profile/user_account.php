<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\widgets\Pjax;

$this->context->layout = '_guestLayout';
/** @var \yii\web\View $this */
/** @var \common\models\User $user */

$this->title = 'Update Account';
?>

<?php Pjax::begin([
    'enablePushState' => false
]) ?>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin([
    'action' => ['/profile/update-account'],
    'options' => [
        'data-pjax' => 1
    ]
]) ?>

<?php if ($user->hasErrors()) : ?>
    <div class="alert alert-danger">
        <?= $form->errorSummary($user) ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($user, 'firstname')->textInput(['class' => 'form-control']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($user, 'lastname')->textInput(['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $form->field($user, 'username')->textInput(['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $form->field($user, 'email')->textInput(['class' => 'form-control']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($user, 'password')->passwordInput(['class' => 'form-control']) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($user, 'password_repeat')->passwordInput(['class' => 'form-control']) ?>
    </div>
</div>

<button class="btn btn-primary">Update</button>
<?php ActiveForm::end() ?>

<?php Pjax::end() ?>