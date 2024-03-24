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

$this->context->layout = 'main';
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
                                            <td class="product-quantity" style="text-align: center;">
                                                <input type="number" min="1" class="form-control item-quantity" value="<?php echo $item['quantity']; ?>" style="display: inline-block; width: 80px; text-align: center;">
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
    <!-- <div class="logo-carousel-section"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <p class="text-muted text-center p-10">No Product in Cart.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- end logo carousel -->

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
