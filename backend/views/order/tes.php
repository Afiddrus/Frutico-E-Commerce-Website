<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issued Certificates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn'],
        'id',
        'total_price:currency',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($model) {
                return $model->asOrderStatus($model->status);
            }
        ],
        'firstname',
        'lastname',
        'email:email',
        'transaction_id',
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:d-M-Y H:i:s']
        ],
        // 'created_by',
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'summary' => '',
        'containerOptions' => ['style' => 'overflow: auto'],
        'exportConfig' => [
            GridView::PDF => ['label' => 'Save as PDF'],
            GridView::EXCEL => ['label' => 'Save as EXCEL'],
            GridView::HTML => ['label' => 'Save as HTML'],
            GridView::CSV => ['label' => 'Save as CSV'],
        ],
        'toolbar' =>  [
            '{export}',
        ],
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => false,
        'hover' => true,
        'floatHeader' => true,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
    ]);
    ?>
</div>