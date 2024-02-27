<?php

namespace frontend\base;

use common\models\CartItem;
use yii\web\Controller as WebController;

/**
 * Class Controller
 * 
 * @author Cholid Afiddrus W
 * @package frontend/base
 */
class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {

        $this->view->params['cartItemCount'] = CartItem::getTotalQuantityForUser(currUserId());
        return parent::beforeAction($action);
    }
}
