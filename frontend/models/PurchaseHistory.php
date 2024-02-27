<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "purchase_history".
 *
 * @property int $user_id Primary key
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
            [['user_id', 'product_name', 'purchase_date', 'price'], 'required'],
            [['user_id'], 'integer'],
            [['product_name', 'purchase_date', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID', // Kolom ini sekarang merupakan primary key
            'product_name' => 'Product Name',
            'purchase_date' => 'Purchase Date',
            'price' => 'Price',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ['user_id']; // Menentukan bahwa 'user_id' adalah primary key
    }
}
