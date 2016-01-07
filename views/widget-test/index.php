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
            <div class="col-md-4" style="border: 1px solid #f0ad4e">
                <?php
                echo Html::a(
                    'Передать сюда id = 123',
                    Url::to(['widget-test/index','id' => '123'])
                );?>
            </div>
            <div class="col-md-4" style="border: 1px solid #f0ad4e">
                2
                <?php
                if(isset($_GET['id']))
                    echo "<p>$_GET[id]</p>";
                ?>
            </div>
            <div class="col-md-4" style="border: 1px solid #f0ad4e">
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
        </div>
    </div>
</div>