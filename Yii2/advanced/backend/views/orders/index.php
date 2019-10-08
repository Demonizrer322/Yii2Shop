<?php

    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'CustomerId',
            'ProductId',
            'Quantity',
            'TotalPrice',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model,$key) {
                        return Html::a('Edit', ['edit', 'Id' => $model->Id], ['class' => 'btn btn-success']);
                        },
                    'delete'  => function ($url,$model,$key) {
                        return Html::a('Delete', ['delete', 'Id' => $model->Id], ['class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                        ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
