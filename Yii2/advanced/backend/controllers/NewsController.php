<?php

namespace backend\controllers;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\News;
use backend\models\NewsForm;
use yii\filters\VerbFilter;
use Yii;

class NewsController extends \yii\web\Controller
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
        $dataProvider = new ActiveDataProvider(['query' => News::find(),]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionCreate()
    {
        $model = new NewsForm();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->ImageFile = UploadedFile::getInstance($model, 'ImageFile');
            if (!$model->upload())
            {
                $model->UrlImage = '../../uploads/default.png';
            }
                $news = new News();
                $news->Name = $model->Name;
                $news->Description = $model->Description;
                $news->UrlImage = $model->UrlImage;
                $news->save();
                $this->redirect(['news/index']);
        } else {
            return $this->render('create', ['model'=>$model]);
        }
    }
    public function actionEdit($Id){
        $news = News::findOne($Id);
        $model = new NewsForm();
        $model->Name = $news->Name;
        $model->Description = $news->Description;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->ImageFile = UploadedFile::getInstance($model, 'ImageFile');
            if ($model->upload()) {
                if ($news->UrlImage != '../../uploads/default.png') unlink($news->UrlImage);
                $news->UrlImage = $model->UrlImage;                
            };
            $news->Name = $model->Name;
            $news->Description = $model->Description;
            $news->save();
            $this->redirect(['news/index']);
        } else {
            return $this->render('edit', ['model'=>$model]);
        }
    }
    public function actionDelete($Id){
        $news = News::findOne($Id)->delete();
        $this->redirect(['news/index']);
    }
}
