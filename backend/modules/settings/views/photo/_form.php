<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;



/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

 <!--   <?= $form->field($model, 'p_photo')->textInput(['maxlength' => true]) ?>-->

 <?
   <?= FileInput::widget([
    'model' => $model,
   'attribute' => 'file[]',
    'name' => 'file[]',
   'options' => [
       'multiple' => true,
      'accept' => 'image/*',
  ]  ]);

    ?>





    <?= $form->field($model, 'p_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>