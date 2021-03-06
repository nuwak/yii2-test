<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\AlertWidget;
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
    <?= Html::csrfMetaTags()?>
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
        'brandLabel' => 'Тестовый сайт',
        'options' =>[
            'class' => 'navbar-default', //navbar-inverse - делает темное меню, navbar-fixed-top - закрепляет меню вверху
            'id' => 'main-menu'
        ],
        'renderInnerContainer' => true,
        'innerContainerOptions' => [
            'class' => 'container'
        ]
    ]);
    //https://www.youtube.com/watch?v=Vpx4O9bK4uI
    if (!Yii::$app->user->isGuest):
        ?>
        <div class="navbar-form navbar-right">
            <button class="btn btn-sm btn-default"
                    data-container="body"
                    data-toggle="popover"
                    data-trigger="focus"
                    data-placement="bottom"
                    data-title="<?= Yii::$app->user->identity['username'] ?>"
                    data-content="
                            <a href='<?= Url::to(['/main/profile']) ?>' data-method='post'>Мой профиль</a><br>
                            <a href='<?= Url::to(['/main/logout']) ?>' data-method='post'>Выход</a>
                        ">
                <span class="glyphicon glyphicon-user"></span>
            </button>
        </div>
    <?php
    endif;

        $menuItems = [
            [
                'label' => 'О проекте <span class="glyphicon glyphicon-question-sign"></span>',
                'url' => ['#'],
                'linkOptions' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'style' => 'cursor: pointer; outline: none;'
                ]
            ],
            [
                'label' => 'Из коробки <span class="glyphicon glyphicon-inbox"></span>',
                'items' => [
                    '<li class="dropdown-header">Расширения</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => 'Перейти к просмотру',
                        'url' => ['widget-test/index']
                    ]
                ]
            ],
        ];

        if(Yii::$app->user->isGuest):
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/main/reg']];
            $menuItems[] = ['label' => 'Войти', 'url' => ['/main/login']];
        endif;
            echo Nav::widget([
               'items' => $menuItems,
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]
            ]);

            Modal::begin(
                [
                    'header' => '<h2>Заказать</h2>',
                    'id' => 'modal'
                ]
            );
            echo 'форма заказа созания сайта';
            Modal::end();

            ActiveForm::begin([
                'action' => ['/найти'],
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
                    'class' => 'btn btn-success',
        //                        'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/\s+/,"_") + ".html"',
//                    'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value + ".html"',
                    'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_") + ".html";'
                ]
            );
            echo"</div>";
            ActiveForm::end();
        NavBar::end();
    ?>
    <div class="container">
        <?=AlertWidget::widget()?>
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