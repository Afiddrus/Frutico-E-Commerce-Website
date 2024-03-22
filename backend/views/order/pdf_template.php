<?php

use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'fullname',
        'total_price:currency',
        'status:orderStatus',
        'created_at:datetime',
    ],
]);
