<?php

/** User: TheCodeholic */

use yii\widgets\Pjax;

$this->context->layout = '_guestLayout';
/** @var \common\models\User $user */
/** @var \yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */
?>

<style>
    .custom-form {
        border: 1px solid #ccc;
        padding: 30px;
        border-radius: 10px;
    }

    .custom-form .form-control {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
    }
</style>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="custom-form">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Address Information
                    </div>
                    <div class="card-body">
                        <?php echo $this->render('user_address', [
                            'userAddress' => $userAddress
                        ]) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Account Information
                    </div>
                    <div class="card-body">
                        <?php echo $this->render('user_account', [
                            'user' => $user
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>