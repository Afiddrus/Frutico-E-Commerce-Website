<?php

/** @var \yii\web\View $this */
/** @var string $message */

$this->title = 'Forbidden';
$this->context->layout = '_guestLayout';

?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-8">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Forbidden</h4>
                <p><?= $message ?></p>
            </div>
        </div>
    </div>
</div>