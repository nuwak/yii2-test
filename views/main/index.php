<?php
use app\components\FirstWidget;
use app\components\SecondWidget;
use yii\bootstrap\Modal;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $hello string*/
$this->registerJsFile('@web/js/main-index.js',['position' => $this::POS_HEAD], 'main-index');
$this->registerCssFile('@web/css/main.css'
//    ,['position' => $this::POS_HEAD], 'main' # если эти опции будут указаны, то файл добавиться после всех остальных css стилей.
);
#$this->registerJs('alert("Hello Igor")', $this::POS_READY, 'hello-message');
#$this->registerCss('body {background:#ff0;}')
?>
<h1>main/index</h1>
<?= FirstWidget::widget(['a' => 25, 'b' => 15]);?>
<p>
<?=$hello?>
</p>
<?php SecondWidget::begin();?>
текст сделаем крастным
<?php SecondWidget::end();?>

<?php
Modal::begin([
    'header' => '<h2>Привет</h2>',
    'toggleButton' => ['label' => 'нажми'],
]);

echo 'Это модальное окно';

Modal::end();
?>
<br/>
<?php
echo DatePicker::widget([
    'name'  => 'from_date',
//    'value'  => $value,
    'language' => 'ru',
    'dateFormat' => 'dd.MM.yy',
]);
?>