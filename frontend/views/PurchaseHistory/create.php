<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\purchasehistory $model */

$this->title = 'Create Purchasehistory';
$this->params['breadcrumbs'][] = ['label' => 'Purchasehistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasehistory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
