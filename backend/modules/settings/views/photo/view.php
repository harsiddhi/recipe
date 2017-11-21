<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Photo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'p_name',
            'p_photo'=>
             [
                'label' =>'photo',
                //uploads/' .$model->photo
                
                //'format' => ['image',['width'=>'100','height'=>'100']]
                'value'=>'uploads/' .$model->p_photo,
                //'format' => ['category_photo',['width'=>'100','height'=>'100']],
            ],
            'p_id',
        ],
    ]) ?>

</div>