<?php

/** @var \common\models\Order $order */
/** @var \common\models\OrderAddress $orderAddress */
/** @var array $cartItems */
/** @var int $productQuantity */
/** @var float $totalPrice */

use yii\helpers\Html;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

$this->context->layout = 'main';
$this->title = 'Checkout';
AppAsset::register($this);

$userAddress = \common\models\UserAddress::findOne(['user_id' => Yii::$app->user->identity->id]);

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
<link rel="shortcut icon" type="image/png" href="/img/favicon.png">
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="/css/all.min.css">
<!-- bootstrap -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
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


    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <?php $form = ActiveForm::begin([
        'id' => 'checkout-form',
        'action' => ['/cart/submit-order'],
    ]); ?>
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> -->
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <!-- ... Form fields ... -->
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'checkout-form',
                                            'action' => ['/cart/submit-order'],
                                        ]); ?>

                                        <?= $form->field($order, 'firstname')->textInput(['id' => 'order-firstname', 'name' => 'Order[firstname]', 'value' => Yii::$app->user->identity->firstname, 'required' => true]) ?>
                                        <?= $form->field($order, 'lastname')->textInput(['id' => 'order-lastname', 'name' => 'Order[lastname]', 'value' => Yii::$app->user->identity->lastname, 'required' => true]) ?>
                                        <?= $form->field($order, 'email')->textInput(['id' => 'order-email', 'name' => 'Order[email]', 'value' => Yii::$app->user->identity->email, 'required' => true]) ?>
                                    </div>
                                </div>
                                <!-- </div> -->
                                <div class="card single-accordion">

                                    <!-- ... Other form fields ... -->
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Shipping Address
                                            </button>
                                        </h5>
                                    </div>
                                    <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample"> -->
                                    <div class="card-body">

                                        <!-- Form fields for OrderAddress -->
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'checkout-form',
                                            'action' => ['/cart/create-order'],
                                        ]); ?>

                                        <!-- Check if user address is null -->
                                        <?php if ($userAddress === null) : ?>
                                            <!-- If user address is null, display manual input fields -->
                                            <?= $form->field($orderAddress, 'address')->textInput(['id' => 'orderaddress-address', 'name' => 'OrderAddress[address]', 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'city')->textInput(['id' => 'orderaddress-city', 'name' => 'OrderAddress[city]', 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'state')->textInput(['id' => 'orderaddress-state', 'name' => 'OrderAddress[state]', 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'country')->textInput(['id' => 'orderaddress-country', 'name' => 'OrderAddress[country]', 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'zipcode')->textInput(['id' => 'orderaddress-zipcode', 'name' => 'OrderAddress[zipcode]', 'required' => true]) ?>
                                        <?php else : ?>
                                            <!-- If user address is not null, display user address -->
                                            <?= $form->field($orderAddress, 'address')->textInput(['id' => 'orderaddress-address', 'name' => 'OrderAddress[address]', 'value' => $userAddress->address, 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'city')->textInput(['id' => 'orderaddress-city', 'name' => 'OrderAddress[city]', 'value' => $userAddress->city, 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'state')->textInput(['id' => 'orderaddress-state', 'name' => 'OrderAddress[state]', 'value' => $userAddress->state, 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'country')->textInput(['id' => 'orderaddress-country', 'name' => 'OrderAddress[country]', 'value' => $userAddress->country, 'required' => true]) ?>
                                            <?= $form->field($orderAddress, 'zipcode')->textInput(['id' => 'orderaddress-zipcode', 'name' => 'OrderAddress[zipcode]', 'value' => $userAddress->zipcode, 'required' => true]) ?>
                                        <?php endif; ?>

                                        <!-- Other form fields -->

                                        <?php ActiveForm::end(); ?>



                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">

                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th colspan="2">Your order Details</th>
                                </tr>
                            </thead>

                            <tbody class="order-details-body">

                                <tr>
                                    <td>Total Products</td>
                                    <td class="text-center">
                                        <?php echo $productQuantity ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td>
                                        <?php echo Yii::$app->formatter->asCurrency($totalPrice) ?>
                                    </td>
                                </tr>
                                <tr style="display: none;">
                                    <td id="firstname-td" data-firstname="<?= Html::encode($order->firstname) ?>">Firstname:</td>
                                    <td><?= Html::encode($order->firstname) ?></td>
                                </tr>
                                <tr style="display: none;">
                                    <td id="lastname-td" data-lastname="<?= Html::encode($order->lastname) ?>">Lastname:</td>
                                    <td><?= Html::encode($order->lastname) ?></td>
                                </tr>
                                <tr style="display: none;">
                                    <td id="email-td" data-email="<?= Html::encode($order->email) ?>">Email:</td>
                                    <td><?= Html::encode($order->email) ?></td>
                                </tr>

                                <!-- <tr>
                                    <td>Product</td>
                                    <td>Total</td>
                                </tr>
                                <tr>
                                    <td>Strawberry</td>
                                    <td>$85.00</td>
                                </tr>
                                <tr>
                                    <td>Berry</td>
                                    <td>$70.00</td>
                                </tr>
                                <tr>
                                    <td>Lemon</td>
                                    <td>$35.00</td>
                                </tr>
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>$190</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$50</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>$240</td>
                                </tr> -->
                            </tbody>
                        </table>
                        <br>
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems as $item) : ?>
                                    <tr class="table-body-row" data-id="<?php echo $item['id'] ?>" data-url="<?php echo Url::to(['/cart/change-quantity']) ?>">
                                        <!-- <td><?php echo Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                                                        'class' => 'btn btn-danger, btn-outline btn-sm'
                                                    ]) ?></td> -->
                                        <td class="product-image">
                                            <img src="<?php echo Yii::$app->params['frontendUrl'] . '/storage' . $item['image']  ?>" style="width:50px" alt="<?php echo $item['name'] ?>">
                                        </td>
                                        <td class="product-name"><?php echo $item['name'] ?></td>
                                        <td class="product-price"><?php echo $item['price'] ?></td>
                                        <td class="product-quantity text-center">
                                            <?php echo $item['quantity'] ?> </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="#" class="boxed-btn" id="place-order-btn">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <!-- end check out section -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
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
    <?php ActiveForm::end(); ?>
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
    <script>
        $(document).ready(function() {
            $('.boxed-btn').click(function(event) {
                event.preventDefault();

                // Mendapatkan jumlah item dalam keranjang
                const cartItemCount = <?php echo $this->params['cartItemCount']; ?>;

                // Periksa apakah keranjang kosong
                if (cartItemCount === 0) {
                    alert('Your cart is empty. Add items to your cart before placing an order.');
                    return;
                }

                const $form = $('#checkout-form');
                const data = $form.serializeArray();
                const requiredFields = ['#order-firstname', '#order-lastname', '#order-email', '#orderaddress-address', '#orderaddress-city', '#orderaddress-state', '#orderaddress-zipcode'];
                let isValid = true;

                requiredFields.forEach(fieldId => {
                    const fieldValue = $(fieldId).val();
                    if (!fieldValue.trim()) {
                        isValid = false;
                        return false;
                    }
                });

                if (!isValid) {
                    Swal.fire({
                        title: 'You must fill in all required fields!',
                        icon: 'error',
                    }).then(function() {
                        console.error(error);
                    });

                    return;
                }
                // Ambil informasi pengguna yang saat ini masuk
                const firstname = '<?= Yii::$app->user->identity->firstname ?>';
                const lastname = '<?= Yii::$app->user->identity->lastname ?>';
                const email = '<?= Yii::$app->user->identity->email ?>';

                // Isi input field dengan informasi pengguna
                $('#order-firstname').val(firstname);
                $('#order-lastname').val(lastname);
                $('#order-email').val(email);

                // Validasi bahwa firstname, lastname, dan email tidak kosong
                // if (!firstname || !lastname || !email) {
                //     alert('Harap isi semua field yang diperlukan.');
                //     return;
                // }

                // Menambahkan CSRF token ke dalam data
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                data.push({
                    name: '_csrf',
                    value: csrfToken
                });


                // Mendapatkan total_price dari variabel $totalPrice
                // const total_price = <?php echo json_encode($totalPrice); ?>;

                // Generate angka random untuk "transactionId"
                const randomTransactionId = Math.floor(Math.random() * 10000) + 1;

                // Tambahkan data ke dalam array
                data.push({
                    name: 'transactionId',
                    value: randomTransactionId
                });
                data.push({
                    name: 'status',
                    value: 'COMPLETED'
                });

                // Tambahkan data dari form field ke dalam array
                data.push({
                    name: 'firstname',
                    value: firstname
                });
                data.push({
                    name: 'lastname',
                    value: lastname
                });
                data.push({
                    name: 'email',
                    value: email
                });

                // Tambahkan total_price ke dalam data
                data.push({
                    name: 'total_price',
                    value: <?php echo json_encode($totalPrice); ?>
                });

                data.push({
                    name: 'address',
                    value: $('#orderaddress-address').val()
                });
                data.push({
                    name: 'city',
                    value: $('#orderaddress-city').val()
                });

                data.push({
                    name: 'state',
                    value: $('#orderaddress-state').val()
                });

                data.push({
                    name: 'country',
                    value: $('#orderaddress-country').val()
                });
                data.push({
                    name: 'zipcode',
                    value: $('#orderaddress-zipcode').val()
                });

                console.log(data);
                $.ajax({
                    method: 'POST',
                    url: '<?php echo \yii\helpers\Url::to(['/cart/create-order']) ?>',
                    data: data,
                    headers: {
                        'X-CSRF-Token': csrfToken, // Sesuaikan dengan nama header yang diperlukan oleh server Anda
                        'Content-Type': 'application/x-www-form-urlencoded' // Sesuaikan dengan jenis konten yang diperlukan oleh server Anda
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Order successfully placed!',
                            icon: 'success',
                        }).then(function() {
                            window.location.href = '<?php echo \yii\helpers\Url::to(['/site/index']) ?>';
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'An error occurred while processing the order.',
                            text: error.responseText, // Anda dapat menampilkan pesan kesalahan dari server di sini
                            icon: 'error',
                        }).then(function() {
                            console.error(error);
                        });
                    }
                });


            });
        });
    </script>

    <?php $this->endBody() ?>

</body>

<style>
    .cart-table td,
    .cart-table th {
        padding: 10px;
        /* Atur nilai sesuai kebutuhan Anda */
    }

    .cart-table th {
        text-align: left;
        /* Atur alignment teks jika diperlukan */
    }
</style>

</html>

<?php $this->endPage();
