<?php

namespace backend\controllers;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Orders;
use Yii;

class OrdersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider(['query' => Orders::find(),]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionDelete($Id){
        $product = Orders::findOne($Id)->delete();
        $this->redirect(['orders/index']);
    }

}
