<?php

namespace backend\controllers;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Orders;
use yii\filters\VerbFilter;
use Yii;

class OrdersController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($true, $action){
                    Echo ('У вас нет доступа к этой странице');
                    // return $this->render('home');
                },
                'rules' => [
                    [
                        'actions' => ['login', 'index', 'create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                    [
                        'actions' => ['login', 'index'],
                        'allow' => true,
                        'roles' => ['Manager','Customer'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['Guest'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
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
