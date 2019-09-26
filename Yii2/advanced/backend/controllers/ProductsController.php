<?php

namespace backend\controllers;

use Yii;
use backend\models\ProductsForm;
use common\models\Products;
use common\models\Category;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /** $model = Products::find()->All(); При верстці сторінки - не потрібно! */
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionCreate()
    {
        $category = Category::find()->all();
        $model = new ProductsForm();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->ImageFile = UploadedFile::getInstance($model, 'ImageFile');
            if ($model->upload()) {
                $product = new Products();
                $product->Name = $model->Name;
                $product->Price = $model->Price;
                $product->Description = $model->Description;
                $product->CategoryId = Yii::$app->request->post('Select_Category');
                $product->ProductImage = $model->ProductImage;
                $product->Quantity = 10;
                $product->DiscountId = 5;
                $product->save();
                $this->redirect(['products/index']);
            }
        } else {
            return $this->render('create', ['model'=>$model, 'category'=>$category]);
        }
    }
    public function actionDelete($Id){
        $product = Products::findOne($Id)->delete();
        $this->redirect(['products/index']);
    }

}
