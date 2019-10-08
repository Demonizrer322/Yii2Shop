<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $form = ActiveForm::begin(['method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]);
    echo $form->field($model, 'Name')->textInput();
    echo $form->field($model, 'Description')->textInput();
    echo $form->field($model, 'ImageFile')->fileInput();
    echo Html::submitButton('Edit', ['class' => 'btn btn-block btn-primary']);
    ActiveForm::end();


