<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $form = ActiveForm::begin(['method'=>'post', 'options' => ['enctype' => 'multipart/form-data']]);
    echo $form->field($model, 'Name')->textInput();
    echo $form->field($model, 'Price')->Input([ 'type'=>'number', 'step'=>'0.1'] );
    echo $form->field($model, 'Description')->textInput();
    echo $form->field($model, 'ImageFile')->fileInput();
    echo Html::beginTag("select", ['Name' => 'Select_Category']);
    foreach ($category as $key => $value) {
        echo Html::tag('option', $value->Name, [ 'value' => $value->Id]);
    };
    echo Html::endTag("select");
    echo Html::beginTag("select", ['Name' => 'Select_Discount']);
    foreach ($discount as $key => $value) {
        echo Html::tag('option', $value->Name, [ 'value' => $value->Id]);
    };
    echo Html::endTag("select");    
    echo Html::submitButton('Create', ['class' => 'btn btn-block btn-primary']);
    ActiveForm::end();

