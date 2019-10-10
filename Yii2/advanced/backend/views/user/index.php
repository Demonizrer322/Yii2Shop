<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\grid\GridView;
   
?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'id',
            'username',
            'email',
            'auth_assignment.item_name',
 
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model,$key) {
                        return Html::a('Edit', ['edit', 'id' => $model->id], ['class' => 'btn btn-success']);
                        },
                    'delete'  => function ($url,$model,$key) {
                        return Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                        ],
                        ]);
                    },
                ],
            ],
        ],
    ])?>
