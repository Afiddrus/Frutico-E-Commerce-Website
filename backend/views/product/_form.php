<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>


    <!-- <div class="container py-3">

        <div class="input-group custom-file-button">
            <label class="input-group-text" for="inputGroupFile">Pilih Gambar</label>
            <input type="file" class="form-control" id="inputGroupFile">
        </div>

    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"> -->


    <!-- <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
    </div> -->

    <?= $form->field($model, 'imageFile[]', [
        'template' => '
        <div class="mb-3">
        {input}
        {error}
        </div>
    ',
        'inputOptions' => ['class' => "form-control", 'multiple' => true]
    ])->fileInput() ?>

    <?= $form->field($model, 'multipleImageFile[]')->fileInput(['multiple' => true]) ?>

    <?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'stock')->textInput(['type' => 'number']) ?>


    <?= $form->field($model, 'status')->checkbox() ?>

    <!-- Di komen karena tidak butuh -->
    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->
    <!-- End of Command -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Style Css untuk Form Field File Input Pada Gambar -->
<!-- Karena Bootstrap 5 tidak mendukung pengeditan Placeholder -->
<style>
    .custom-file-button input[type=file] {
        margin-left: -2px !important;
    }

    .custom-file-button input[type=file]::-webkit-file-upload-button {
        display: none;
    }

    .custom-file-button input[type=file]::file-selector-button {
        display: none;
    }

    .custom-file-button:hover label {
        background-color: #dde0e3;
        cursor: pointer;
    }
</style>

<!-- End Of CSS For Form Field File  -->