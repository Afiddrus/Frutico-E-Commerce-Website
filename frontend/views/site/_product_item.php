<?php

/** @var \common\models\Product $model  */

use yii\helpers\StringHelper;
use yii\helpers\Url;


?>

<!-- favicon -->
<link rel="shortcut icon" type="image/png" href="img/favicon.png">
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="/css/all.min.css">
<!-- bootstrap -->
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<!-- owl carousel -->
<link rel="stylesheet" href="/css/owl.carousel.css">
<!-- magnific popup -->
<link rel="stylesheet" href="/css/magnific-popup.css">
<!-- animate css -->
<link rel="stylesheet" href="/css/animate.css">
<!-- mean menu css -->
<link rel="stylesheet" href="/css/meanmenu.min.css">
<!-- main style -->
<link rel="stylesheet" href="/css/main.css">
<!-- responsive -->
<link rel="stylesheet" href="/css/responsive.css">


<!-- jquery -->
<script src="/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="/js/sticker.js"></script>
<!-- main js -->
<script src="/js/main.js"></script>

<div class="single-product-item">
    <div class="product-image">
        <a href="<?= Yii::$app->urlManager->createUrl(['site/detail-product', 'id' => $model->id]) ?>">
            <img src="<?php echo $model->getImageUrl() ?>" style="width:150px;height:150px" alt="">
        </a>
    </div>
    <h3><?php echo $model->name ?></h3>
    <p class="product-price"><span>Per Kg</span><?php echo Yii::$app->formatter->asCurrency($model->price) ?></p>
    <p class="product-price"><span><?php echo $model->getShortDescription() ?></span></p>
    <a href="<?php echo Url::to(['/cart/add', 'id' => $model->id]) ?>" class="cart-btn btn-add-to-cart" onclick="addToCartAndDisableButton(this, <?php echo $model->id ?>); return false;" style="  text-decoration: none;">
        <i class="fas fa-shopping-cart"></i> Add to Cart
    </a>
</div>



<!-- <div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
        <div class="product-image">
            <a href="single-product.html"><img src="img/products/product-img-2.jpg" alt=""></a>
        </div>
        <h3>Berry</h3>
        <p class="product-price"><span>Per Kg</span> 70$ </p>
        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
    </div>
</div>
<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
    <div class="single-product-item">
        <div class="product-image">
            <a href="single-product.html"><img src="img/products/product-img-3.jpg" alt=""></a>
        </div>
        <h3>Lemon</h3>
        <p class="product-price"><span>Per Kg</span> 35$ </p>
        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
    </div>
</div> -->