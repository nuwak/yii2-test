<?php
use app\assets\AppAsset;
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
<p>Верхняя часть</p>

<p><?= $content ?></p>

<p>Нижняя часть</p>
<?php $this->endBody();?>
</body>
</html>
<?php
$this->endPage();
?>