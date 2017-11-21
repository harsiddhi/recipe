<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
   // public $sourcePath = '@web/themes/template';
    public $css = [
        'css/bootstrap.css',
        'css/style.css',
        'css/font-awesome.css',
        'css/owl.carousel.css',
    ];
    public $js = [
        'js/jquery-2.2.3.min.js',
        'http://fonts.googleapis.com/css?family=Berkshire+Swash',
        'http://fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
