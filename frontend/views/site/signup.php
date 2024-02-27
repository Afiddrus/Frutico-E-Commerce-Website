<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->context->layout = '_guestLayout';
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'lastname')->textInput(['autofocus' => true]) ?>
                </div>
            </div>


            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<style>
    .site-signup {
        text-align: center;
        padding: 100px 0;
        /* Menambahkan padding atas dan bawah agar terlihat lebih baik */
    }

    .site-signup .row {
        display: flex;
        justify-content: center;
    }

    .site-signup .col-lg-5 {
        max-width: 400px;
        /* Mengatur lebar maksimal agar tampilan tetap teratur */
    }
</style>