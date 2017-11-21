<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */


$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_id',
            'category_name',
          'category_createdat',
            'category_photo'=>
            [
                'label' => 'category photo',
                //uploads/' .$model->photo
                'value' =>'../../'.$model->category_photo,
                'format' => ['image',['width'=>'100','height'=>'100']]
                //'value'=>'uploads/' .$model->category_photo,
                //'format' => ['category_photo',['width'=>'100','height'=>'100']],
            ],
 'category_updatedat',
        ],
    ]) ?>
</div>
