<?php
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 01.01.2016
 * Time: 15:46
 * @var $this yii\web\View
 */
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a(
    'Передать сюда id = 123',
    Url::to(['widget-test/index','id' => '123'])
);

if(isset($_GET['id']))
    echo "<p>$_GET[id]</p>";

echo "<br/>";

echo Html::a(
    'Найти статьи за 2015 год',
    Url::to([
        'main/search',
        'search' => 'статья',
        'year' => '2015'
    ])
);