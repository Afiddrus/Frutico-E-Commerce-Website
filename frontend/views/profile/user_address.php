<?php

use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

$this->context->layout = '_guestLayout';
/** @var \yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */

?>

<?php \yii\widgets\Pjax::begin([
    'enablePushState' => false
]) ?>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif ?>


<!-- <?php if (isset($success) && $success) : ?>
    <div class="alert alert-success">
        Your address was successfully updated
    </div>
<?php endif ?> -->
<?php $addressForm = ActiveForm::begin([
    'action' => ['/profile/update-address'],
    'options' => [
        'data-pjax' => 1
    ]
]) ?>
<?= $addressForm->field($userAddress, 'address')->textInput(['class' => 'form-control']) ?>
<?= $addressForm->field($userAddress, 'city')->textInput(['class' => 'form-control']) ?>
<?= $addressForm->field($userAddress, 'state')->textInput(['class' => 'form-control']) ?>
<?= $addressForm->field($userAddress, 'country')->textInput(['class' => 'form-control']) ?>
<?= $addressForm->field($userAddress, 'zipcode')->textInput(['class' => 'form-control']) ?>
<button class="btn btn-primary">Update</button>
<?php ActiveForm::end() ?>

<?php \yii\widgets\Pjax::end() ?>