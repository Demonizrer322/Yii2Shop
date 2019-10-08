<?php

namespace common\models;


/**
 * This is the model class for table "orders".
 *
 * @property int $Id
 * @property int $CustomerId
 * @property int $ProductId
 * @property int $Quantity
 * @property string $TotalPrice
 *
 * @property User $customer
 * @property Products $product
 */

class Orders extends \yii\db\ActiveRecord
{
    public $CustomerId;
    public $ProductId;
    public $Quantity;
    public $TotalPrice;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CustomerId', 'ProductId', 'Quantity'], 'integer'],
            [['TotalPrice'], 'string', 'max' => 255],
            [['CustomerId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['CustomerId' => 'id']],
            [['ProductId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['ProductId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'CustomerId' => 'Customer ID',
            'ProductId' => 'Product ID',
            'Quantity' => 'Quantity',
            'TotalPrice' => 'Total Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'CustomerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['Id' => 'ProductId']);
    }
}
