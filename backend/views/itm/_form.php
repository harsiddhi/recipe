<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'item_process')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'item_time')->textInput() ?>

    <?= $form->field($model, 'item_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoty_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
