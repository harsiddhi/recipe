<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use kartik\file\FileInput;
use kartik\time\TimePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?=  $form->field($model, 'categoty_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(),'category_id','category_name')
    ); ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>

   <!-- <?= $form->field($model, 'item_process')->textarea(['rows' => 6]) ?>-->



<br>

    <?=FileInput::widget([
    'model' => $model,
    'attribute' => 'file',
    //'options' => ['multiple' => true]
]);
?>

   <!-- <?= $form->field($model, 'categoty_id')->textInput() ?> -->

<br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
