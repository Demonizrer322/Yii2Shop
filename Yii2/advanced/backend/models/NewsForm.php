<?php

namespace backend\models;
use yii\web\UploadedFile; 
 
class NewsForm extends \yii\db\ActiveRecord
{
    public $Name;
    public $Description;
    public $UrlImage;
    public $ImageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'ProductImage'], 'required', 'message' => 'Error'],
            [['Description'], 'string'],
            [['Name', 'ProductImage'], 'string', 'max' => 255],
            [['ImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jfif'],
        ];
    }

    public function upload()
    {
        if (($this->ImageFile != null) && ($this->validate("Name, Description"))) {
            $FileName=md5(microtime());
            $this->UrlImage = '../../uploads/' . $FileName . '.' . $this->ImageFile->extension;
            $this->ImageFile->saveAs($this->UrlImage);
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
            'Id' => 'Id',
            'Name' => 'Name',
            'Description' => 'Description',
            'UrlImage' => 'New Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
