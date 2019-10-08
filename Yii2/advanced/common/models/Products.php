<?php

namespace common\models;

use Yii;


class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'ProductImage', 'Price', 'Quantity', 'CategoryId'], 'required'],
            [['Description'], 'string'],
            [['Quantity', 'DiscountId', 'CategoryId'], 'integer'],
            [['Name', 'ProductImage', 'Price'], 'string', 'max' => 255],
            [['CategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['CategoryId' => 'Id']],
            [['DiscountId'], 'exist', 'skipOnError' => true, 'targetClass' => Discounts::className(), 'targetAttribute' => ['DiscountId' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'Name' => "Ім'я",
            'Description' => 'Опис',
            'ProductImage' => 'Product Image',
            'Price' => 'Ціна',
            'Quantity' => 'Quantity',
            'discounts.Size' => 'Знижка',
            'category.Name' => 'Категорія',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['Id' => 'CategoryId']);
    }
    public function getDiscounts()
    {
        return $this->hasOne(Discounts::className(), ['Id' => 'DiscountId']);
    }

}
