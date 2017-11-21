<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\URL;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::button('Create Category',['value'=>URL::to('category/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    
    <p><!--
    <?= HTML::button('Create Category',['value'=>URL::to('index.php/category/create'),'class'=>'btn btn-sucess','id'=>'modalButton'])?>
    </p>-->
    <?php
    Modal::begin([
        'header'=>'<h4>Category</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
        ]);

    echo "<div id='modalContent'></div>";

    Modal::end();


    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id'=>[
            'label'=>'Category Id',
            'value'=>function($data) { 
                 return $data->category_id;
             }

            ]
            ,

            'category_name'=>[
             'label'=>'Category Name',
             'value'=>function($data) { 
                 return $data->category_name;
             }
             
            ]
            ,
            'category_createdat'=>[
             'label'=>'Category Created At',
             'value'=>function($data) { 
                 return $data->category_createdat;
             }

            ],
            //'category_photo'
             'category_photo'=>
             [
                'label' => 'Item Photo',
                 'format' => ['image',['width'=>'100','height'=>'100']],

                'value'=>function($data) { 
                 return '../'.$data->category_photo;


                 // return Html::img('../../'.$data->category_photo,             // return the img 
                   // ['width' => '60px']);   
                   

                            
                }
            ],

            
            
            'category_updatedat'=>[
             'label'=>'Category Updated At',
              'value'=>function($data) { 
                 return $data->category_updatedat;
                }



            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
