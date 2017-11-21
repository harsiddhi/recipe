<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]
); ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'item_process')->textarea(['rows' => 6]) ?>

   <!-- <?= $form->field($model, 'item_photo')->textInput(['maxlength' => true]) ?>-->
<label class="control-label">Item Photo</label>;
    <?=FileInput::widget([

    'model' => $model,
    'attribute' => 'file',
    //'options' => ['multiple' => true]
]);
?>

  <!--  <?= $form->field($model, 'categoty_id')->textInput() ?>-->

 <?= $form->field($model,'categoty_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(),'category_id','category_name'),
        [
        'prompt'=>'Select Category',


        
        ])
        ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
