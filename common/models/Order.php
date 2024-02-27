<?php

namespace common\models;

use Exception;
use Yii;
use yii\bootstrap5\Html;
use yii\db\Exception as DbException;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property int $id
 * @property float $total_price
 * @property int $status
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string|null $transaction_id
 * @property int|null $created_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property OrderAddress[] $orderAddresses
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_COMPLETED = 10;
    const STATUS_FAILURED = 2;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['total_price', 'status', 'firstname', 'lastname', 'email'], 'required'],
            [['total_price'], 'number'],
            [['status', 'created_at', 'created_by'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 45],
            [['email', 'transaction_id'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_price' => 'Total Price',
            'status' => 'Status',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[OrderAddresses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderAddressesQuery
     */
    public function getOrderAddresses()
    {
        return $this->hasOne(OrderAddresses::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderItemsQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrderQuery(get_called_class());
    }

    public function saveOrderItems()
    {
        $transaction = Yii::$app->db->beginTransaction();
        $cartItems = CartItem::getItemsForUser(currUserId());
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_name = $cartItem['name'];
            $orderItem->product_id = $cartItem['id'];
            $orderItem->unit_price = $cartItem['price'];
            $orderItem->order_id = $this->id;
            $orderItem->quantity = $cartItem['quantity'];
            if (!$orderItem->save()) {
                $transaction->rollBack();
                throw new DbException("Order item was not saved:" . implode('<br>',  $orderItem->getFirstErrors()));
            }
        }

        $transaction->commit();
        return true;
    }

    public function getItemsQuantity()
    {
        return $sum = CartItem::findBySql(
            "SELECT SUM(quantity) FROM order_items WHERE order_id = :orderId",
            ['orderId' => $this->id]
        )->scalar();
    }

    public function asOrderStatus($status)
    {
        if ($status === self::STATUS_COMPLETED) {
            return Html::tag('span', 'Completed', ['class' => 'badge badge-success']);
        } else if ($status === self::STATUS_DRAFT) {
            return Html::tag('span', 'Unpaid', ['class' => 'badge badge-secondary']);
        } else {
            return Html::tag('span', 'Failed', ['class' => 'badge badge-danger']);
        }
    }
}
