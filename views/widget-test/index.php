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
?>
<div class="row">
    <div class="col-md-6" style="border: 1px solid #f0ad4e">
        левая колонка
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
    <div class="col-md-6" style="border: 1px solid #f0ad4e">
        правая колонка
    </div>
</div>