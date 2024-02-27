<!-- <link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/bootstrap.grid.css">
<link rel="stylesheet" href="/css/bootstrap.grid.min.css"> -->


<?php

use common\models\Order;
use common\models\OrderAddress;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap5\LinkPager; // Import LinkPager

/* @var $this View */

$this->title = 'History Purchase';
$this->params['breadcrumbs'][] = $this->title;

$currentUserId = Yii::$app->user->id; // Dapatkan ID pengguna saat ini

$dataProvider = new ActiveDataProvider([
    'query' => Order::find()->where(['created_by' => $currentUserId]), // Filter data dengan user ID saat ini
    'pagination' => [
        'pageSize' => 10, // Jumlah item per halaman
    ],
]);

$statusLabels = [
    Order::STATUS_COMPLETED => 'Dikirim',
    Order::STATUS_DRAFT => 'Dikemas',
    Order::STATUS_FAILURED => 'Belum Dibayar',
];

?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>History Purchase</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-section -->
<div class="container"> <!-- Tambahkan div container -->

    <div class="outer-container">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table-responsive'], // Tambahkan kelas table-responsive untuk membuat tabel responsif
            'tableOptions' => ['class' => 'table table-striped table-hover table-bordered'], // Tambahkan kelas Bootstrap untuk GridView dan tambahkan kelas table-hover dan table-bordered
            'headerRowOptions' => ['class' => 'thead-dark'], // Tambahkan kelas Bootstrap untuk thead
            'columns' => [
                // Kolom lainnya...
                'id',
                'firstname',
                'lastname',
                'email',
                [
                    'attribute' => 'total_price',
                    'contentOptions' => ['style' => 'border-right: 1px solid gray;'], // Tambahkan border-right pada kolom total_price
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) use ($statusLabels) {
                        $statusClass = $model->status === Order::STATUS_COMPLETED ? 'badge-success' : 'badge-danger';
                        return Html::tag('span', $statusLabels[$model->status], ['class' => 'badge ' . $statusClass . ' text-blue']); // Tambahkan kelas 'text-blue' untuk warna teks biru
                    },
                    'contentOptions' => ['style' => 'border-right: 1px solid gray;'], // Tambahkan border-right pada kolom status
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'dateTime',
                    'contentOptions' => ['style' => 'border-right: 1px solid gray;'], // Tambahkan border-right pada kolom created_at
                ],
            ],
            'pager' => [
                'class' => 'yii\widgets\LinkPager', // Atur kelas pager kosong
                'options' => ['style' => 'display: none;'], // Sembunyikan tampilan Paginator
            ],
        ]); ?>

        <!-- Tambahkan Paginator dari Bootstrap 5 -->
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]); ?>
    </div>

</div>

<style>
    .container {
        justify-content: center;
    }

    .text-blue {
        color: blue;
    }

    .outer-container {
        margin-bottom: 5rem;
    }

    /* Tambahkan gaya untuk border hitam dengan ketebalan 2px */
    .table-bordered {
        border: 1px solid gray;
    }
</style>