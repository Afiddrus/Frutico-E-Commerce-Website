<?php

use common\models\Order;
use yii\bootstrap5\Html as Bootstrap5Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var backend\models\search\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <i style="display: none;" class="fas fa-chevron-down"></i>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>


    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => LinkPager::class,
        ],
        'toolbar' => [
            [
                'content' =>
                ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => array_keys($dataProvider->getModels()[0]->attributes), // Get all columns
                    'filename' => 'exported-data', // Export file name
                    'dropdownOptions' => [
                        'label' => 'Export',
                        'class' => 'btn btn-outline-secondary',
                        'itemsBefore' => [
                            '<div class="dropdown-header">Export All Data</div>',
                        ],
                    ],
                    'exportConfig' => [
                        ExportMenu::CSV => [
                            'label' => 'Save as CSV',
                            'icon' => 'file-code-o',
                            'iconOptions' => ['class' => 'text-success'],
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => 'grid-export',
                            'alertMsg' => 'The CSV export file will be generated for download.',
                            'options' => ['title' => 'Comma Separated Values'],
                            'mime' => 'application/csv',
                            'config' => [
                                'colDelimiter' => ",",
                                'rowDelimiter' => "\r\n",
                            ]
                        ],
                    ],
                ]),
            ],
            '{toggleData}', // Jika Anda ingin menggunakan tombol toggleData
        ],
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => false,
        'hover' => true,
        'floatHeader' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
        'summary' => '',
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width:80px;']
            ],
            [
                'attribute' => 'fullname',
                'content' => function ($model) {
                    return $model->firstname . ' ' . $model->lastname;
                },
            ],
            'total_price:currency',
            //'email:email',
            //'transaction_id',
            'status:orderStatus',
            'created_at:datetime',
            //'created_by',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>