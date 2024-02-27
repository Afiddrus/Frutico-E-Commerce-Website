<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\purchasehistory $model */

$this->title = 'Update Purchasehistory: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchasehistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchasehistory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
