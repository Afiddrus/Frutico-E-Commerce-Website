<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700',
        'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap',
        '/css/all.min.css',
        '/css//bootstrap/bootstrap.min.css',
        '/css/owl.carousel.css',
        '/css/magnific-popup.css',
        '/css/animate.css',
        '/css/meanmenu.min.css',
        '/css/main.css',
        '/css/responsive.css',

    ];
    public $js = [
        'js/app.js',
        '/js/bootstrap/bootstrap.min.js',
        '/js/jquery.countdown.js',
        '/js/jquery.isotope-3.0.6.min.js',
        '/js/waypoints.js',
        '/js/owl.carousel.min.js',
        '/js/jquery.magnific-popup.min.js',
        '/js/jquery.meanmenu.min.js',
        '/js/sticker.js',
        '/js/main.js',
        '/js/jquery-1.11.3.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
