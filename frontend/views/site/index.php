<?php

/** @var yii\web\View $this */

use common\models\Product;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'FRUTICO';

// Register your CSS files
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/all.min.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/bootstrap/css/bootstrap.min.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/owl.carousel.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/magnific-popup.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/animate.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/meanmenu.min.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/main.css');
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/css/responsive.css');
// ... register other CSS files ...

// Register your JS files
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/jquery-1.11.3.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/bootstrap/js/bootstrap.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/jquery.countdown.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/jquery.isotope-3.0.6.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/waypoints.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/owl.carousel.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/jquery.magnific-popup.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/jquery.meanmenu.min.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/sticker.js');
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@web/assets') . '/js/main.js');
// ... register other JS files ...

$this->context->layout = 'main';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/web');
$faviconUrl = 'https://i.ibb.co/W3P0ZkK/logo-removebg.png'; // Sesuaikan dengan link favicon yang Anda berikan
?>

<!-- favicon -->
<link rel="shortcut icon" type="image/png" href="<?= $faviconUrl ?>">
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
<script src="/js/bootstrap/bootstrap.min.js"></script>
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

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Fresh & Organic</p>
                        <h1>Delicious Seasonal Fruits</h1>
                        <div class="hero-btns">
                            <a href="shop.html" class="boxed-btn">Fruit Collection</a>
                            <a href="contact.html" class="bordered-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<!-- features list section -->
<!-- <div class="list-section pt-80 pb-80">

    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Free Shipping</h3>
                        <p>When order over $75</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>24/7 Support</h3>
                        <p>Get support all day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Refund</h3>
                        <p>Get refund within 3 days!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> -->
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><a href="<?= Yii::$app->urlManager->createUrl(['site/shop']) ?>"><span class="orange-text">Our</span></a> Products</h3>
                    <p><strong>Click the following menu to explore our products in detail.</strong></p>
                    <div class="hero-btns">
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/shop']) ?>" class="boxed-btn">All Products</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        echo \yii\widgets\ListView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => Product::find()->where(['>', 'stock', 0]), // Menampilkan produk dengan stok di atas 0
                'pagination' => [
                    'pageSize' => 3, // Tampilkan hanya 3 item per halaman
                ],
            ]),
            'layout' => '<div class="row">{items}</div>', // Hanya menampilkan item tanpa summary dan pager
            'itemView' => '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-6 text-center product-item',
            ],
            'pager' => false, // Menonaktifkan pager
        ]);
        ?>
        <div class="text-center mt-4">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/shop']) ?>" class="boxed-btn">See All Products</a>
        </div>


    </div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                                <strong>30%</strong> <br> off per kg
                            </span>
                        </div>
                    </div>
                    <img src="img/a.jpg" alt="">
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">Deal</span> of the month</h3>
                <h4>Hikan Strwaberry</h4>
                <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                <!--Countdown Timer-->
                <style>
                    /* Tambahkan transisi CSS ke elemen yang akan diubah */
                    .count {
                        transition: transform 0.5s ease-in-out;
                    }
                </style>

                <div class="time-counter">
                    <div class="time-countdown clearfix" data-countdown="2024/09/30 00:00:00"> <!-- Ganti dengan tanggal dan waktu target Anda -->
                        <div class="counter-column">
                            <div class="inner"><span class="count" id="days">00</span>Days</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count" id="hours">00</span>Hours</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count" id="minutes">00</span>Mins</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count" id="seconds">00</span>Secs</div>
                        </div>
                    </div>
                </div>

                <script>
                    var countdownDate = new Date(document.querySelector('.time-countdown').getAttribute('data-countdown')).getTime();

                    var x = setInterval(function() {
                        var now = new Date().getTime();
                        var distance = countdownDate - now;

                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Menampilkan hasil countdown pada elemen dengan ID yang sesuai
                        document.getElementById("days").innerHTML = days;
                        document.getElementById("hours").innerHTML = hours;
                        document.getElementById("minutes").innerHTML = minutes;
                        document.getElementById("seconds").innerHTML = seconds;

                        // Mengubah transform scale untuk efek animasi
                        document.querySelectorAll('.count').forEach(function(element) {
                            element.style.transform = "scale(1.1)";
                            setTimeout(function() {
                                element.style.transform = "scale(1)";
                            }, 500);
                        });

                        if (distance < 0) {
                            clearInterval(x);
                            document.querySelector('.time-countdown').innerHTML = "EXPIRED";
                        }
                    }, 1000);
                </script>

                <!-- <a href="<?php echo Url::to(['/cart/add']) ?>" class="cart-btn btn-add-to-cart" onclick="location.reload();"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
            </div>
        </div>
    </div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="img/avaters/avatar1.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Saira Hakim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="img/avaters/avatar2.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>David Niph <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="img/avaters/avatar3.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Jacob Sikim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->

<style>
    .text-center {
        text-align: center;
    }
</style>