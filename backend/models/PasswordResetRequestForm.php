<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    protected function findUser()
    {
        return parent::findUser();
    }
}
