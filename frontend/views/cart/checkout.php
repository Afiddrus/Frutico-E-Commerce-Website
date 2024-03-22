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
// Import namespace Midtrans
use Midtrans\Snap;
use Midtrans\Config;

// Atur kunci server dan konfigurasi lainnya
Config::$serverKey = 'SB-Mid-server-2qghlkw8gh35wmWdaFIVDfGQ';
Config::$isProduction = false;
Config::$isSanitized = true;
Config::$is3ds = true;

$this->context->layout = 'main';
$this->title = 'Checkout';
AppAsset::register($this);

$userAddress = \common\models\UserAddress::findOne(['user_id' => Yii::$app->user->identity->id]);

// Mengakses Client Key dari params.php
$clientKey = Yii::$app->params['midtrans']['clientKey'];

// Kemudian, gunakan $clientKey saat memuat halaman atau menggunakan metode pembayaran di sisi klien
// Contoh:


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
<!-- Midtrans -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-PSsxw4BVmroUcVAP"></script>
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

                                        <?= $form->field($order, 'firstname')->textInput(['id' => 'order-firstname', 'name' => 'Order[firstname]', 'value' => Yii::$app->user->identity->firstname, 'required' => true, 'readonly' => true]) ?>
                                        <?= $form->field($order, 'lastname')->textInput(['id' => 'order-lastname', 'name' => 'Order[lastname]', 'value' => Yii::$app->user->identity->lastname, 'required' => true, 'readonly' => true]) ?>
                                        <?= $form->field($order, 'email')->textInput(['id' => 'order-email', 'name' => 'Order[email]', 'value' => Yii::$app->user->identity->email, 'required' => true, 'readonly' => true]) ?>

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
                        <div class="table-responsive">
                            <table class="cart-table table">
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
                                                <img src="<?php echo Yii::$app->params['frontendUrl'] . '/storage' . $item['image']  ?>" style="max-width:50px; height:auto;" alt="<?php echo $item['name'] ?>">
                                            </td>
                                            <td class="product-name"><?php echo $item['name'] ?></td>
                                            <td class="product-price"><?php echo $item['price'] ?></td>
                                            <td class="product-quantity text-center">
                                                <?php echo $item['quantity'] ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <a href="#" class="boxed-btn" id="pay-button">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <!-- end check out section -->

    <!-- <div class="logo-carousel-section">
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
    </div> -->

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
    <!-- Backup Function Swal -->
    <!-- <script>
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

                // Mendapatkan CSRF token
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                data.push({
                    name: '_csrf',
                    value: csrfToken
                });

                console.log(data);
                $.ajax({
                    method: 'POST',
                    url: '<?php echo \yii\helpers\Url::to(['/cart/create-order']) ?>',
                    data: data,
                    headers: {
                        'X-CSRF-Token': csrfToken,
                        'Content-Type': 'application/x-www-form-urlencoded'
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
                            text: error.responseText,
                            icon: 'error',
                        }).then(function() {
                            console.error(error);
                        });
                    },
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                    },
                    xhrFields: {
                        withCredentials: true
                    }
                });

            });
        });
    </script> -->
    <!-- Backup Function API Whatsapp -->
    <!-- <script>
        $(document).ready(function() {
            $('#pay-button').click(function() {
                // Mendapatkan data pelanggan
                var customerName = $('#order-firstname').val() + ' ' + $('#order-lastname').val();
                var customerEmail = $('#order-email').val();
                var customerAddress = $('#orderaddress-address').val();
                var customerCity = $('#orderaddress-city').val();
                var customerState = $('#orderaddress-state').val();
                var customerZipcode = $('#orderaddress-zipcode').val();

                // Mendapatkan daftar barang dari tabel keranjang
                var items = [];
                $('.table-body-row').each(function() {
                    var productName = $(this).find('.product-name').text();
                    var productPrice = $(this).find('.product-price').text();
                    var productQuantity = $(this).find('.product-quantity').text();
                    var itemText = productName + ' (Qty: ' + productQuantity + ') - ' + productPrice;
                    items.push(itemText);
                });

                // Menghitung total harga pesanan
                var totalPrice = '<?php echo Yii::$app->formatter->asCurrency($totalPrice) ?>';

                // Mengirim pesan ke WhatsApp dengan menggunakan API WhatsApp
                var whatsappMessage = 'Halo, saya ingin memesan barang-barang berikut:\n\n';
                whatsappMessage += 'Pelanggan: ' + customerName + '\n';
                whatsappMessage += 'Alamat: ' + customerAddress + ', ' + customerCity + ', ' + customerState + ' ' + customerZipcode + '\n';
                whatsappMessage += 'Email: ' + customerEmail + '\n\n';
                whatsappMessage += 'Pesanan:\n';
                whatsappMessage += items.join('\n');
                whatsappMessage += '\n\nTotal Harga: ' + totalPrice;
                whatsappMessage += '\n\nTerima kasih atas pesanan Anda!';

                // Ganti nomor WhatsApp dengan nomor Anda
                var whatsappNumber = '6281229648915';

                // Redirect pengguna ke aplikasi WhatsApp
                // var whatsappUrl = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(whatsappMessage);
                // window.location.href = whatsappUrl;

                window.snap.embed('YOUR_SNAP_TOKEN', {
                    embedId: 'snap-container'
                });
            });
        });
    </script> -->
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

                // Mendapatkan CSRF token
                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                data.push({
                    name: '_csrf',
                    value: csrfToken
                });

                console.log(data);
                $.ajax({
                    method: 'POST',
                    url: '<?php echo \yii\helpers\Url::to(['/cart/create-order']) ?>',
                    data: data,
                    headers: {
                        'X-CSRF-Token': csrfToken,
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    success: function(response) {
                        // Mendapatkan data pelanggan
                        var customerName = $('#order-firstname').val() + ' ' + $('#order-lastname').val();
                        var customerEmail = $('#order-email').val();
                        var customerAddress = $('#orderaddress-address').val();
                        var customerCity = $('#orderaddress-city').val();
                        var customerState = $('#orderaddress-state').val();
                        var customerZipcode = $('#orderaddress-zipcode').val();

                        // Mendapatkan daftar barang dari tabel keranjang
                        var items = [];
                        $('.table-body-row').each(function() {
                            var productName = $(this).find('.product-name').text();
                            var productPrice = $(this).find('.product-price').text();
                            var productQuantity = $(this).find('.product-quantity').text();
                            var itemText = productName + ' (Jumlah: ' + productQuantity.trim() + ') - ' + productPrice;
                            items.push(itemText);
                        });

                        // Menghitung total harga pesanan
                        var totalPrice = '<?php echo Yii::$app->formatter->asCurrency($totalPrice) ?>';

                        // Format total harga
                        var formattedTotalPrice = totalPrice.replace('IDR', 'Rp ').replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                        // Mengirim pesan ke WhatsApp dengan menggunakan API WhatsApp
                        var whatsappMessage = 'Halo, saya ingin memesan barang-barang berikut:\n\n';
                        whatsappMessage += 'Pelanggan: ' + customerName + '\n';
                        whatsappMessage += 'Alamat: ' + customerAddress + ', ' + customerCity + ', ' + customerState + ' ' + customerZipcode + '\n';
                        whatsappMessage += 'Email: ' + customerEmail + '\n\n';
                        whatsappMessage += 'Pesanan:\n';
                        whatsappMessage += items.join('\n');
                        whatsappMessage += '\nTotal Harga: ' + formattedTotalPrice + '\n\n';
                        whatsappMessage += 'Terima kasih!';


                        // Ganti nomor WhatsApp dengan nomor Anda
                        var whatsappNumber = '6281229648915';
                        // 6281326962329

                        // Kirim pesan WhatsApp
                        window.open('https://api.whatsapp.com/send?phone=' + whatsappNumber + '&text=' + encodeURIComponent(whatsappMessage));

                        Swal.fire({
                            title: 'Order successfully placed!',
                            icon: 'success',
                        }).then(function() {
                            // Redirect ke halaman home setelah mengklik tombol OK
                            window.location.href = '<?php echo \yii\helpers\Url::to(['/site/index']) ?>';
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'An error occurred while processing the order.',
                            text: error.responseText,
                            icon: 'error',
                        }).then(function() {
                            console.error(error);
                        });
                    },
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                    },
                    xhrFields: {
                        withCredentials: true
                    }
                });

            });
        });
    </script>



    <!-- <script>
        $(document).ready(function() {
            $('#pay-button').click(async function() {
                try {
                    // Mendapatkan data pelanggan
                    var customerName = $('#order-firstname').val() + ' ' + $('#order-lastname').val();
                    var customerEmail = $('#order-email').val();
                    var customerAddress = $('#orderaddress-address').val();
                    var customerCity = $('#orderaddress-city').val();
                    var customerState = $('#orderaddress-state').val();
                    var customerZipcode = $('#orderaddress-zipcode').val();

                    // Mendapatkan daftar barang dari tabel keranjang
                    var items = [];
                    $('.table-body-row').each(function() {
                        var productName = $(this).find('.product-name').text();
                        var productPrice = $(this).find('.product-price').text();
                        var productQuantity = $(this).find('.product-quantity').text();
                        var itemText = productName + ' (Qty: ' + productQuantity + ') - ' + productPrice;
                        items.push(itemText);
                    });

                    // Menghitung total harga pesanan
                    var totalPrice = '<?php echo Yii::$app->formatter->asCurrency($totalPrice) ?>';

                    // URL endpoint untuk mem-post data ke actionMidtrans
                    var postUrl = '<?php echo Yii::$app->urlManager->createUrl(["cart/midtrans"]) ?>';

                    // Data yang akan dipost
                    var postData = {
                        firstname: $('#order-firstname').val(),
                        lastname: $('#order-lastname').val(),
                        email: $('#order-email').val(),
                        address: $('#orderaddress-address').val(),
                        city: $('#orderaddress-city').val(),
                        state: $('#orderaddress-state').val(),
                        zipcode: $('#orderaddress-zipcode').val(),
                        total_price: totalPrice
                    };

                    const response = await fetch(postUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(postData)
                    });

                    if (!response.ok) {
                        throw new Error('Failed to post data');
                    }

                    // Redirect pengguna ke aplikasi WhatsApp
                    // var whatsappUrl = 'https://wa.me/' + whatsappNumber + '?text=' + encodeURIComponent(whatsappMessage);
                    // window.location.href = whatsappUrl;
                } catch (error) {
                    console.error('Error:', error);
                    // Handle error as needed
                }
            });
        });
    </script>-->

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

    .cart-table-head .table-head-row th {
        border-bottom: none;
    }

    #pay-button {
        display: block;
        margin: 10 auto;
        text-align: center;
        width: fit-content;
        /* Lebar akan disesuaikan dengan teks tombol */
        padding: 10px 20px;
        /* Sesuaikan dengan kebutuhan Anda */
    }

    .order-details,
    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-details th,
    .order-details td,
    .cart-table th,
    .cart-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .order-details th {
        background-color: #f2f2f2;
    }

    .cart-table th {
        background-color: #f8f9fa;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .cart-table-head .table-head-row th {
        background-color: #f2f2f2;
        /* Sesuaikan dengan warna latar belakang header tabel pertama */
    }

    .cart-table .table-head-row th {
        background-color: #f2f2f2;
        /* Sesuaikan dengan warna latar belakang header tabel pertama */
    }
</style>

</html>

<?php $this->endPage();
