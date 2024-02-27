<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Order $model */

$this->title = 'Order #' . $model->id . ' details';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


// $orderAddress = $model->orderAddress;
?>

<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3>Order Details</h3>
    <?= DetailView::widget([
        'model' => $model, // Use the $model variable (order model)
        'attributes' => [
            'id',
            'total_price:currency',
            'status:orderStatus',
            'firstname',
            'lastname',
            'email:email',
            'transaction_id',
            'created_at:datetime',
            // 'created_by',
        ],
    ]) ?>

</div>