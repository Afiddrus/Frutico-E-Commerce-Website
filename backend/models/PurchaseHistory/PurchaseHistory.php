<?php

namespace backend\models\PurchaseHistory;

use Yii;

/**
 * This is the model class for table "purchase_history".
 *
 * @property int|null $user_id
 * @property string $product_name
 * @property string $purchase_date
 * @property string $price
 */
class PurchaseHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['product_name', 'purchase_date', 'price'], 'required'],
            [['product_name', 'purchase_date', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'product_name' => 'Product Name',
            'purchase_date' => 'Purchase Date',
            'price' => 'Price',
        ];
    }
}
