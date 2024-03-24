<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

$cartItemCount = $this->params['cartItemCount'];


AppAsset::register($this);
?>

<?php $this->beginBlock('hero'); ?>
<!-- Konten hero area -->

<?php $this->endBlock(); ?>


<?php $this->beginPage() ?>
<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="https://i.ibb.co/W3P0ZkK/logo-removebg.png">
    <title>FRUTICO</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/logo-removebg.png">
    <!-- google font -->

    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="<?= Yii::$app->homeUrl ?>">
                                <img src="https://i.ibb.co/W3P0ZkK/logo-removebg.png" alt="Logo" style="border-radius: 50%; padding: 0px; background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 1)); box-shadow: 0 0 0 0px white; width: 55px; height:55px">
                            </a>
                        </div>

                        <!-- logo -->

                        <!-- menu start -->
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
                                    <a class="shopping-cart" href="/cart/index">
                                        <i class="fas fa-shopping-cart " id="cart-badge" style="font-weight: 700;font-size:16px" class="badge badge-light">
                                            <span id="cart-quantity" style="font-weight: 700;font-size:14px;background-color:#F28123;margin-left:0.5vw" class="badge badge-light"><?= $this->params['cartItemCount'] ?></span>
                                        </i>
                                    </a>
                                </li>
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
                        <script>
                            $(document).ready(function() {
                                // Ambil path URL saat ini
                                var currentPath = window.location.pathname;

                                // Daftar ID menu yang sesuai dengan halaman
                                var menuIds = {
                                    "/site/index": "home-menu",
                                    "/site/shop": "shop-menu",
                                    // Tambahkan entri lain sesuai dengan halaman yang Anda miliki
                                };

                                // Loop melalui menuIds dan atur warna menu yang sesuai
                                for (var path in menuIds) {
                                    if (currentPath === path) {
                                        var menuId = menuIds[path];
                                        $("#" + menuId).css("color", "#F28123"); // Atur warna yang diinginkan
                                    }
                                }
                            });
                        </script>

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
    <!-- end search area -->

    <!-- <?php if ($this->beginBlock('hero')) : ?> -->
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
    <!-- <?php $this->endBlock(); ?> -->
    <!-- <?php endif; ?> -->


    <main>
        <?= $content ?>
    </main>

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
    <script src="/js/app.js"></script>


    <style>
        .main-menu ul li a {
            color: #fff;
            /* Warna default untuk semua menu */
            font-weight: 700;
            text-decoration: none;
            transition: color 0.3s;
        }

        .main-menu ul li a:hover {
            color: #F28123;
            /* Warna saat hover */
        }

        /* Menambahkan warna oranye pada menu yang aktif (Shop) */
        .main-menu ul li.active-menu-item a {
            color: #F28123;
        }
    </style>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
