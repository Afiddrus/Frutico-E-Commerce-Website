<?php

use yii\bootstrap5\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Shop'; // Sesuaikan judul halaman sesuai kebutuhan
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

Pjax::begin([
    'id' => 'my-pjax-container', // ID ini digunakan untuk mengidentifikasi Pjax container
]);
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
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- features list section -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-section -->

<div class="product-section mt-150 mb-150" id="top-products">
    <div class="container">
        <form class="d-flex" action="<?= Yii::$app->urlManager->createUrl(['/site/search']) ?>" method="get" id="search-form">
            <input class="form-control me-2" type="search" placeholder="Search by Product Name" aria-label="Search" name="q" id="product-search-input">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


        <?= ListView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $dataProvider->query,
                'pagination' => [
                    'pageSize' => 15, // Tampilkan hanya 3 item per halaman
                ],
            ]),
            'layout' => '{summary}<div class="row">{items}</div>{pager}',
            'itemView' => '_product_item',
            'itemOptions' => [
                'class' => 'col-lg-4 col-md-6 text-center product-item',
            ],
            'pager' => [
                'class' => LinkPager::class,
                'options' => ['class' => 'pagination'],
                'linkContainerOptions' => ['class' => 'page-item'],
                'linkOptions' => ['class' => 'page-link'],
            ],
        ]) ?>

    </div>
</div>

<?php

// Menutup widget Pjax
Pjax::end();
?>

<script>
    // Fungsi untuk menggulir halaman ke elemen dengan id "top-products"
    function scrollToTopProducts() {
        var topProducts = document.getElementById('top-products');
        if (topProducts) {
            topProducts.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }

    // Event delegation untuk paginator, panggil fungsi scrollToTopProducts saat paginator ditekan
    var paginatorContainer = document.querySelector('.pagination');
    if (paginatorContainer) {
        paginatorContainer.addEventListener('click', function(event) {
            var target = event.target;
            if (target.classList.contains('page-link')) {
                scrollToTopProducts();
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById("search-form");
        const searchInput = document.getElementById("product-search-input");
        const searchResults = document.getElementById("search-results"); // Container untuk menampilkan hasil pencarian

        // Event listener untuk mengirimkan permintaan pencarian saat input berubah
        searchInput.addEventListener("input", function() {
            // Mendapatkan nilai dari input pencarian
            const searchQuery = searchInput.value;

            // Kirim permintaan pencarian menggunakan AJAX jika panjang query memenuhi syarat
            if (searchQuery.length > 2) {
                $.ajax({
                    url: 'site/search', // Ganti dengan URL pencarian Anda
                    method: 'GET',
                    data: {
                        q: searchQuery
                    },
                    success: function(data) {
                        // Tampilkan hasil pencarian dalam container yang sesuai
                        searchResults.innerHTML = data;
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });

        // Event listener untuk menggulir halaman ke elemen dengan id "top-products"
        function scrollToTopProducts() {
            var topProducts = document.getElementById('top-products');
            if (topProducts) {
                topProducts.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        // Event delegation untuk paginator, panggil fungsi scrollToTopProducts saat paginator ditekan
        var paginatorContainer = document.querySelector('.pagination');
        if (paginatorContainer) {
            paginatorContainer.addEventListener('click', function(event) {
                var target = event.target;
                if (target.classList.contains('page-link')) {
                    scrollToTopProducts();
                }
            });
        }
    });
</script>



<!-- end features list section -->
<!-- product section -->

<!-- end product section -->