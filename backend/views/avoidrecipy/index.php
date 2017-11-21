<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avoid Food';
$this->params['breadcrumbs'][] = $this->title;
?>




// correct code 


<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

   <?= GridView::widget([
        'dataProvider' => $dataProvider
        ,

        
        'filterModel' => $searchModel,


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_id'=>[
            'label'=>'Item Id',
            'value'=>function($data) { 
                 return $data->item_id;
                    }],
            'item_name'=>[
            'label'=>'Item Name',
            'value'=>function($data) { 
                 return $data->item_name;
                    }],
            

            
            'item_description:ntext'=>
            [
            'label'=>'Item Description',
            'value'=>function($data) { 
                 return $data->item_description;
                    }],
            'item_process:ntext'=>[
            'label'=>'Item Process',
            'value'=>function($data) { 
                 return $data->item_process;
                    }],
           // 'item_time',
            // 'item_photo',
            'categoty.category_name',
           /* =>
            [
            'label'=>'asss',
            'format' => 'raw',


                 'value'=>
                 function ($dataObject) {


          
           
                 
            return Html::a(Html::encode($dataObject->categoty_id));

            }
            ],*/

             'item_photo'=>
             [
                'label'=>'item_photo',
                 'format' => ['image',['width'=>'100','height'=>'100']],

                'value'=>function($data) { 
                 return '../'.$data->item_photo;


                 // return Html::img('../../'.$data->category_photo,             // return the img 
                   // ['width' => '60px']);   
                   

                            
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
