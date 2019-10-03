<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discounts".
 *
 * @property int $Id
 * @property string $Name
 * @property string $Size
 */
class Discounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{discounts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Size'], 'required'],
            [['Name', 'Size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'Name' => 'Назва',
            'Size' => 'Розмір',
        ];
    }
}
