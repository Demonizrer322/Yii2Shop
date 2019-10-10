<?php

namespace backend\controllers;

use Yii;
use backend\models\UserForm;
use common\models\User;
use common\models\AuthAssignment;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;

class UserController extends \yii\web\Controller
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
        $model = User::find()->joinWith('auth_assignment');
        $dataProvider = new ActiveDataProvider(['query' => $model]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionEdit($id)
    {
        $model = User::findOne($id);
        $role=Yii::$app->authManager->getRoles();

        if (Yii::$app->request->isPost) {
            $role=Yii::$app->request->post('Select_Role');
            $auth = Yii::$app->authManager;
            $auth->revokeAll($id);
            $adminRole=$auth->getRole($role);
            $auth->assign($adminRole, $id);
            return $this->redirect(['index']);

        }
        return $this->render('edit', ['model'=>$model, 'role'=>$role]);
    }
    public function actionDelete($id){
        $auth = Yii::$app->authManager;
        $auth->revokeAll($id);
        $user = User::findOne($id)->delete();
        $this->redirect(['user/index']);
    }
}
