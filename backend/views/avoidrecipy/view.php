<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Item */

$this->title = $model->item_id;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->item_id], [
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
            'item_id',
            'item_name',
            'item_description:ntext',
           // 'item_process:ntext',
           // 'item_time',
           // 'item_photo',
            'categoty_id',
            'item_photo'=>
            [
                'label' => 'category',
                //uploads/' .$model->photo
                'value' =>'../../'.$model->item_photo,
                'format' => ['image',['width'=>'100','height'=>'100']]
                //'value'=>'uploads/' .$model->category_photo,
                //'format' => ['category_photo',['width'=>'100','height'=>'100']],
            ],

        ],
    ]) ?>

    

</div>
