<?php

namespace common\i18n;

use common\models\Order;
use yii\bootstrap5\Html;

/**
 * 
 * @package  common\i18n
 */
class Formatter extends \yii\i18n\Formatter
{
    public function asOrderStatus($status)
    {
        if ($status === Order::STATUS_COMPLETED) {
            return Html::tag('span', 'Completed', ['class' => 'badge badge-success']);
        } else if ($status === Order::STATUS_DRAFT) {
            return Html::tag('span', 'Unpaid', ['class' => 'badge badge-secondary']);
        } else {
            return Html::tag('span', 'Failured', ['class' => 'badge badge-danger']);
        }
    }
}
