<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>


    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>
        
 <b>  
Category Path</b>
<?=FileInput::widget([
    
    'model' => $model,
    'attribute' => 'file',

    //'options' => ['multiple' => true]
]);
?>


      


  <br>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
