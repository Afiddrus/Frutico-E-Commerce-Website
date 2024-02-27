<?php

/** @var array $items */
/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

$this->context->layout = '_guestLayout';
$this->title = 'Cart';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php $this->registerCsrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<title>BuahMarket</title>
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
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a id="home-menu" href="<?= Url::to(['/site/index']) ?>">Home</a></li>
                                <!-- <ul class="sub-menu">
                                    <li><a href="index.html">Static Home</a></li>
                                    <li><a href="index_2.html">Slider Home</a></li>
                                </ul>
                                </li> -->

                                <li><a id="shop-menu" href="<?= Url::to(['/site/shop']) ?>">Shop</a></li>
                                <li><a id="history-menu" href="<?= Url::to(['/site/history']) ?>">History Purchase</a></li>
                                <li>
                                    <div class="header-icons">


                                        <?php if (Yii::$app->user->isGuest) : ?>

                                            <?= Html::a('Sign Up', ['/site/signup']) ?>


                                            <?= Html::a('Login', ['/site/login']) ?>

                                        <?php else : ?>

                                            <a class="user-display-name" href="#">
                                                <?= Yii::$app->user->identity->getDisplayName() ?>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <?= Html::a(
                                                        'Profile',
                                                        ['/profile/index'],
                                                        ['style' => 'font-weight: 700;',]
                                                    ) ?>
                                                </li>
                                                <li>
                                                    <?= Html::a(
                                                        'Logout',
                                                        ['/site/logout'],
                                                        ['style' => 'font-weight: 700;', 'data-method' => 'post']
                                                    ) ?>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                        <a class="shopping-cart" href="/cart/index">
                                            <i class="fas fa-shopping-cart badge-danger" id="cart-badge" style="font-weight: 700;font-size:16px" class="badge badge-light">
                                                <span id="cart-quantity" style="font-weight: 700;font-size:14px;background-color:#F28123;margin-left:0.5vw" class="badge badge-light"><?= $this->params['cartItemCount'] ?></span>
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>

                        <style>
                            /* Style for the user's display name and hover effect */
                            .user-display-name {
                                color: white;
                                font-weight: 700;
                                text-decoration: none;
                                transition: color 0.3s;
                                /* Add smooth transition effect for color change */
                            }

                            /* Hover effect for the user's display name */
                            .user-display-name:hover {
                                color: #F28123;
                            }
                        </style>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <?php if (!empty($items)) : ?>
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item) : ?>
                                        <tr class="table-body-row" data-id="<?php echo $item['id'] ?>" data-url="<?php echo Url::to(['/cart/delete']) ?>">
                                            <td>
                                                <?php echo Html::a('<i class="far fa-window-close"></i>', ['/cart/delete', 'id' => $item['id']], [
                                                    'class' => 'btn btn-outline-danger btn-sm product-remove-link',
                                                    'data-method' => 'post', // Tetapkan metode POST untuk anchor tag
                                                    'data-confirm' => '', // Hapus data-confirm
                                                    'data-id' => $item['id'], // Tambahkan data-id untuk identifikasi item
                                                    // Hapus onclick dari sini
                                                ]) ?>
                                            </td>

                                            <td class="product-image">
                                                <img src="<?php echo Yii::$app->params['frontendUrl'] . '/storage' . $item['image']  ?>" style="width:50px" alt="<?php echo $item['name'] ?>">
                                            </td>
                                            <td class="product-name"><?php echo $item['name'] ?></td>
                                            <td class="product-price"><?php echo $item['price'] ?></td>
                                            <td class="product-quantity">
                                                <input type="number" min="1" class="form-control item-quantity" value="<?php echo $item['quantity']; ?>">
                                            </td>
                                            <td class="product-total"><?php echo $item['total_price'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <?php
                            $subtotal = 0;
                            foreach ($items as $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                            }

                            $shippingCost = 45000; // Example shipping cost in IDR

                            $total = $subtotal + $shippingCost;
                            ?>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>Rp <?= number_format($shippingCost, 0, ',', '.') ?></td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="<?php echo Url::to(['/site/shop']) ?>" class="boxed-btn">Update Cart</a>
                            <?php if (Yii::$app->user->isGuest) : ?>
                                <script>
                                    $(document).ready(function() {
                                        $('#checkout-button').click(function(e) {
                                            e.preventDefault(); // Prevent the default click action
                                            console.log('Tombol "Check Out" diklik'); // Tambahkan ini
                                            Swal.fire({
                                                title: 'You must login first',
                                                text: 'before accessing checkout.',
                                                icon: 'error',
                                            });
                                        });
                                    });
                                </script>
                            <?php endif; ?>

                            <?php if (!Yii::$app->user->isGuest) : ?>
                                <a href="<?php echo Url::to(['cart/checkout-page']) ?>" class="boxed-btn black">Check Out</a>
                            <?php else : ?>
                                <a onclick="GuestCart()" class="boxed-btn black" id="checkout-button">Check Out</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>

                    <p class="text-muted text-center p-10">No Product in Cart.</p>

                <?php endif; ?>
                <!-- <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <p class="text-muted text-center p-10">No Product in Cart.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Shop</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

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
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    </script>

    <script>
        function GuestCart() {
            Swal.fire({
                title: 'You must login first',
                text: 'before accessing checkout.',
                icon: 'error',
            });
        }
    </script>

    <?php $this->endBody() ?>


</body>

</html>
<?php $this->endPage();
