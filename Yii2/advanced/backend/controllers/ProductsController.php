<?php

Namespace backend\controllers;

use Yii;
use backend\models\ProductsForm;
use common\models\Products;
use common\models\Discounts;
use common\models\Category;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider; /** При верстці сторінки - не потрібно! */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /** $model = Products::find()->All(); При верстці сторінки - не потрібно! */
        $model=Products::find()
        ->joinWith('category')
        ->joinWith('discounts');
        $dataProvider = new ActiveDataProvider(['query' => $model]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }
    public function actionCreate()
    {
        $discount = Discounts::find()->all();
        $category = Category::find()->all();
        $model = new ProductsForm();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->ImageFile = UploadedFile::getInstance($model, 'ImageFile');
            if (!$model->upload())
            {
                $model->ProductImage = '../../uploads/default.png';
            }
                $product = new Products();
                $product->Name = $model->Name;
                $product->Price = $model->Price;
                $product->Description = $model->Description;
                $product->CategoryId = Yii::$app->request->post('Select_Category');
                $product->ProductImage = $model->ProductImage;
                $product->Quantity = 10;
                $product->DiscountId = Yii::$app->request->post('Select_Discount');
                $product->save();
                $this->redirect(['products/index']);
        } else {
            return $this->render('create', ['model'=>$model, 'category'=>$category, 'discount'=>$discount]);
        }
    }
    public function actionEdit($Id){
        $discount = Discounts::find()->all();
        $category = Category::find()->all();
        $product = Products::findOne($Id);
        $model = new ProductsForm();
        $model->Name = $product->Name;
        $model->Price = $product->Price;
        $model->Description = $product->Description;
        $model->CategoryId = $product->CategoryId;
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isPost)
        {
            $model->ImageFile = UploadedFile::getInstance($model, 'ImageFile');
            if ($model->upload()) {
                if ($product->ProductImage != '../../uploads/default.png') unlink($product->ProductImage);
                $product->ProductImage = $model->ProductImage;                
            };
            $product->Name = $model->Name;
            $product->Price = $model->Price;
            $product->Description = $model->Description;
            $product->CategoryId = Yii::$app->request->post('Select_Category');
            $product->DiscountId = Yii::$app->request->post('Select_Discount');
            $product->save();
            $this->redirect(['products/index']);
        } else {
            return $this->render('edit', ['model'=>$model, 'category'=>$category, 'discount'=>$discount]);
        }
    }
    public function actionDelete($Id){
        $product = Products::findOne($Id)->delete();
        $this->redirect(['products/index']);
    }

}
