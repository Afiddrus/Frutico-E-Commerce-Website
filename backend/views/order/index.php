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

    <!-- <?php echo $this->render('_search', ['model' => $searchModel]);
            ?> -->


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
                    'columns' => array_keys($dataProvider->getModels()[0]->attributes),
                    'filename' => 'Orders Data',
                    'dropdownOptions' => [
                        'label' => 'Export',
                        'class' => 'btn btn-outline-secondary',
                        'itemsBefore' => [
                            '<div class="dropdown-header">Export All Data</div>',
                        ],
                    ],
                    'exportConfig' => [
                        ExportMenu::FORMAT_HTML => [
                            'label' => 'Save as HTML',
                            'icon' => 'fas fa-file-code',
                            'iconOptions' => ['class' => 'text-info'],
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => 'grid-export',
                            'alertMsg' => 'The HTML export file will be generated for download.',
                            'options' => ['title' => 'Hyper Text Markup Language'],
                            'mime' => 'text/html',
                            'config' => [
                                'cssFile' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
                            ]
                        ],
                        ExportMenu::FORMAT_CSV => [
                            'label' => 'Save as CSV',
                            'icon' => 'fas fa-file-code',
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
                        ExportMenu::FORMAT_EXCEL => [
                            'label' => 'Save as Excel',
                            'icon' => 'fas fa-file-excel',
                            'iconOptions' => ['class' => 'text-success'],
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => 'grid-export',
                            'alertMsg' => 'The Excel export file will be generated for download.',
                            'mime' => 'application/vnd.ms-excel',
                            'config' => [
                                'worksheet' => 'Worksheet',
                                'cssFile' => ''
                            ]
                        ],
                        ExportMenu::FORMAT_PDF => [
                            'label' => 'Save as PDF',
                            'icon' => 'fas fa-file-pdf',
                            'iconOptions' => ['class' => 'text-danger'],
                            'showHeader' => true,
                            'showPageSummary' => true,
                            'showFooter' => true,
                            'showCaption' => true,
                            'filename' => 'grid-export',
                            'alertMsg' => 'The PDF export file will be generated for download.',
                            'options' => ['title' => 'Portable Document Format'],
                            'mime' => 'application/pdf',
                            'config' => [
                                'mode' => 'c',
                                'format' => 'A4-L',
                                'destination' => 'D',
                                'marginTop' => 20,
                                'marginBottom' => 20,
                                'cssInline' => '.kv-wrap{padding:20px;}' // adjust your css
                            ]
                        ],
                    ],
                ]),
            ],
            '{toggleData}', // If you want to use the toggleData button
        ],
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
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