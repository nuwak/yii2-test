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
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <div class="col-md-6" style="border: 1px solid #f0ad4e">
        Левая колонка
        <br/>
        <?php
            echo Nav::widget([
//                'activateItems' => false, //Активная страница не будет выделяться
                'activateParents' => true, //выделяет родительское меню если активная ссылка из подменю
                'encodeLabels' => false, //HTML код в название элементов не будет экранироваться
                'options' => [
//                    'class' => 'nav nav-tabs' //Вкладки
//                    'class' => 'nav nav-pills' //Кнопки
//                    'class' => 'nav nav-pills nav-stacked' //Вертикальное
                    'class' => 'nav nav-pills nav-justified' //По всей ширине и по центру
                ],
               'items' => [
                   [
                       'label' => 'Ссылка 1 <span class="glyphicon glyphicon-alert"></span>',
                       'url' => ['#'],
                       'options' => [
                           'class' => 'disabled'
                       ],
                       'linkOptions' => [
                           'onClick' => 'return false'
                       ]
                   ],
                   [
                       'label' => 'Ссылка 2',
                       'url' => ['#']
                   ],
                   [
                       'label' => 'Выпадающий список',
                       'items' => [
                           [
                               'label' => 'link 1',
                               'url' => ['#'],
                           ],
                           '<li class"divider"></li>',
                           '<li class"dropdown-header">Описание</li>',
                           [
                               'label' => 'link 2',
                               'url' => ['widget-test/index'],
                           ],
                       ]
                   ],
               ]
            ]);
        ?>
    </div>
    <div class="col-md-6" style="border: 1px solid #f0ad4e">
        Права колонка
        <div class="row">
            <div class="col-md-3" style="border: 1px solid #f0ad4e">
                <?php
                echo Html::a(
                    'Передать сюда id = 123',
                    Url::to(['widget-test/index','id' => '123'])
                );?>
            </div>
            <div class="col-md-3" style="border: 1px solid #f0ad4e">
                2
                <?php
                if(isset($_GET['id']))
                    echo "<p>$_GET[id]</p>";
                ?>
            </div>
            <div class="col-md-3" style="border: 1px solid #f0ad4e">
                <?php
                echo Html::a(
                    'Найти статьи за 2015 год',
                    Url::to([
                        'main/search',
                        'search' => 'статья',
                        'year' => '2015'
                    ])
                );
                ?>
            </div>
            <div class="col-md-3" style="border: 1px solid #f0ad4e">
                <?php
                echo Html::a(
                    'Модальное окно',
                    ['#'],
                    [
                        'data-toggle' => 'modal',
                        'data-target' => '#search',
                        'class' => 'btn btn-warning',
                    ]

                );

                    Modal::begin([
                        'size' => 'modal-lg',
                        'options' => [
                            'id' => 'search'
                        ],
                        'header' => '<h2>Заголовок</h2>',
//                        'toggleButton' => [
//                            'label' => 'Окно',
//                            'tag' => 'button',
//                            'class' => 'btn btn-danger'
//                        ],
                        'footer' => 'Низ окна'
                    ]);

                ActiveForm::begin([
                    'action' => ['/найти'],
                    //                'method' => 'post',
                    'method' => 'get',
                    'options' => [
                        'class' => ''
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


                Modal::end();
                ?>
            </div>
        </div>
    </div>
</div>