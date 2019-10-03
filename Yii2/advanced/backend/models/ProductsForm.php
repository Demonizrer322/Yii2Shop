<?php

namespace backend\models;
use yii\web\UploadedFile; 
use common\models\Category;
 
class ProductsForm extends \yii\db\ActiveRecord
{
    public $Name;
    public $Description;
    public $ProductImage;
    public $Price;
    public $Quantity;
    public $DiscountId;
    public $CategoryId;
    public $ImageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'ProductImage', 'Price', 'Quantity', 'CategoryId'], 'required', 'message' => 'Error'],
            [['Description'], 'string'],
            [['Quantity', 'DiscountId', 'CategoryId'], 'integer'],
            [['Name', 'ProductImage', 'Price'], 'string', 'max' => 255],
            [['CategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['CategoryId' => 'Id']],
            [['DiscountId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['DiscountId' => 'Id']],
            [['ImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jfif'],
        ];
    }

    public function upload()
    {
        if (($this->ImageFile != null) && ($this->validate("Name, Price, Description, CategoryId, DiscountId"))) {
            $FileName=md5(microtime());
            $this->ProductImage = '../../uploads/' . $FileName . '.' . $this->ImageFile->extension;
            $this->ImageFile->saveAs($this->ProductImage);
            return true;
        } else {
            return false;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Description' => 'Description',
            'ProductImage' => 'Product Image',
            'Price' => 'Price',
            'Quantity' => 'Quantity',
            'DiscountId' => 'Discount ID',
            'CategoryId' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['Id' => 'CategoryId']);
    }
}
