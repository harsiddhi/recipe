<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    
    <!--<title><?= Html::encode($this->title) ?></title>-->
    <title>Diet Food</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
   
   
    if (Yii::$app->user->isGuest) {
       // $menuItems[] = ['label' => '', 'url' => ['/site/login']];
        // 'only' => ['login'],
    } else {
       /* $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post'],



             //'only' => ['create', 'update'],

        ];*/
         NavBar::begin([
        'brandLabel' => 'Diet Food',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
 $menuItems = [
       
        ['label' => 'Home', 'url' => ['/site/index']],

        ['label' => 'Category', 'url' => ['../index.php/category']],

        ['label' => 'Item', 'url' => ['../index.php/item']],

        ['label' => 'Foods To Avoid', 'url' => ['../index.php/avoidrecipy']],

        ['label' => 'Story', 'url' => ['../index.php/story']],

         ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']],



    ];



    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
}
    ?>

    <div class="container">
       <!-- <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>-->
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Diet Food <?= date('Y') ?></p>

       
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
