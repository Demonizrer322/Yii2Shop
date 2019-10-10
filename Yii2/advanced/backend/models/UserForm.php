<?php

namespace backend\models;
use yii\web\UploadedFile; 
use common\models\AuthAssignment;
 
class UserForm extends \yii\db\ActiveRecord
{
    public $username;
    public $email;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required', 'message' => 'Error'],
            [['user_id'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthAssignment::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'username' => 'Username',
            'user_id' => 'User_Id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getauth_assignment()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }
}
