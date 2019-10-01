<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile; 
use common\models\Category;

class News extends \yii\db\ActiveRecord
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
            [['Name'], 'required'],
            [['Name', 'Description', 'UrlImage'], 'string', 'max' => 255],
        ];
    }
    public function upload()
    {
        if ($this->validate("Name, Description")) {
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
            'Id' => 'ID',
            'Name' => 'Name',
            'Description' => 'Description',
            'UrlImage' => 'Url Image',
        ];
    }
}
