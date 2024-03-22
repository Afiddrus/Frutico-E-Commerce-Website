<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->context->layout = '_guestLayout'; // Assuming you have a custom layout set up for guest pages
$this->title = 'Login'; // Updating the title
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= Html::encode($this->title) ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-- Image Section -->
                    <img src="images/white.png" alt="">
                    <!-- <div class="text">
                        <p>Join the community of developers <i>- ludiflex</i></p>
                    </div> -->
                </div>

                <div class="col-md-6 right">
                    <div class="input-box">
                        <header><?= Html::encode($this->title) ?></header>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="input-field">
                            <?= $form->field($model, 'username')->textInput(['class' => 'input', 'id' => 'email', 'required' => true, 'autocomplete' => 'off', 'placeholder' => 'Email'])->label(false) ?>
                        </div>
                        <div class="input-field">
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'input', 'id' => 'pass', 'required' => true, 'placeholder' => 'Password'])->label(false) ?>
                        </div>

                        <div class="input-field">
                            <?= Html::submitButton('Sign In', ['class' => 'submit']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <div class="signin">
                            <span> If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.</span>
                            <br>
                            <span>Doesn't have an account? <?= Html::a('Sign up here', ['site/signup']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    /* Existing CSS styles */

    /* POPPINS FONT */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    .wrapper {
        background: #ececec;
        padding: 0 20px 0 20px;
    }

    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .side-image {
        background-image: url("https://i.ibb.co/W3P0ZkK/logo-removebg.png");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
        position: relative;
    }

    .row {
        width: 900px;
        height: 550px;
        border-radius: 10px;
        background: #fff;
        padding: 0px;
        box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
    }

    .text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .text p {
        color: #fff;
        font-size: 20px;
    }

    i {
        font-weight: 400;
        font-size: 15px;
    }

    .right {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .input-box {
        width: 330px;
        box-sizing: border-box;
    }

    img {
        width: 35px;
        position: absolute;
        top: 30px;
        left: 30px;
    }

    .input-box header {
        font-weight: 700;
        text-align: center;
        margin-bottom: 45px;
    }

    .input-field {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }

    .input {
        height: 45px;
        width: 100%;
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        outline: none;
        margin-bottom: 20px;
        color: #40414a;
    }

    .input-box .input-field label {
        position: absolute;
        top: 10px;
        left: 10px;
        pointer-events: none;
        transition: .5s;
    }

    .input-field input:focus~label,
    .input-field input:not(:placeholder-shown)~label {
        top: -10px;
        font-size: 13px;
    }

    .input-field input:valid~label {
        top: -10px;
        font-size: 13px;
        color: #5d5076;
    }

    .input-field .input:focus,
    .input-field .input:valid {
        border-bottom: 1px solid #743ae1;
    }

    .submit {
        border: none;
        outline: none;
        height: 45px;
        background: #ececec;
        border-radius: 5px;
        transition: .4s;
    }

    .submit:hover {
        background: rgba(37, 95, 156, 0.937);
        color: #fff;
    }

    .signin {
        text-align: center;
        font-size: small;
        margin-top: 25px;
    }

    span a {
        text-decoration: none;
        font-weight: 700;
        color: #000;
        transition: .5s;
    }

    span a:hover {
        text-decoration: underline;
        color: #000;
    }

    @media only screen and (max-width: 768px) {
        .side-image {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;
            position: relative;
            margin-bottom: -20px;
            /* Adjust this value as needed */
        }

        img {
            width: 35px;
            position: absolute;
            top: 20px;
            left: 47%;
        }

        .text {
            position: absolute;
            top: 70%;
            text-align: center;
        }

        .text p,
        i {
            font-size: 16px;
        }

        .row {
            max-width: 420px;
            width: 100%;
        }
    }
</style>

</html>