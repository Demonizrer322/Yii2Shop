<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;
?>

<div class="container">
    <div class="row">
    <?php
        foreach($products as $array)
        {
    ?>
        <a href="<?=Url::toRoute(['site/product', 'Id' => $array->Id])?>" class="col-sm-4 text-dark nav-link">
            <div class="d-flex flex-column align-items-center mt-4 p-3 h-100 border">
                <div class="font-weight-bold"><?=$array->Name?></div>
                <div>$<?=$array->Price?></div>
                <div><?=$array->Description?></div>
                <div><img src="<?=$array->ProductImage?>" alt="Product Image"></div>
            </div>
        </a>
    <?php
        }
    ?>
  </div>
  
</div>