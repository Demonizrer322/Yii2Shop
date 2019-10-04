<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\grid\GridView;
   
?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'Id',
            'Name',
            'Description:ntext',
            'Price',
            'category.Name',
            'discounts.Size',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img($data->ProductImage,[
                        'alt'=>'yii2 - картинка в gridview',
                        'style' => 'width:50px;'
                    ]);
                },
            ],
 
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
    ])?>
    <?= Html::tag('a', 'Додати', ['href'=>Url::toRoute('/products/create')]) ?>