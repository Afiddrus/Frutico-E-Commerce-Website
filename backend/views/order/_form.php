<?php

use common\models\Order;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var common\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'status', ['options' => ['class' => 'status-field']])->dropDownList(
        [
            Order::STATUS_COMPLETED => 'Completed',
            Order::STATUS_DRAFT => 'Draft',
            Order::STATUS_FAILURED => 'Failured',
            // Add other status options here
        ],
        ['class' => 'form-control']
    )->label('Status'); ?>




    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['disabled' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>