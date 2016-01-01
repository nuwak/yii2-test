<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: Nuwak
 * Date: 29.12.2015
 * Time: 19:04
 */
/**
 * @var $content string
 * @var $this \yii\web\View
 */
AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
    <html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>"/>
    <?php $this->registerMetaTag(['name' => 'viewport','content'=>'width=device-width, initial-scale=1'])?>
    <title><?=$this->title .' : '. Yii::$app->name?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="wrap">
    <?php
        NavBar::begin([
            'brandLabel' => 'Тестовый сайт'
        ]);
            ActiveForm::begin([
               'action' => ['main/search'],
//                'method' => 'post',
                'method' => 'get',
                'options' => [
                    'class' => 'navbar-form navbar-right'
                ]
            ]);
            echo '<div class="input-group">';
            echo Html::input(
                'type:text',
                'search',
                '',
                [
                    'placeholder'=>'Найти...',
                    'class' => 'form-control'
                ]
            );

            echo"</div>";

            echo '<div class="input-group">';
            echo Html::submitButton(
                    '<span class="glyphicon glyphicon-search"></span>',
                    [
                        'class' => 'btn btn-success'
                    ]
                );
            echo"</div>";
            ActiveForm::end();
        NavBar::end();
    ?>
    <div class="container">
        <?=$content?>
    </div>
</div>
<footer class="footer">
    <div class="container">
            <span class="badge">
                <span class="glyphicon glyphicon-copyright-mark"></span> <?=Yii::$app->params['siteName']?> <?=date("Y")?>
            </span>
    </div>
</footer>
<?php $this->endBody();?>
</body>
</html>
<?php
$this->endPage();
?>