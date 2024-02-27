<?php

use common\models\Order;
use yii\bootstrap5\Html as Bootstrap5Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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